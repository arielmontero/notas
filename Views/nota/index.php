<?php
if($_SESSION["autentica"] !== "SIP"){
?>
	<br>
	<h3 class="titulo"><a href="<?php echo URL;?>" class="btn btn-primary"><?php echo "INICIE SESIÓN"; ?></a></h3>

<?php 
}else{
	$us=$_SESSION["idUser"];
$per=$request->getControlador();
$res=$nota->ControlPermiso($us,$per);


if ($res== 1) {
	?>
<div class="box-principal">
<h3 class="titulo">Vista Notas de  <?php echo $_SESSION["usuarioactual"]; ?></h3>
		<div class="panel panel-success">
			<div class="panel-heading">
			<table class="table table-striped table-hover">
					<td><h3 class="panel-title"><a href="<?php echo URL;?>nota/crear" class="btn btn-success">Crear Nota</a></h3></td>
					<td>
						<form class="form-inline my-2 my-lg-0" action="<?php echo URL;?>nota/buscar" method="POST">
				      <input class="form-control mr-sm-2" type="text" name="Nota" placeholder="Nota">
				      <button class="btn btn-secondary my-2 my-sm-0"  type="submit">Buscar</button>
				    </form>
					</td>
			</table>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-hover">
					<thead>
						<th>Numero de Nota</th>
						<th>Usuario</th>
						<th>Fecha</th>
						<th>Referencia</th>
						<th>Ministerio</th>
						<th>Responsable</th>
						
						<th colspan="3">Action</th>
					</thead>
					<tbody>
<?php while ($row = mysqli_fetch_array($datos)){ ?>
						<tr>
						<td><?php echo $row['numero'];?></td>
						<td><?php echo $row['user'];?></td>
						<td><?php echo $row['Fecha'];?></td>
						<td><?php echo $row['ExpRefe'];?></td>
						<td><?php echo $row['ministerio'];?></td>
						<td><?php echo $row['responsable'];?></td>
						
						<td>
						<!--<a href="<?php echo URL;?>nota/ver/<?php echo $row['ID_Nota'];?>" class="btn btn-primary">Ver</a>-->
						<a href="<?php echo URL;?>nota/editar/<?php echo $row['ID_Nota'];?>" class="btn btn-primary">Editar</a>
						<!--<a href="<?php echo URL;?>nota/eliminar/<?php echo $row['ID_Nota'];?>" class="btn btn-primary">Eliminar</a>-->
						<a href="<?php echo URL;?>nota/imprimir/<?php echo $row['ID_Nota'];?>" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>imprimir</a>
						<a href="/notas/Views/nota/fpdf/imprimir.php" value="<?php echo $row['ID_Nota'];?>" target="_blank" class="btn btn-primary">Previsualizar</a>
						<!--<a href="/notas/pdf/imprimir.php?id_nota=<?php echo $row['ID_Nota'];?>" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>Imprimir</a>-->
						</td>
						</tr>
	<?php } 	?>
					</tbody>

				</table>
			</div>

	    </div>
</div>
<?php 
	}
}
 ?>