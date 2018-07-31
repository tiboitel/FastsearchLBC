<?php

$app->get('/', function(Slim\Http\Request $request, Slim\Http\Response $response, array $args) {
	$response->getBody()->write("Hello World!");
	return $response;
});
