<?php

include __DIR__ . "/../vendor/autoload.php";

if (!function_exists('dbase_open')) {
    die('dBase extension must be installed, use # pecl install dbase-7.0.0beta1' . PHP_EOL);
}

$config = @include(__DIR__ . "/../config/config.php");

$mysql = new \alexshadie\dbwrapper\Mysql(
    new PDO($config['db.dsn'], $config['db.user'], $config['db.password'])
);

// Russian currency classifier
// http://www.cbr.ru/mcirabis/kv/
$db = dbase_open(__DIR__ . "/OKV.DBF", 0);

$header = dbase_get_header_info($db);
$total = dbase_numrecords($db);

$currenciesRus = [];

for ($i = 0; $i < $total; $i++) {
    $row = dbase_get_record_with_names($db, $i+1);
    $row['NAME_RUS'] = iconv('cp866', 'utf-8', $row['NAME_RUS']);
    $row['NAME_COU'] = iconv('cp866', 'utf-8', $row['NAME_COU']);
    $row['NAME_COU1'] = iconv('cp866', 'utf-8', $row['NAME_COU1']);
    $row['NAME_COU2'] = iconv('cp866', 'utf-8', $row['NAME_COU2']);
    $row['NAME_COU3'] = iconv('cp866', 'utf-8', $row['NAME_COU3']);
    $row = array_map('trim', $row);
    $row['NAME_COU'] = $row['NAME_COU'] . $row['NAME_COU1'] . $row['NAME_COU2'] . $row['NAME_COU3'];
    unset($row['NAME_COU1'], $row['NAME_COU2'], $row['NAME_COU3']);

    $currenciesRus[$row['ISO_DIG']] = [
        'code_rus' => $row['CODE'],
        'iso_dig' => $row['ISO_DIG'],
        'iso_name' => $row['ISO_LAT3'],
        'name_rus' => mb_strtolower($row['NAME_RUS']),
        'country_rus' => mb_strtolower($row['NAME_COU']),
    ];
}

// ISO-4217 currencies
// https://datahub.io/core/currency-codes
$currenciesIso = [];
$iso = fopen(__DIR__ . "/codes-all.csv", "r");
$header = fgetcsv($iso);
while (!feof($iso)) {
    $row = fgetcsv($iso);
    if (!$row) {
        continue;
    }
    $row = array_combine($header, $row);
    $currenciesIso[intval($row['NumericCode'])] = [
        'numeric_code' => $row['NumericCode'],
        'alpha_code' => $row['AlphabeticCode'],
        'country' => $row['Entity'],
        'name' => $row['Currency'],
        'unit' => $row['MinorUnit'],
    ];
}

$src = fopen(__DIR__ . '/country-codes_csv.csv', 'r'); // From https://datahub.io/core/country-codes#resource-country-codes_zip
$header = fgetcsv($src);
$countries = [];

while ($row = fgetcsv($src)) {
    if (!$row) {
        continue;
    }
    $row = array_combine($header, $row);

    if ($row['ISO4217-currency_numeric_code']) {
        $countries[intval($row['ISO3166-1-numeric'])] = $row['ISO4217-currency_country_name'];
    }
}

foreach ($currenciesIso as $curId => $item) {
    foreach ($countries as $key => $country) {
        if (strtoupper($country) == strtoupper($item['country'])) {
            $currenciesIso[$curId]['country_id'] = $key;
            break;
        }
    }
}

foreach ($currenciesIso as $key => $item) {
    if (!$item['numeric_code']) {
        continue;
    }
    $mysql->insert('currency_fiat', [
        'id' => $item['numeric_code'],
        'code' => $item['alpha_code'],
        'name' => $item['name'],
        'country_name' => $item['country'],
        'unit' => intval($item['unit']) ? intval($item['unit']) : 0,
        'country_id' => $item['country_id'] ?? null,
    ]);
}

