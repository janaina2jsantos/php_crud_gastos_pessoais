
<?php
	require VIEWS_PATH . 'includes/_header.php';
?>
	
	<style type="text/css">

		.btn-acoes {
			display: flex;
		}
		.btn-acoes form a {
			margin-left: 5px;
		}
		.strong {
			font-weight: bold;
			color: #5e6469;
		}

	</style>

	<div class="container">
		<div class="col-md-12">
			<?php require VIEWS_PATH . 'includes/_messages.php';?>
		</div>
		<h1 style="margin: 15px 0 30px;">Gastos Pessoais</h1>
		<a href="<?=URL_BASE;?>/expense/create" class="btn btn-success mb-2 botao">Novo</a>
		<table class="table">
		  	<thead>
			    <tr>
			      	<th scope="col">#</th>
			      	<th scope="col">Categoria</th>
			      	<th scope="col">Usuário</th>
			      	<th scope="col">Valor</th>
			      	<th scope="col">Descrição</th>
			      	<th scope="col">Ações</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach ($this->expenses as $exp):?>
		  			<tr>
				      	<td class="strong"><?=$exp['id']?></td>
				      	<td><?=$exp['categoria_id']?></td>
				      	<td><?=$exp['user_id']?></td>
				      	<td>R$ <?=number_format($exp['valor'], 2, ',', '.')?></td>
				      	<td><?=substr(strip_tags($exp['descricao']), 0, 60) . '...'?></td>
				      	<td class="btn-acoes">
		  					<a href="<?=URL_BASE;?>/expense/edit/<?=$exp['id'];?>" class="btn btn-sm btn-secondary mb-2 botao">Editar</a>
		  					<form action="<?=URL_BASE;?>/expense/delete/<?=$exp['id']?>" method="delete">
		  						<a href="<?=URL_BASE;?>/expense/delete/<?=$exp['id']?>" class="btn btn-sm btn-danger mb-2 botao" onclick="return confirm('Tem certeza que deseja deletar esse registro?')">Deletar</a>
		  					</form>
				      	</td>
			    	</tr>
		  		<?php endforeach;?>
		 	 </tbody>
		</table>
	</div>

<?php
	require VIEWS_PATH . 'includes/_footer.php';
?>