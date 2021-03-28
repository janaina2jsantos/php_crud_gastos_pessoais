<?php


require __DIR__ . '/bootstrap.php';
use Code\View\View;


// var_dump($_SERVER);
// var_dump($_SERVER['REQUEST_URI']);

$url = $_SERVER['REQUEST_URI'];
$url = substr($_SERVER['REQUEST_URI'], 1);
// converte a string em array
$url = explode('/', $url);

// controller: se na url existir um param no índice 0, e tiver valor, pega esse param, senão o default é page.
$controller = isset($url[0]) && $url[0] ? $url[0] : 'home';
// método: se na url existir um param no índice 1, e tiver valor, pega esse param, senão o default é index.
$action     = isset($url[1]) && $url[1] ? $url[1] : 'index';
// parâmetros: se existir no índice 2, pega o valor, senão o default é null.
$param      = isset($url[2]) && $url[2] ? $url[2] : null;

// concatenando o nome do controller com a palavra Controller, e verificando se o controller existe.
if (!class_exists($controller = "Code\Controllers\\" . ucfirst($controller) . 'Controller')) {
	
	// die('404 - Página não encontrada.');
	$view = new View('404.php');
	print $view->render();
	die;
}

// se o método não existir,
if (!method_exists($controller, $action)) {
	// vai chamar o método index do controller e vai considerar o parâmetro na casa 1.
	$action = 'index';
	$param  = $url[1];
}

$response = call_user_func_array([$controller, $action], [$param]);

print $response;














