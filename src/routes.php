<?php

$app->get('/', function(Slim\Http\Request $request, Slim\Http\Response $response, array $args) {
	$response = $this->renderer->render($response, 'index.phtml');	
	return $response;
});
