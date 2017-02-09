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
	<?php
		foreach ($findByPage->result() as $data):

			$ncdata = explode('|', $data->data);

			switch($data->idTemplate):
				case 1:
					echo '<section class="banner">
			            <video poster="' . base_url() . 'assets/images/' . $ncdata[0] . '" loop autoplay muted>
			                <source src="' . base_url() . 'assets/video/' . $ncdata[1] . '" type="video/mp4">
			                Tu navegador no soporta video HTML5.
			            </video>   

			            <div class="banner-content">
			                <div class="container">
			                	<div class="banner-text">
				                    <h2>' . $ncdata[2] . '</h2>
				                    <p>' . $ncdata[3] . ' <br>' . $ncdata[4] . '</p>
				                    <a href="' . base_url() . $ncdata[6] . '">' . $ncdata[5] . '</a>
			                    </div>
			                </div>
			    	    </div>
			        </section>';
					break;
				case 2:
					echo '
					<div class="container">
						<section class="service">
				            <div class="services">
				                <article>
				                    <img src="' . base_url() . 'assets/images/service01.png" alt="">
				                    <h3>' . $ncdata[0] . '</h3>
				                    <p>' . $ncdata[1] . '</p>
				                </article>
				            </div>
				            
				            <div class="services">
				                <article>
				                    <img src="' . base_url() . 'assets/images/service02.png" alt="">
				                    <h3>' . $ncdata[2] . '</h3>
				                    <p>' . $ncdata[3] . '</p>
				                </article>
				            </div>

				            <div class="services">
				                <article>
				                    <img src="' . base_url() . 'assets/images/service03.png" alt="">
				                    <h3>' . $ncdata[4] . '</h3>
				                    <p>' . $ncdata[5] . '</p>
				                </article>
				            </div>

				            <div class="services">
				                <article>
				                    <img src="' . base_url() . 'assets/images/service04.png" alt="">
				                    <h3>' . $ncdata[6] . '</h3>
				                    <p>' . $ncdata[7] . '</p>
				                </article>
				            </div>
			        	</section>
			        </div>';
					break;
				case 3:
					echo '
			    	<section class="slider">
			        	<div class="container">
			                <h2>' . $ncdata[0] . '</h2>

			                <div class="slides">
			                    <div class="this-week">
			                        <img src="' . base_url() . 'assets/images/this-week01.jpg" alt="">
			                        <div class="thumb">
			                        	<h3>Nombre plato 3</h3>
			                        	<p>S/. 9.00</p>
			                        </div>
			                    </div>

			                    <div class="this-week">
			                        <img src="' . base_url() . 'assets/images/this-week02.jpg" alt="">
			                        <div class="thumb">
				                        <h3>Nombre plato 3</h3>
				                        <p>S/.11.00</p>
				                    </div>
			                    </div>

			                    <div class="this-week">
			                        <img src="' . base_url() . 'assets/images/this-week01.jpg" alt="">
			                        <div class="thumb">
				                        <h3>Nombre plato 3</h3>
				                        <p>S/. 10.00</p>
			                        </div>
			                    </div>

			                    <div class="this-week">
			                        <img src="' . base_url() . 'assets/images/this-week01.jpg" alt="">
			                        <div class="thumb">
				                        <h3>Nombre plato 4</h3>
				                        <p>S/. 9.00</p>
			                        </div>
			                    </div>

			                    <div class="this-week">
			                        <img src="' . base_url() . 'assets/images/this-week01.jpg" alt="">
			                        <div class="thumb">
				                        <h3>Nombre plato 5</h3>
				                        <p>S/. 9.00</p>
			                        </div>
			                    </div>
			                </div> 
			            </div>
			        </section>';
			        break;
			    case 4:
			        echo '
			        <section class="options">
			            <div class="option">
			                <div class="link-platos">
			                    <div class="content">
			                       <h2>' . $ncdata[0] . '</h2>
			                        <p>' . $ncdata[1] . '</p>
			                        <a href="' . $ncdata[3] . '">' . $ncdata[2] . '</a> 
			                    </div>
			                </div>

			                <div class="link-mas">
			                    <div class="content">
			                        <h2>' . $ncdata[4] . '</h2>
			                        <p>' . $ncdata[5] . '</p>
			                        <a href="' . $ncdata[7] . '">' . $ncdata[6] . '</a>
			                    </div>
			                </div>
			            </div>
			        </section>';
			        break;
			    case 5:
			        echo '
			        <section class="articles">
			            <div class="container">
			                <h2>Artículos recomendados</h2>

			                <div class="blog">
				                <article>
				                    <img src="' . base_url() . 'assets/images/article01.jpg" alt="">
				                    <a href="#"><h3>Artículo de Blog 1</h3></a>
				                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, facere.</p>
				                </article>

				                <article>
				                    <img src="' . base_url() . 'assets/images/article01.jpg" alt="">
				                    <a href="#"><h3>Artículo de Blog 1</h3></a>
				                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam explicabo laborum eum. Modi ea eligendi iusto necessitatibus veniam unde quaerat ratione omnis.</p>
				                </article>
			                </div>
			            </div>
			        </section>';
			        break;
			    case 6:
			    	echo '
			    	<div class="container">
						<article class="nuestros-platos">';
							foreach ($findAllPlate->result() as $plate):
							echo '
							<div class="plato">
				                <div class="plato-img">
				                    <div class="plato-accion" style="background: url(' . base_url() . 'assets/images/platos/' . $plate->image . ') center; background-size: cover;"></div>
				                    <div class="plato-btn">
				                        <a href="#" data-action="' . base_url() . 'processUser/agregar_carrito" data-plate="' . $plate->idPlate . ',' . $plate->name . ',' . $plate->price . ',1,' . $plate->image . '">Añadir</a>
				                        <a href="' . base_url() . $data->url . '/' . $plate->url . '">Ver</a>
				                    </div>
				                </div>
						         
						        <div class="plate-description">
						        	<h3>' . $plate->name . '</h3>
			                    	<p>S/. ' . $plate->price . '</p>
						        </div>
			                </div>';
			                endforeach;
			                echo'
					    </article>
				    </div>';
				    break;
		    	case 7:
		    		echo '
		    		<div class="container">
						<div class="como-funciona">
							<div class="funcion">
								<div class="icono">
									<img src="' . base_url() . 'assets/images/icono-funcion01.png" alt="">
								</div>

								<div class="descripcion">
									<h3>Diseñamos</h3>
			                        <p>Desde el inicio diseñamos contigo el plan nutricional de acuerdo a los objetivos que quieras lograr, ya sea adelgazar, ganar masa muscular, etc. para que en base a él puedas elegir los platos que comsumirás a diario. Nuestros chefs actualizarán el menú cada semana teniendo en cuenta los ingredientes que se encuentran en su mejor momento el la temporada.</p>
								</div>

								<div class="imagen">
									<img src="' . base_url() . 'assets/images/funcion01.jpg" alt="">
								</div>
							</div>

							<div class="funcion">
								<div class="icono">
									<img src="' . base_url() . 'assets/images/icono-funcion02.png" alt="">
								</div>

								<div class="descripcion">
									<h3>Haces tu pedido</h3>
			                        <p>En 5 minutos aproximadamente podrás armar tu menú de la semana. Selecciona los platos que más te apetezcan hasta el miércoles a las 23:59 horas y los disfrutarás a partir del lunes.</p>
								</div>

								<div class="imagen">
									<img src="' . base_url() . 'assets/images/funcion02.jpg" alt="">
								</div>
							</div>

							<div class="funcion">
								<div class="icono">
									<img src="' . base_url() . 'assets/images/icono-funcion03.png" alt="">
								</div>

								<div class="descripcion">
									<h3>Cocinamos</h3>
			                        <p>Apenas recibimos tu pedido nuestros chefs cogen sus cuchillos y cocinan tus platos como sólo ellos saben. Cortan y saltean, marinan, asan y sofríen. Sin prisa, desde las cocciones más cortas en un wok a largas horas a baja temperatura. Cuidando cada detalle para conseguir el mejor resultado.</p>
								</div>

								<div class="imagen">
									<img src="' . base_url() . 'assets/images/funcion03.jpg" alt="">
								</div>
							</div>

							<div class="funcion">
								<div class="icono">
									<img src="' . base_url() . 'assets/images/icono-funcion04.png" alt="">
								</div>

								<div class="descripcion">
									<h3>Llega tu comida</h3>
			                        <p>Tus platos del día llegarán cada día a primera hora (entre 06:00 y 10:00 horas) en tu lugar de preferencia (casa, oficina, etc.). 100% naturales, sin aditivos ni conservantes. Se conservan perfectamente durante el día a temperatura de ambiente.</p>
								</div>

								<div class="imagen">
									<img src="' . base_url() . 'assets/images/funcion04.jpg" alt="">
								</div>
							</div>

							<div class="faq">
								<label>Si aún tienes dudas...</label>
                                <a href="#">FAQ</a>
							</div>
						</div>
					</div>';
					break;
				case 8:
					echo '
					<article class="nosotros">
						<div class="container">
							<h2>Nuestra historia</h2>

							<p>"Llegas a tu casa, has trabajado 12 horas y estás destrozado. Lo único que te apetece es echarte algo rápido a la boca y tirarte en el sofá. Abres la nevera. Nada."<br><br>


							-¿Qué hago? Qué pereza bajar al súper...<br>
							-Me pido algo. ¿ Y mãnana ? Mãnana ya se verá.<br><br>

							Y acabas cenando un chino mediocre y comiendo el mismo menú grasiento de siempre. Te deja empanado un par de horas. Llegas tarde a casa. Y otra vez.<br><br>

							Somos Ale, Janet y Francis y hasta 2016 nos pasaba lo mismo. Los tres teníamos trabajos a tiempo complet y más y no conseguíamos comer nada rico a buen precio sin sacrificar nuestro ocio por cocinar.<br><br>

							No entedíamos que en un mundo como el actual, en el que se puede comprar ropa de diseño cada temporada y acceder a infomación de calidad sin necesidad de comprar una enciclopedia, no se pudiera disfrutar cada día la comida de un chef sin ser millonario.<br><br>

							Nuestra vida siempre había estado ligada de una forma o de otra a la gastronomía: el mar, la montaña, la huerta y la pesca e incluso MasterChef. Nos gustaba cocinar, conocer, comer y sobre todo, disfrutar.
							Buscamos la solución definitiva y al no encontrarla, decidimos crearla.<br><br>

							Así nació. en Primavera de 2016. FOOD4U.</p>

							<div class="nosotros-img" style="background-image: url(' . base_url() . 'assets/images/article01.jpg);"></div>
							<div class="ver-platos">
								<label for="">Disfruta de FOOD4U</label>
								<a href="#">Ver platos</a>
							</div>
				        </div>  
				    </article>';
			    	break;
			    case 9:
			    	if($this->session->has_userdata('user_logged_in') && $this->session->userdata('user_logged_in') == TRUE):
			    		echo '<section class="profile">
								<div class="container">
									<div id="tabs">
									  <ul>
									    <li><a href="#tabs-1">Mis datos personales</a></li>
									    <li><a href="#tabs-2">Mi informe nutricional</a></li>
									    <li><a href="#tabs-3">Mi plan nutricional</a></li>
									    <li><a href="#tabs-4">Mis direcciones</a></li>
									    <li><a href="#tabs-5">Mi historial de pedidos</a></li>
									    <li><a href="#tabs-6">Mis vales</a></li>
									    <li><a href="#tabs-7">Mis alertas</a></li>
									  </ul>
									  <div class="content-profile">
										  <div id="tabs-1">
										    <h2>DATOS PERSONALES</h2>

										    <div class="form-profile">
										    	<form action="' . base_url() . 'processUser/actualizar_usuario">
													<input type="hidden" name="id" value="' . $userData->idUser . '">
										    		<div class="group-input">
										    			<label>Nombre</label>
										    			<input type="text" name="nombre" value="' . $userData->firstName . '">
										    		</div>

										    		<div class="group-input">
										    			<label>Apellido Paterno</label>
										    			<input type="text" name="apaterno" value="' . $userData->primaryLastName . '">
										    		</div>
									    			
										    		<div class="group-input">
										    			<label>Apellido Materno</label>
										    			<input type="text" name="amaterno" value="' . $userData->secondLastName . '">
										    		</div>

										    		<div class="group-input">
										    			<label>Género</label>';
										    			foreach ($findAllGender->result() as $gender):
										    				if($gender->idGender == $userData->idGender):
											    				echo '
												    		<input type="radio" name="genero" value="' . $gender->idGender . '" checked>' . $gender->description;
												    		else:
												    			echo '
												    		<input type="radio" name="genero" value="' . $gender->idGender . '">' . $gender->description;
												    		endif;
											    		endforeach;
											    		echo '
										    		</div>

										    		<div class="group-input">
										    			<label>Fecha de nacimiento</label>
										    			<input type="text" class="datepick" name="fecha" value="' . $userData->birthday . '">
										    		</div>

										    		<div class="group-input">
										    			<label>Móvil</label>
										    			<input type="text" name="movil" value="' . $userData->mobile . '">
										    		</div>

									    			<div class="group-input">
										    			<label>Correo electrónico</label>
										    			<input type="email" name="email" value="' . $userData->email . '">
										    		</div>

									    			<div class="group-input">
										    			<label>Contraseña (mínimo 8 caractéres)</label>
										    			<input type="password" name="contrasena">
										    		</div>

										    		<input type="submit" value="Guardar">
										    	</form>
										    </div>

										  </div>
										  <div id="tabs-2">
										    <h2>MI INFORME NUTRICIONAL</h2>

										    <div class="form-profile">
										    	<form action="' . base_url() . 'processUser/actualizar_usuario">

										    		<div class="group-input">
										    			<label>Peso (kgs)</label>
										    			<input type="text" name="nombre" value="' . $userData->weight . '">
										    		</div>

										    		<div class="group-input">
										    			<label>Altura (cm)</label>
										    			<input type="text" name="apaterno" value="' . $userData->height . '">
										    		</div>
									    			
										    		<div class="group-input">
										    			<label>Edad</label>
										    			<input type="text" name="amaterno" value="' . $userData->age . '">
										    		</div>

										    		<div class="group-input">
										    			<label>Actividad física</label>
										    			<input type="text" name="fecha" value="' . $userData->physicalActivity . '">
										    		</div>

										    		<input type="submit" value="Guardar">
										    	</form>
										    </div>
										  </div>
										  <div id="tabs-3">
										    <h2>DIETA RECOMENDADA: DETOX</h2>


										  </div>
										  <div id="tabs-4">
										    <h2>Mis direcciones</h2>


										  </div>
									  </div>
									</div>
								</div>
							</section>';
			    	else:
			    		header("Location: " . base_url());
		    		endif;
			    	break;
			    case 10: 
			    echo "mi carrito";
			    	break;
			    case 11: 
			    echo '<div id="calculator">
						<div class="container calculator-content">
							<div class="menu">
								<h2>1 Build Your Meal</h2>

								<select id="select-menu">
									<option>Selecciona un plato principal</option>';
									
									foreach ($findAllFoodMenu->result() as $food_menu) {
										echo '<option value="' . $food_menu->idFoodMenu . '">' . $food_menu->description . '</option>';
									}
								echo '	
								</select><br>
								<select id="select-item">
									<option>Selecciona item</option>
								</select>
								<div id="title-content"></div>
							</div>

							<div class="personalize-content">
								<h2>2 Customize </h2>

								<div id="personalize"></div>
							</div>

							<div class="result-content">
								<h2>Resultado</h2>

								<div class="result">AS</div>
							</div>
						</div>
					</div>';
			    	break;
        	endswitch;
        endforeach;
        ?>
	</div>

	<?php $this->load->view('inc/footer'); ?>

    <?php $this->load->view('inc/footer_common'); ?>
</body>
</html>