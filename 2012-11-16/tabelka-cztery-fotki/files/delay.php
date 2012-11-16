<?php

/*
 * Skrypt imitujący ograniczenie przepustowości serwera
 * Każde żądanie HTTP będzie wstrzymane na SLEEP_TIMEOUT sekund
 *
 * (c)2010 gajdaw
 */


define('SLEEP_TIMEOUT', rand(1, 10));

require_once 'url-manage.inc.php';

$url = url_manage_get_friendly_url();

$url = preg_replace('/\?_=\d+$/', '', $url);

$filename = 'files' . $url;

if (file_exists($filename)) {
    sleep(SLEEP_TIMEOUT);
    $p = file_get_contents($filename);
    echo $p;
} else {
    sleep(SLEEP_TIMEOUT);
    header('HTTP/1.x 404 Not Found');
}