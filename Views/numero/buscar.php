<div class="box-principal">

<?php
if ($datos['Numero']== "") {
 ?>
<h3 class="titulo">La Numero ingresada no existe<hr></h3>
 <?php
}else{
?>
<h3 class="titulo">Listar Los Datos de la Numero: <?php echo $datos['Numero']; ?><hr></h3>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Numero <?php echo $datos['Numero']; ?><b></b></h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-9">
          <ul class="list-group">
            <li class="list-group-item">
              <b>Nombre: </b><?php echo $datos['Numero']; ?>
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