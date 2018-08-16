<?php
$container = $app->getContainer();

$container['renderer'] = function ($c) {
	$settings = $c->get('settings')['renderer'];
	return new \Slim\Views\PhpRenderer($settings['template_path']);
};

$container[\App\Controllers\SearchController::class] = function($c) {
	return new \App\Controllers\SearchController($c);
};
