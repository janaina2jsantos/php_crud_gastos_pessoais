
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
		<h1 style="margin: 15px 0 30px;">Editar Gasto</h1>
		<hr>
		<form action="<?=URL_BASE;?>/expense/update/<?=$this->expense['id']?>" method="POST">
		  	<div class="form-group">
		    	<label>Valor</label>
		    	<input type="text" class="form-control" name="valor" value="<?=$this->expense['valor']?>" />
		  	</div>

		  	<div class="form-group">
		    	<label>Categoria</label>
		    	<select class="form-control" name="categoria_id">
			      	<option selected="selected" disabled="">Selecione</option>
			    	<?php foreach ($this->categorias as $categoria):?>
			      		<option value="<?=ucfirst($categoria['id'])?>"
			      			<?php if($categoria['id'] == $this->expense['categoria_id']):?>
			      				selected
			      			<?php endif;?>
			      			><?=ucfirst($categoria['nome'])?></option>
			  		<?php endforeach;?>
		    	</select>
		  	</div>

		  	<div class="form-group">
		    	<label>Usuário</label>
		    	<select class="form-control" name="user_id">
			      	<option selected="selected" disabled="">Selecione</option>
			    	<?php foreach ($this->users as $user):?>
			      		<option value="<?=$user['id']?>"
			      			<?php if($user['id'] == $this->expense['user_id']):?>
			      				selected
			      			<?php endif;?>
			      			><?=$user['first_name']?></option>
			  		<?php endforeach;?>
		    	</select>
		  	</div>

		  	<div class="form-group">
		    	<label>Descrição</label>
		    	<textarea class="form-control" rows="5" name="descricao"><?=$this->expense['descricao']?></textarea>
		  	</div>
		  	<button type="submit" class="btn btn-primary mb-2 botao">Salvar</button>
		  	<a href="<?=URL_BASE;?>/expense" class="btn btn-secondary mb-2 botao">Cancelar</a>
		</form>
	</div>

<?php
	require VIEWS_PATH . 'includes/_footer.php';
?>