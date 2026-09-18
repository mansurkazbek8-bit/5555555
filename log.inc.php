<?php
$dt = time();
$page = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
$path = $dt . '|' . $page . '|' . $ref . PHP_EOL;
$logFile = __DIR__ . '/../log/' . PATH_LOG;

file_put_contents($logFile, $path, FILE_APPEND | LOCK_EX);
