<?php
if($_SESSION["autentica"] !== "SIP"){
?>
	<br>
	<h3 class="titulo"><a href="<?php echo URL;?>" class="btn btn-primary"><?php echo "INICIE SESIÓN"; ?></a></h3>

<?php 
}else{
	$us=$_SESSION["idUser"];
$per=$request->getControlador();
$res=$ministerios->ControlPermiso($us,$per);


if ($res== 1) {
	?>
<div class="box-principal">
	<h3 class="titulo">Ministerios</h3>
		<div class="panel panel-success">
			<div class="panel-heading">
				<table class="table table-striped table-hover">
					<td><h3 class="panel-title"><a href="<?php echo URL;?>ministerios/crear" class="btn btn-success">Crear Nuevo</a></h3></td>
					<td>
						<form class="form-inline my-2 my-lg-0" action="<?php echo URL;?>ministerios/buscar" method="POST">
				      <input class="form-control mr-sm-2" type="text" name="Ministerios" placeholder="Ministerios">
				      <button class="btn btn-secondary my-2 my-sm-0"  type="submit">Buscar</button>
				    </form>
					</td>
			</table>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<th>Saf</th>
						<th>Ministerios</th>	
						<th colspan="3">Action</th>
					</thead>
					<tbody>
					<?php while ($row = mysqli_fetch_array($datos)){ ?>
						<tr>
						<td  scope="row"> <?php echo $row['Saf'];?></td>
						<td> <?php echo $row['Ministerios'];?></td>
						<td>
						<a href="<?php echo URL;?>ministerios/ver/<?php echo $row['ID_Ministerios'];?>" class="btn btn-primary">Ver</a>
						<a href="<?php echo URL;?>ministerios/editar/<?php echo $row['ID_Ministerios'];?>" class="btn btn-primary">Editar</a>
						<a href="<?php echo URL;?>ministerios/eliminar/<?php echo $row['ID_Ministerios'];?>" class="btn btn-primary">Eliminar</a>
						</td>
						</tr>
					<?php }	?>
					</tbody>
				</table>
			</div>
	    </div>
</div>
<?php 
	}
}
 ?>
