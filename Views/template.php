<?php namespace Views;
	$template = new Template();
	class Template{
		public function __construct(){
?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Contaduria de La Provincia</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL;?>Views/template/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo URL;?>Views/template/css/general.css">
		<script language="JavaScript" type="text/javascript" src="<?php echo URL;?>Views/template/css/apprise-1.5.full.js"></script>
	</head>
	<body>
		<nav id="menu_gral" class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="navbar-header">
				<!-- <a class="navbar-brand" href="<?php echo URL;?>">CGP<span class="sr-only">(current)</span></a> -->
				<a class="navbar-brand" href="<?php echo URL;?>"> <img width=150px heigth=36px src="<?php echo URL;?>Views/template/imagenes/logo-red.png" alt=""> </a>
			</div>
			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav mr-auto">
					<!--
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo URL;?>">Inicio <span class="sr-only">(current)</span></a>
					</li>	
-->
<?php
if ($_SESSION["estado"] == 1) {
?>
		<li class="nav-item active">
						<a class="nav-link" href="<?php echo URL;?>user">Usuarios</a>
					</li>
		<li class="nav-item active">
						<a class="nav-link" href="<?php echo URL;?>app">Pantallas</a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="<?php echo URL;?>permiso">Permisos</a>
		</li>
	
		<li class="nav-item active">
			<a class="nav-link" href="<?php echo URL;?>ministerios">Organimos</a>
		</li>	
		<li class="nav-item active">
			<a class="nav-link" href="<?php echo URL;?>responsable">Responsable</a>
		</li>		

	
<?php
}
?>
<!--
		
		<li class="nav-item active">
			<a class="nav-link" href="<?php echo URL;?>numero">Numero de Nota</a>
		</li>

				
		<li class="nav-item active">
			<a class="nav-link" href="/notas/pdf/pl_pivot.php">SisNot</a>
		</li>
-->

				

				
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo URL;?>nota">Generar Nota</a>
					</li>		

</ul>
		
	<!--
				    <form class="form-inline my-2 my-lg-0" action="<?php echo URL;?>estudiantes/buscar" method="POST">
				      <input class="form-control mr-sm-2" type="text" name="cedula" placeholder="Search">
				      <button class="btn btn-secondary my-2 my-sm-0"  type="submit">Search</button>
				    </form>
				-->
				<?php
if($_SESSION["autentica"] == "SIP"){
?>
				<ul class="nav navbar-nav navbar-right">
							<li><a href="#">Usuario: <?php echo $_SESSION["usuarioactual"];?></a>
					        <ul>
						        <li><a href="<?php echo URL;?>user/seguridad">Seguridad</a></li>
					      
						        <li><a href="<?php echo URL;?>login/salir">Cerrar</a></li>
					        </ul>
					    </li>
			    </ul>
			</div>
		</nav>
<?php				
		}else{
?>
				<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo URL;?>"><?php echo "INICIE SESIÓN";?></a></li>
			    </ul>
			</div>
		</nav>





<?php		}
		
?>


<?php				
		}
		public function __destruct(){
?>
<footer class="navbar-fixed-bottom">
	todos los derechos reservados<br>
</footer>
	<!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> -->
	<script src="<?php echo URL; ?>Views/template/js/bootstrap.js"></script>
	</body>
	</html>
<?php
		}

}
?>