<?php

if (!array_key_exists('PING_URL', $_SERVER) || empty($_SERVER['PING_URL'])) {
    echo 'Please specify "PING_URL" environment variable to continue.';
    exit;
}

$start_time = time();

$url = $_SERVER['PING_URL'];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 90);

curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com');
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36');

$ret = curl_exec($ch);
$end_time = time();

echo 'URL: ' . $url . PHP_EOL;
echo 'HTTP Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) . PHP_EOL;
echo 'Length: ' . strlen($ret) . ' bytes' . PHP_EOL;
echo 'Duration: ' . ($end_time - $start_time) . ' sec' . PHP_EOL;

curl_close($ch);
