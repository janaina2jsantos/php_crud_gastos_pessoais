
<?php
	require VIEWS_PATH . 'includes/_header.php';
?>
	<style type="text/css">

		label {
			margin: 30px 0 0;
		}

		.botao {
			margin: 15px 0 0;
		}

		.container {
			padding: 0 170px;
		}

	</style>

	<div class="container">
		<div class="col-md-12">
			<?php require VIEWS_PATH . 'includes/_messages.php';?>
		</div>
		<div class="col-md-6">
			<form action="<?=URL_BASE;?>/auth/login" method="POST">
				<div class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input type="email" class="form-control" placeholder="Email" name="email">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" placeholder="Senha" name="password">
				</div>
				<button type="submit" class="btn btn-default btn-success pull-right botao">Acessar</button>
			</form>
		</div>
	</div>

<?php
	require VIEWS_PATH . 'includes/_footer.php';
?>