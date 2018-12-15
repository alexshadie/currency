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
    $mysql->insert('currency', [
        'id' => $item['numeric_code'],
        'code' => $item['alpha_code'],
        'type' => 'fiat',
        'name' => $item['name'],
        'country_name' => $item['country'],
        'unit' => intval($item['unit']) ? intval($item['unit']) : 0,
        'country_id' => $item['country_id'] ?? null,
    ]);
}

