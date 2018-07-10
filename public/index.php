<?php

if (PHP_SAPI == 'cli-server') {
	$url = parse_url($_SERVER['REQUEST_URI']);
	$file = __DIR__ . $url['path'];
	if (is_file($file)) {
		return (false);
	}
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

$settings = require __DIR__ . '/../src/dependencies.php';
$app = new \Slim\App($settings);
$settings = require __DIR__ . '/../src/middleware.php';
$settings = require __DIR__ . '/../src/routes.php';

$app->run();
