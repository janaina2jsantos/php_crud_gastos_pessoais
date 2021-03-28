<?php

namespace Code\Controllers;
use Code\View\View;
use Code\Models\User;
use Code\DB\Connection;
use Code\Auth\Authenticator;
use Code\Session\FlashMessage;



class AuthController
{	
	
	public function login()
	{

		$method = $_SERVER['REQUEST_METHOD'];

		if ($method == 'POST') {

			$pdo = Connection::getConnection();
			$user = new User($pdo);
			$auth = new Authenticator($user);

			if (!$auth->login($_POST)) {
				
				FlashMessage::add('danger', 'Usuário ou senha incorretos.');
				return header('Location: ' . URL_BASE . '/auth/login');
			}

			// FlashMessage::add('success', 'Usuário logado com sucesso.');
			return header('Location: ' . URL_BASE . '/expense');
		}
		
		$view = new View('auth/index.php');

		return $view->render();
	}

	public function logout()
	{	
		$auth = new Authenticator();
		$auth->logout();

		FlashMessage::add('warning', 'Usuário deslogado.');
		return header('Location: ' . URL_BASE . '/auth/login');
	}

}