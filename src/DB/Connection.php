<?php


namespace Code\DB;


class Connection
{

	private static $conn = null;


	public static function getConnection() 
	{
		if (is_null(self::$conn)) {
			
			self::$conn = new \PDO('mysql:dbname=my_expenses;host=127.0.0.1', 'root', '');
			// habilitando exibiçao de erro na página
			self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
			self::$conn->exec('SET NAMES UTF8');
		}

		return self::$conn;
	}
}
