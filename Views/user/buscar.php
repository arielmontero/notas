<div class="box-principal">

<?php
if ($datos['User']== "") {
 ?>
<h3 class="titulo">El User ingresado no existe<hr></h3>
 <?php
}else{
?>
<h3 class="titulo">Listar Los Datos del user: <?php echo $datos['User']; ?><hr></h3>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Perfil del user <?php echo $datos['User']; ?><b></b></h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-9">
          <ul class="list-group">
            <li class="list-group-item">
              <b>Nombre: </b><?php echo $datos['User']; ?>
            </li>            
            <li class="list-group-item">
              <b>Nombre: </b><?php echo $datos['Clave']; ?>
            </li>
            <li class="list-group-item">
              <b>Edad: </b><?php echo $datos['Estado']; ?>
            </li>           
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
?>