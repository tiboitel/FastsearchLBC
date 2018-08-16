<?php
namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Lazer\Classes\Database as Lazer;

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
		return ($response);
	}

	public function update(Request $request, Response $response)
	{
		return ($response);
	}

	public function validateSearchRequest($value, $user_id)
	{
	}
}
