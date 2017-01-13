<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel FOOD4U</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600i,700" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/normalize.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/ncode.css"></head>
<body>
	<header>
		<div id="logo">
			<a href="<?= base_url() ?>f4u-admin"><img src="<?= base_url() ?>assets/images/logo.svg" alt=""></a>
		</div>

		<div id="breadcrumb">
			<a href="#">Estas en - <?= $page ?></a>
		</div>

		<div id="options">
			<a href="">Cerrar sesión</a>
		</div>
	</header>

	<aside>
		<div class="profile">
			<a href="<?= base_url() ?>admin/dashboard">
				<i class="fa fa-2x fa-user" aria-hidden="true"></i>
				<p>Bienvenido <br> Carlos Alexander</p>
			</a>	
		</div>

		<h2>Secciones</h2>

		<ul>
			<li><a href="<?= base_url() ?>admin/platos"><i class="fa fa-book" aria-hidden="true"></i> Platos</a></li>
			<li><a href="<?= base_url() ?>"><i class="fa fa-book" aria-hidden="true"></i> Slider</a></a></li>
			<li><a href="<?= base_url() ?>"><i class="fa fa-book" aria-hidden="true"></i> Cómo funciona</a></a></li>
			<li><a href="<?= base_url() ?>"><i class="fa fa-book" aria-hidden="true"></i> Nosotros</a></a></li>
			<li><a href="<?= base_url() ?>"><i class="fa fa-book" aria-hidden="true"></i> Blog</a></a></li>
			<li><a href="<?= base_url() ?>"><i class="fa fa-book" aria-hidden="true"></i> Contacto</a></a></li>
		</ul>

		<h2>Páginas</h2>

		<ul>
			<li><a href="<?= base_url() ?>" ><i class="fa fa-book" aria-hidden="true"></i> Inicio</a></li>
			<li><a href="<?= base_url() ?>"><i class="fa fa-book" aria-hidden="true"></i> Nuestros platos</a></a></li>
			<li><a href="<?= base_url() ?>"><i class="fa fa-book" aria-hidden="true"></i> Cómo funciona</a></a></li>
			<li><a href="<?= base_url() ?>"><i class="fa fa-book" aria-hidden="true"></i> Nosotros</a></a></li>
			<li><a href="<?= base_url() ?>"><i class="fa fa-book" aria-hidden="true"></i> Blog</a></a></li>
			<li><a href="<?= base_url() ?>"><i class="fa fa-book" aria-hidden="true"></i> Contacto</a></a></li>
		</ul>
	</aside>