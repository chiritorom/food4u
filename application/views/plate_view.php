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
					<img src="<?= base_url() ?>assets/images/<?= $dataPlate->image ?>" alt="">
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
					    <li><a href="#tabs-1">Descripción</a></li>
					    <li><a href="#tabs-2">Ingredientes</a></li>
					  </ul>
					  <div id="tabs-1">
					   <?= $dataPlate->description  ?>
					  </div>
					  <div id="tabs-2">
					    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
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