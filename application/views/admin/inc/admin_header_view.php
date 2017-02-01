<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel FOOD4U</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,600i,700" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/normalize.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/froala_editor.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/ncode.css">
</head>
<body>
	<header>
		<div id="logo">
			<a href="<?= base_url() ?>f4u-admin"><img src="<?= base_url() ?>assets/images/logo.svg" alt=""></a>
		</div>

		<div id="breadcrumb">
			<a href="#">Estas en - <?= $page ?></a>
		</div>

		<div id="options">
			<a href="<?= base_url() ?>admin/logout">Cerrar sesión</a>
		</div>
	</header>

	<aside>
		<div class="profile">
			<a href="<?= base_url() ?>admin/dashboard">
				<i class="fa fa-2x fa-user" aria-hidden="true"></i>
				<p>Bienvenido <br> <?= $this->session->userdata('user_admin_name') ?></p>
			</a>	
		</div>

		<h2>Secciones</h2>

		<ul>
			<li><a href="<?= base_url() ?>admin/platos"><i class="fa fa-book" aria-hidden="true"></i> Platos</a></li>
		</ul>
<!--
		<h2>Páginas</h2>

		<ul>
			<?php foreach ($this->Page->findAll()->result() as $page) {
			echo '<li><a href="' . base_url() . 'admin/paginas/' . $page->url . '"><i class="fa fa-book" aria-hidden="true"></i> ' . $page->name . '</a></li>';
			} ?>
		</ul>
-->
		<h2>Usuarios</h2>

		<ul>
			<li><a href="<?= base_url() ?>admin/administrador"><i class="fa fa-book" aria-hidden="true"></i> Administrador</a></li>
			<li><a href="<?= base_url() ?>admin/clientes"><i class="fa fa-book" aria-hidden="true"></i> Clientes</a></li>
		</ul>
	</aside>