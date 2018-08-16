<?php
namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Lazer\Classes\Database as Lazer;
use pdeans\Http\Client;

class SearchController extends AbstractController
{
	protected $renderer;

	public function __construct($container)
	{
		parent::__construct($container);
		$this->renderer = $container->renderer;
	}

	public function show(Request $request, Response $response)
	{
		$response = $this->renderer->render($response, 'index.phtml');
		return $response;
	}

	public function search(Request $request, Response $response, $args)
	{	
		$client = new Client([
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => 0
		]);
		$args = $request->getParsedBody();
		$search_data = [];
		$search_data['request'] = filter_var($args['searchRequest']);
		if (isset($args['searchInExactTerms']) && !empty($args['searchInExactTerms']))
			$search_data['request'] = '\'' . $search_data['request'] . '\'';
		if (isset($args['searchInTitle']) && !empty($args['searchInTitle']))
			$search_data['searchInTitle'] = true;
		$search_data['searchNotInclude'] = filter_var($args['searchNotInclude']);
		$base_url = 'https://www.leboncoin.fr/recherche/?text=';
		$base_url .= urlencode($search_data['request']);
		$base_url .= "&regions=12";
		if ($search_data['searchInTitle'] == true)
			$base_url .= "&search_in=subject";
		$base_url .= "&sort=price&order=asc";
		$http_response = $client->get($base_url);
		$header = file_get_contents("../templates/index.phtml");
		$header .= $http_response->getBody();
		$response->getBody()->write($header);
	}

	public function validateSearchRequest($value, $user_id)
	{
	}
}
