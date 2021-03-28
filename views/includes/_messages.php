
<?php if(\Code\Session\Session::has('success')):?>

	<div class="alert alert-success">
		<?=\Code\Session\FlashMessage::get('success');?>
	</div>

<?php endif;?>


<?php if(\Code\Session\Session::has('warning')):?>

	<div class="alert alert-warning">
		<?=\Code\Session\FlashMessage::get('warning');?>
	</div>

<?php endif;?>


<?php if(\Code\Session\Session::has('danger')):?>

	<div class="alert alert-danger">
		<?=\Code\Session\FlashMessage::get('danger');?>
	</div>

<?php endif;?>