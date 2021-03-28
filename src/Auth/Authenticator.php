<?php

namespace Code\Auth;
use Code\Session\Session;
use Code\Models\User;



class Authenticator
{
	
	private $user;
	

	public function __construct(User $user = null) 
	{
		$this->user = $user;
	}

	public function login(array $credentials)
	{
		$user = current($this->user->where([

			'email' => $credentials['email']

		]));

		if (!$user) {
			
			return false;
		}

		if ($user['password'] !== $credentials['password']) {
			
			return false;
		}

		// eliminar a chave password da sessão
		unset($user['password']);

		Session::adicionar('user', $user);

		return true;
	}

	public function logout()
	{
		if (Session::has('user')) {
			
			Session::remover('user');
		}

		Session::clear();
	}
}

