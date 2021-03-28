<?php


namespace Code\Controllers;
use Code\View\View;
use Code\Models\Produto;
use Code\DB\Connection;



class HomeController
{

	public function index()
	{
		// $pdo = Connection::getConnection();
		$view = new View('site/index.php');

		return $view->render();
	}

}