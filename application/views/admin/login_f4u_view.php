<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login FOOD4U</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600i,700" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/normalize.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/ncode.css"></head>
<body>
	<div id="nc-login">
		<form action="<?= base_url() ?>admin/login" method="post">
			<div class="nc-login-form">
				<img src="<?= base_url() ?>assets/images/logo.svg" alt="">
				<label for="">Usuario</label>
				<input type="text" name="user" placeholder="Usuario">
				<label for="">Contraseña</label>
				<input type="password" name="password" placeholder="Contraseña">

				<input type="submit" value="Ingresar">
			</div>
		</form>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/login.js"></script>
</body>
</html>