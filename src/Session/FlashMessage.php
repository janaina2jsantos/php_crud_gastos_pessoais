<?php

namespace Code\Session;
use Code\Session\Session;



class FlashMessage
{
	
	public static function add($key, $message) {

		Session::adicionar($key, $message);
	}

	public static function get($key) {

		$msg = Session::get($key);
		Session::remover($key);

		return $msg;
	}
}
