<?php

namespace Code\Controllers;
use Code\View\View;
use Code\Models\Expense;
use Code\Models\Categoria;
use Code\Models\User;
use Code\DB\Connection;
use Code\Session\Session;
use Code\Session\FlashMessage;



class ExpenseController
{

	public function index()
	{	
		if (!Session::has('user')) {
		
			FlashMessage::add('danger', 'Faça login para acessar seu painel.');
			return header('Location: ' . URL_BASE . '/auth/login');
		}

		$pdo = Connection::getConnection();
		$expenses = new Expense($pdo);

		$view = new View('expenses/index.php');
		$view->expenses = $expenses->findAll();

		return $view->render();

	}

	public function create()
	{
		if (!Session::has('user')) {
		
			FlashMessage::add('danger', 'Faça login para acessar seu painel.');
			return header('Location: ' . URL_BASE . '/auth/login');
		}

		$pdo = Connection::getConnection();
		$categorias = new Categoria($pdo);
		$users = new User($pdo);

		$view = new View('expenses/create.php');
		$view->categorias = $categorias->findAll();
		$view->users = $users->findAll();

		// var_dump($view->categorias);die;
		return $view->render();
	}

	public function store()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if ($method == 'POST') {

			$data = $_POST;
			$expense = new Expense(Connection::getConnection());
			$expense->insert($data);

			FlashMessage::add('success', 'Cadastro realizado com sucesso.');
			return header('Location: ' . URL_BASE . '/expense');
		}
		
	}

	public function edit($id)
	{
		if (!Session::has('user')) {
		
			FlashMessage::add('danger', 'Faça login para acessar seu painel.');
			return header('Location: ' . URL_BASE . '/auth/login');
		}

		$pdo = Connection::getConnection();
		$categorias = new Categoria($pdo);
		$users = new User($pdo);
		$expense = new Expense($pdo);

		$view = new View('expenses/edit.php');
		$view->categorias = $categorias->findAll();
		$view->users = $users->findAll();
		$view->expense = $expense->find($id);

		return $view->render();
	}

	public function update($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if ($method == 'POST') {

			$data = $_POST;
			$data['id'] = $id;
			
			$expense = new Expense(Connection::getConnection());
			$expense->update($data);

			FlashMessage::add('success', 'Alteração realizada com sucesso.');
			return header('Location: ' . URL_BASE . '/expense');
		}
	}

	public function delete($id)
	{
		$pdo = Connection::getConnection();
		$expense = new Expense($pdo);
		$expense->delete($id);

		return header('Location: ' . URL_BASE . '/expense');
	}

}