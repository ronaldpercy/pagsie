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
				
				 <div id="iniciose"><br>
					<ul class="nav">
			 <li> <?=anchor("usuarios/salir",'Salir')?></li><br><br>
				  	 <li > <?=anchor("usuarios/cambio_contra",'Cambio')?></li>
				  	 </ul>
				 </div>
				</div> 
				
			</header>
			
				
			<ul class="nav">
			 <li>
			     <?=anchor("socios",'Inicio')?>
			  </li>
			 <li>
			     <?=anchor("consulta/lista_consulta",'Lista de consultas')?>
			    
			  </li>
			  <li>
			    
			    <?=anchor('reuniones','Lista de reuniones')?>
			    
			  </li>
			  <li>
			    
			    <?=anchor('empresas','Lista de empresas')?>
			    
			  </li>

			</ul>


					 

				<section class="cuerpo">