<?php

defined('DS') ?: define('DS', DIRECTORY_SEPARATOR);
defined('ROOT') ?: define('ROOT', dirname(__DIR__) . DS);

/*if (file_exists(ROOT . '.env')) {
}*/

return [
	'settings' => [
		'displayErrorDetails'		=> getenv('APP_DEBUG') === 'true' ? true ; false,
		'addContentLengthHeader'	=> false,
		'app'						=> [
			'name' => getenv('APP_NAME'),
			'url' => getenv('APP_URL'),
			'env' => getenv('APP_ENV'),
	],

	'renderer' => [
		'template_path' => __DIR__ . '/../template/',
	],

	'jwt' => [
		'secret' => getenv('JWT_SECRET'),
		'secure' => false,
		'header' => "Authorization",
		"regexp" => "/Token\s+(.*)$/i",
		'passthrough' => ['OPTIONS']
	],
];
