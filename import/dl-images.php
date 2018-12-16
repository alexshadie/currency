<?php

include __DIR__ . "/../vendor/autoload.php";
$config = @include(__DIR__ . "/../config/config.php");

$mysql = new \alexshadie\dbwrapper\Mysql(
    new PDO($config['db.dsn'], $config['db.user'], $config['db.password'])
);

$currencies = $mysql->queryAll("SELECT `id`, `logo` FROM `currency_crypto`");

$size = "32x32";
foreach ($currencies as $c) {
    echo "Getting {$c['id']}\n";
    if (is_file(__DIR__ . "/img/{$size}/" . $c['id'] . ".png")) {
        continue;
    }
    $logo = str_replace('16x16', $size, $c['logo']);
    $f = file_get_contents($logo);
    if ($f) {
        file_put_contents(__DIR__ . "/img/{$size}/" . $c['id'] . ".png", $f);
    } else {
        die();
    }
}
