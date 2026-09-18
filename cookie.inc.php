<?php
$visitCounter = 0;
$hasVisitCookie = isset($_COOKIE['visitCounter']);

if ($hasVisitCookie) {
	$visitCounter = (int) $_COOKIE['visitCounter'];
}

$lastVisit = '';
$hasLastVisitCookie = isset($_COOKIE['lastVisit']);

if ($hasLastVisitCookie) {
	$lastVisitTimestamp = (int) $_COOKIE['lastVisit'];
	$lastVisit = date('d-m-Y H:i:s', $lastVisitTimestamp);
}

$isNewDay = !$hasLastVisitCookie || date('d-m-Y', (int) $_COOKIE['lastVisit']) !== date('d-m-Y');

if ($isNewDay) {
	$visitCounter++;
	setcookie('visitCounter', (string) $visitCounter, time() + 365 * 24 * 60 * 60);
	setcookie('lastVisit', (string) time(), time() + 365 * 24 * 60 * 60);
}
