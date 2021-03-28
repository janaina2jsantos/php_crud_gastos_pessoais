<?php

namespace Code\Controllers;
use Code\View\View;
use Code\Models\Categoria;
use Code\DB\Connection;
use Code\Session\Session;
use Code\Session\FlashMessage;



class CategoriaController
{

	public function index()
	{	
		if (!Session::has('user')) {
		
			FlashMessage::add('danger', 'Faça login para acessar seu painel.');
			return header('Location: ' . URL_BASE . '/auth/login');
		}

		$pdo = Connection::getConnection();
		$categorias = new Categoria($pdo);

		$view = new View('categorias/index.php');
		$view->categorias = $categorias->findAll();

		return $view->render();

	}

	public function create()
	{
		if (!Session::has('user')) {
		
			FlashMessage::add('danger', 'Faça login para acessar seu painel.');
			return header('Location: ' . URL_BASE . '/auth/login');
		}

		$view = new View('categorias/create.php');
		
		return $view->render();
	}

	public function store()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if ($method == 'POST') {

			$data = $_POST;
			$categoria = new Categoria(Connection::getConnection());
			$categoria->insert($data);

			FlashMessage::add('success', 'Cadastro realizado com sucesso.');
			return header('Location: ' . URL_BASE . '/categoria');
		}
		
	}

	public function edit($id)
	{
		if (!Session::has('user')) {
		
			FlashMessage::add('danger', 'Faça login para acessar seu painel.');
			return header('Location: ' . URL_BASE . '/auth/login');
		}

		$pdo = Connection::getConnection();
		$categoria = new Categoria($pdo);

		$view = new View('categorias/edit.php');
		$view->categoria = $categoria->find($id);

		return $view->render();
	}

	public function update($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if ($method == 'POST') {

			$data = $_POST;
			$data['id'] = $id;
			
			$categoria = new Categoria(Connection::getConnection());
			$categoria->update($data);

			FlashMessage::add('success', 'Alteração realizada com sucesso.');
			return header('Location: ' . URL_BASE . '/categoria');
		}
	}

	public function delete($id)
	{
		$pdo = Connection::getConnection();
		$categoria = new Categoria($pdo);
		$categoria->delete($id);

		return header('Location: ' . URL_BASE . '/categoria');
	}

}