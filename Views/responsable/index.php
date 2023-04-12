<?php
if($_SESSION["autentica"] !== "SIP"){
?>
	<br>
	<h3 class="titulo"><a href="<?php echo URL;?>" class="btn btn-primary"><?php echo "INICIE SESIÓN"; ?></a></h3>

<?php 
}else{
	$us=$_SESSION["idUser"];
$per=$request->getControlador();
$res=$responsable->ControlPermiso($us,$per);


if ($res== 1) {
	?>
<div class="box-principal">
	<h3 class="titulo">Responsable</h3>
		<div class="panel panel-success">
			<div class="panel-heading">
				<table class="table table-striped table-hover">
					<td><h3 class="panel-title"><a href="<?php echo URL;?>responsable/crear" class="btn btn-success">Crear Nuevo</a></h3></td>
					<td>
						<form class="form-inline my-2 my-lg-0" action="<?php echo URL;?>responsable/buscar" method="POST">
				      <input class="form-control mr-sm-2" type="text" name="Responsable" placeholder="Responsable">
				      <button class="btn btn-secondary my-2 my-sm-0"  type="submit">Buscar</button>
				    </form>
					</td>
			</table>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<th>Saf</th>
						<th>Responsable</th>	
						<th>Cargo</th>	
						<th colspan="3">Action</th>
					</thead>
					<tbody>
					<?php while ($row = mysqli_fetch_array($datos)){ ?>
						<tr>
						<td  scope="row"> <?php echo $row['Saf'];?></td>
						<td> <?php echo $row['Responsable'];?></td>
						<td> <?php echo $row['Cargo'];?></td>
						<td>
						<a href="<?php echo URL;?>responsable/ver/<?php echo $row['ID_Responsable'];?>" class="btn btn-primary">Ver</a>
						<a href="<?php echo URL;?>responsable/editar/<?php echo $row['ID_Responsable'];?>" class="btn btn-primary">Editar</a>
						<a href="<?php echo URL;?>responsable/eliminar/<?php echo $row['ID_Responsable'];?>" class="btn btn-primary">Eliminar</a>
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
