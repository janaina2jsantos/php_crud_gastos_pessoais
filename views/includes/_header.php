<!DOCTYPE html>
<html>
<head>
	<title>Aula PHP - Projeto 03</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

	<style type="text/css">
		.navbar-light {
			padding: 10px 25px;
		}
	</style>

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  	<div class="container-fluid">
	    	<a class="navbar-brand" href="#">PHP POO</a>
	    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      	<span class="navbar-toggler-icon"></span>
	    	</button>
	    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		      	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			        <li class="nav-item">
			          	<a class="nav-link active" aria-current="page" href="<?=URL_BASE;?>/" id="home">Home</a>
			        </li>
			        <li class="nav-item">
			          	<a class="nav-link" href="<?=URL_BASE;?>/expense">Despesas</a>
			        </li>
			        <li class="nav-item">
			          	<a class="nav-link" href="<?=URL_BASE;?>/categoria">Categorias</a>
			        </li>
		      	</ul>
		      	<form class="d-flex">
					<?php if(\Code\Session\Session::has('user')):?>
		      			<a href="<?=URL_BASE;?>/auth/logout" class="btn btn-link">sair</a>
    				<?php endif;?>
		      	</form>
	    	</div>
	  	</div>
	</nav>


     
    
