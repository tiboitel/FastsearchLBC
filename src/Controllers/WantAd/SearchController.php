<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Interop\Container\ContainerInterface;
use Lazer\Classes\Database as Lazer;

class SearchController extends AbstractController
{
	protected $db;

	public function __construct(ContainerInterface $container)
	{
		parent::__construct($container);
	}

	public function show(Request $request, Response $response)
	{
		$response = $this->renderer->render($response, 'index.phtml');
	}

	public function update()
	{
	}

	public function validateSearchRequest($value, $user_id)
	{
	}
}
