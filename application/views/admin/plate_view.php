
	<?php $this->load->view('admin/inc/admin_header_view') ?>

	<div id="nc-main">
		<div class="panel">
				<div class="add-plate">
					<button type="button" data-action="<?= base_url() ?>process/nuevo_plato">Nuevo plato</button>
				</div>
				<?php $i = 0;
				foreach ($findAllPlate->result() as $plate):
				echo '
				<div class="table-plate">
					<span>' . ++$i . '</span>
					<img src="' . base_url() . 'assets/images/' . $plate->image . '" alt="">
					<span>' . $plate->name . '</span>

					<div class="group-action">
						<a href="#" data-id="' . $plate->idPlate . '" data-action="' . base_url() . 'process/platos"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					</div>

					<div class="group-delete">
						<a href="#" data-id="' . $plate->idPlate . '" data-action="' . base_url() . 'process/eliminar_plato"><i class="fa fa-check" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-close" aria-hidden="true"></i></a>
					</div>
				</div>';
				endforeach;
				?>
		</div>
	</div>

	<div id="modal-plate"></div>

	<?php $this->load->view('admin/inc/admin_footer_view') ?>









