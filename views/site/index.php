
<?php
	require VIEWS_PATH . 'includes/_header.php';
?>

	<div class="container">
		<h1 style="margin: 15px 0 30px;">Painel de Gastos Pessoais</h1>
			<p>Controle seus gastos pessoais de forma inteligente e divertida.</p>
		  	<a href="<?=URL_BASE;?>/expense/create" class="btn btn-success mb-2 botao">Novo</a>
		  	<a href="<?=URL_BASE;?>/expense" class="btn btn-info mb-2 botao">Listar</a>
	
	</div>

<?php
	require VIEWS_PATH . 'includes/_footer.php';
?>