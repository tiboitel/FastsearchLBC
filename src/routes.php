<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->group('', 
	function() 
	{
		$this->get('/', \App\Controllers\SearchController::class . ':show')->setName('search.show');
		$this->post('/search', \App\Controllers\SearchController::class . ':search')->setName('search.search');
	}
);
