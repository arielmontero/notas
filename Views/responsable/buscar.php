<div class="box-principal">

<?php
if ($datos['Responsable']== "") {
 ?>
<h3 class="titulo">El Numero ingresado no existe<hr></h3>
 <?php
}else{
?>
<h3 class="titulo">Listar Los Datos del Responsable: <?php echo $datos['Responsable'] ; ?><hr></h3>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Perfil del Responsable <?php echo $datos['Responsable'] ; ?><b></b></h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-9">
          <ul class="list-group">
            <li class="list-group-item">
              <b> Codigo del Responsable: </b><?php echo $datos['ID_Responsable']; ?>
            </li>             
            <li class="list-group-item">
              <b> Saf: </b><?php echo $datos['Saf']; ?>
            </li>            
            <li class="list-group-item">
              <b>Responsable: </b><?php echo $datos['Responsable']; ?>
            </li>           
             <li class="list-group-item">
              <b>Cargo: </b><?php echo $datos['Cargo']; ?>
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