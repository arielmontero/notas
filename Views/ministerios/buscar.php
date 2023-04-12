<div class="box-principal">

<?php
if ($datos['Ministerios']== "") {
 ?>
<h3 class="titulo">El Numero ingresado no existe<hr></h3>
 <?php
}else{
?>
<h3 class="titulo">Listar Los Datos del Ministerios: <?php echo $datos['Ministerios'] ; ?><hr></h3>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Perfil del Ministerios <?php echo $datos['Ministerios'] ; ?><b></b></h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-9">
          <ul class="list-group">
            <li class="list-group-item">
              <b>Ministerios: </b><?php echo $datos['ID_Ministerios']; ?>
            </li>                
            <li class="list-group-item">
              <b>Saf: </b><?php echo $datos['Saf']; ?>
            </li>            
            <li class="list-group-item">
              <b>Codigo del Ministerios: </b><?php echo $datos['Ministerios']; ?>
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