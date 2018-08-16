<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->group('/search', 
	function() 
	{
		$this->get('/', \App\Controllers\SearchController::class . ':show');
	}
);

$app->get('/', 'SearchController:show');
