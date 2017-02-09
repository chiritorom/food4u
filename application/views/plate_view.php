<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<title>FOOD4U | <?= $title ?></title>

	<?php $this->load->view('inc/header_common'); ?>

</head>
<body>
	<?php $this->load->view('inc/header'); ?>

	<div id="ncode">
		<div class="container">
			<section class="plate">
				<div class="img-plate">
					<img src="<?= base_url() ?>assets/images/platos/<?= $dataPlate->image ?>" alt="">
				</div>

				<div class="description-plate">
					<?php
						echo '
						<h2>' . $dataPlate->name . '</h2>
				     	<p>S/. ' . $dataPlate->price . '</p>' . 

						form_open(base_url() . 'processUser/actualizar_item', array('id' => 'countPlate')) .
						form_input(array('name' => 'count', 'value' => 1, 'type' => 'number', 'min' => 1)) .
						form_hidden('id', $dataPlate->idPlate) .
						form_hidden('imagen', $dataPlate->image) .
						form_hidden('nombre', $dataPlate->name) .
						form_hidden('precio', $dataPlate->price) .
						form_submit('', 'Añadir') .
						form_close();
					?>

					<div id="tabs-plate">
					  <ul>
					    <li><a href="#tabs-1" class="active">Descripción</a></li>
					    <li><a href="#tabs-2">Ingredientes</a></li>
					  </ul>
					  <div id="tabs-1">
					   <?= $dataPlate->description  ?>
					  </div>
					  <div id="tabs-2">
					    <?= $dataPlate->ingredients  ?>
					  </div>
					</div>
				</div>
			</section>			
		</div>
	</div>

	<?php $this->load->view('inc/footer'); ?>

    <?php $this->load->view('inc/footer_common'); ?>
</body>
</html>