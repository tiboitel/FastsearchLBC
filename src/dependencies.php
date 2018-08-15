<?php

$container = $app->getContainer();

$container['renderer'] = function ($c) {
	$settings = $c->get('settings')['renderer'];
	file_put_contents('/tmp/settings_log.txt', $settings['template_path']);
	return new \Slim\Views\PhpRenderer($settings['template_path']);
};
