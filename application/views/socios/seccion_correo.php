<!doctype html>
<html lang ="es">
	<head>
		<title>siesrl</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="<?=base_url()?>css/style.css"/>
		
		<link rel="stylesheet" href="<?=base_url()?>css/menu_dos.css"/>
		<link rel="stylesheet" href="<?=base_url()?>css/logousuario.css"/>
		<link rel="stylesheet" href="<?=base_url()?>css/tablasusuarios.css"/>
		
	</head>
	<section id="todo">		
		<body>
			<header id="cabecera">
				<div id="logo">
					<div id="contelogo">
						<div id ="soluciones2">
								<h3 class="nombres">Soluciones</br>
								Inteligentes</br>Empresariales</h3>
						</div>
						<div id="logo1" class="logos"></div>
						<div id="logo2" class="logos"></div>
						<div id="logo3" class="logos"><p id="letralogo">SIE</p></div>
						<div id="lema"><h3>Trabajando por un mejor futuro tecnológico</h3>
					</div>
				</div>
			
				<div class="mensaje">
						<img class="imagenes" id="imagen1"> 
						<img class="imagenes" id="imagen2">
						<img class="imagenes" id="imagen3">
				</div>
				
				 
				</div> 
				
			</header>
			
				
			


					 

				<section class="cuerpo">


<br><br><br><br><br><br>
<h3></h3>
<br><h2 class = "letras" ><center><?= $title?></center></h2>
<br><div id="formulario"><br>
				              	
				              	<div class="errors"><?= $error ?></div>
								<br>
						        <?=form_open("consulta/inicio_session/$id_con" )?>
						        
								<p> 
									<div class="subtitulos">
										<?=form_label('USUARIO', 'username')?><br>
									</div>
									<?= form_input(array('name' => 'user', 'class'=>'entradas', 'size'=>'60', 'value'=>set_value('user'), 'placeholder'=>'Ingrese el Nombre de Usuario', 'required'=>'required'))?>
										<br>
						 			<div class="subtitulos">
										<?=form_label('CONTRASEÑA', 'username')?><br>
									</div>
									<?= form_password(array( 'name' => 'pass', 'class'=>'entradas', 'size'=>'60', 'value'=>set_value('pass'), 'placeholder'=>'Ingrese su contraseña', 'required'=>'required'))?>
										<br>	
										
										<input  name="submit" type="submit" id="submit" class="guardar reunion" value="ACEPTAR" />
									</div>
				 				</p>
				 				<?form_close()?>
				 			  </div>	
				 		    </div><BR>   <br>


			</section>

			<footer id="pie">
				<p>Copyright (c) 2013 <a  title="DESARROLLADORES" href="#example" class="openModal">sie</a>Todos los derechos reservados</p>
			</footer>
		</body>
	</section>
</html>
