<?php

namespace Code\Session;



class Session
{
	
	public static function iniciarSessao() {

		// se a sessão já existir, não faz nada
		if (session_status() !== PHP_SESSION_NONE) {

			return;
		}

		// senão, inicia uma nova sessão
		session_start();
	}

	public static function adicionar($key, $value) {

		self::iniciarSessao();

		$_SESSION[$key] = $value;

	}

	public static function remover($key) {

		self::iniciarSessao();

		if (isset($key)) {
			
			unset($_SESSION[$key]);
		}
	}

	public static function clear() {

		self::iniciarSessao();

		session_destroy();
		$_SESSION = [];
	}

	public static function has($key) {

		self::iniciarSessao();

		// verifica se existe determinada chave na sessão
		return isset($_SESSION[$key]);
	}

	public static function get($key) {

		self::iniciarSessao();

		return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
		
	}

}