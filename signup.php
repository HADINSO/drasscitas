<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="signup-frm">
		<div class="form-group">
			<label for="" class="control-label">Nombre</label>
			<input type="text" name="name" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Telefono</label>
			<input type="text" name="contact" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Direccion</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">E-mail</label>
			<input type="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contraseña</label>
			<input type="password" name="password" required="" class="form-control">
		</div>
		<button class="button btn btn-info btn-sm">Crear cuenta</button>
	</form>
</div>

<style>
	#uni_modal .modal-footer {
		display: none;
	}
</style>
<script>
	$('#signup-frm').submit(function(e) {
		e.preventDefault()
		$('#signup-frm button[type="submit"]').attr('disabled', true).html('Saving...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'admin/ajax.php?action=signup',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success: function(resp) {
				if (resp == 1) {
					location.reload();
				} else {
					$('#signup-frm').prepend('<div class="alert alert-danger">Ya existe el correo electrónico.</div>')
					$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		})
	})
</script>