$currencyTable = file_get_contents(__DIR__ . "/coinmarket.html");
if (!$currencyTable) {
    $url = 'https://coinmarketcap.com/historical/' . date('Ymd') . '/';
    $currencyTable = file_get_contents($url);
    file_put_contents(__DIR__ . "/coinmarket.html", $currencyTable);
}
preg_match_all('!(<tr.*</tr>)!Uism', $currencyTable, $m);
$currencies = [];
foreach ($m[1] as $row) {
    if (strpos($row, '<tr>') === 0) {
        continue;
    }
    preg_match("!".
        "<td.*>(.*)</td>.*" .
        "(<td.*currency-name.*>.*</td>).*".
        "(<td.*col-symbol.*>.*</td>)".
        "!Uism", $row, $mm);

    preg_match("!<img data-src=\"(.*)\"!U", $mm[2], $mmm);
    $currency = [
        "id" => trim($mm[1]),
        "logo" => $mmm[1],
    ];

    preg_match("!<td.*data-sort=\"(.*)\">!Uism", $mm[2], $mmm);
    $currency['name'] = $mmm[1];
    preg_match("!<td.*class=\".*col-symbol.*\">(.*)</td>!Uism", $mm[3], $mmm);

    $currency['code'] = $mmm[1];

    preg_match("!href=\"/currencies/(.*)/\"!Uism", $mm[2], $mmm);
    $currency['cmc_url'] = $mmm[1];
    $currencies[] = $currency;
}
foreach ($currencies as $k => $currency) {
    if (is_file(__DIR__ . "/curinfo/" . $currency['cmc_url'] . ".html")) {
        $curinfo = file_get_contents(__DIR__ . "/curinfo/" . $currency['cmc_url'] . ".html");
    } else {
        echo "Getting {$currency['name']}\n";
        $curinfo = file_get_contents("https://coinmarketcap.com/currencies/" . $currency['cmc_url'] . "/");
        if (!$curinfo) {
            echo "Waiting\n";
            sleep(120);
            $curinfo = file_get_contents("https://coinmarketcap.com/currencies/" . $currency['cmc_url'] . "/");
        }
        if ($curinfo) {
            file_put_contents(__DIR__ . "/curinfo/" . $currency['cmc_url'] . ".html", $curinfo);
        }
        sleep(1);
    }

    preg_match_all("!<a href=\"(http[^\"]+)\"[^>]*>Website.*</a>!Uis", $curinfo, $m);
    $currencies[$k]['site'] = $m[1] ?? [];
    preg_match_all("!<a href=\"(http[^\"]+)\"[^>]*>Explorer.*</a>!Uis", $curinfo, $m);
    $currencies[$k]['explorer'] = $m[1] ?? [];
    preg_match_all("!<a href=\"(http[^\"]+)\"[^>]*>Chat.*</a>!Uis", $curinfo, $m);
    $currencies[$k]['chat'] = $m[1] ?? [];
    preg_match_all("!<a href=\"(http[^\"]+)\"[^>]*>Announcement</a>!Uis", $curinfo, $m);
    $currencies[$k]['announcement'] = $m[1][0] ?? null;
    preg_match_all("!<a href=\"(http[^\"]+)\"[^>]*>Source Code</a>!Uis", $curinfo, $m);
    $currencies[$k]['sourceCode'] = $m[1][0] ?? null;
    preg_match_all("!<a href=\"(http[^\"]+)\"[^>]*>Technical Documentation</a>!Uis", $curinfo, $m);
    $currencies[$k]['documentation'] = $m[1][0] ?? null;
    preg_match_all('!(Max|Total) Supply.*<span data-format-supply data-format-value="([\d\.e\+]+)">!Uism', $curinfo, $m);
    $currencies[$k]['supply'] = $m[2][0] ?? null;
    preg_match_all('!<span class="label label-warning">(.*)</span>!Uism', $curinfo, $m);
    foreach ($m[1] ?? [] as $tag) {
        if ($tag === 'Coin') {
            $currencies[$k]['type'] = 'coin';
        } elseif ($tag === 'Token') {
            $currencies[$k]['type'] = 'token';
        } elseif ($tag === 'Mineable') {
            $currencies[$k]['mineable'] = true;
        } else {
            var_export($tag);
        }
    }
}

foreach ($currencies as $currency) {
    $mysql->insert('currency_crypto', [
        'id' => $currency['id'],
        'code' => $currency['code'],
        'name' => $currency['name'],
        'logo' => $currency['logo'],
        'explorer' => json_encode($currency['explorer']),
        'site' => json_encode($currency['site']),
        'chat' => json_encode($currency['chat']),
        'announcement' => $currency['announcement'],
        'confirmations' => null,
        'supply' => floatval($currency['supply']),
        'source_code' => $currency['sourceCode'],
        'documentation' => $currency['documentation'],
        'type' => $currency['type'],
        'is_mineable' => ($currency['mineable'] ?? false) ? 1 : 0,
    ]);
}
