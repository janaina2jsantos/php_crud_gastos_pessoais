<?php


namespace Code\View;


class View
{
	
	private $view;
	private $data = [];

	
	public function __construct($view)
	{
		$this->view = $view;
	}

	// pegar as propriedades que foram definidas no __set de forma dinâmica
	public function __get($index)
	{
		return $this->data[$index];
	}

	// criar propriedades de forma dinâmica
	public function __set($index, $value)
	{
		$this->data[$index] = $value;
	}

	public function render($value='')
	{
		ob_start();
		require VIEWS_PATH . $this->view;
		return ob_get_clean();
	}

}