<div class="box-principal">

<?php
if (!isset($datos['numero'])) {
 ?>
<h3 class="titulo">El numero de nota ingresada no existe<hr></h3>
 <?php
}else{
setlocale(LC_TIME, 'es_AR.UTF-8');

$fecha=$datos['Fecha'];
//$fecha=utf8_decode($fecha);


$anioactual=substr(date('d/m/Y',strtotime($fecha)),8,2);
$fecha_base = strftime(" %A, %d de %B de %Y", strtotime($fecha));

?>
<?php   $nota="NOTA C.G.P. Nº : " . $datos['numero'] . "/" . $anioactual; ?>
<h3 class="titulo"><?php echo $nota;?> Creada Por: <?php echo $datos['user'];?><hr></h3>
               <!-- <form class="form-horizontal" action="/notas/Views/nota/fpdf/imprimir.php" target="_blank"  method="POST" enctype="multipart/form-data">-->
                <form class="form-horizontal" action="/notas/pdf/imprimir.php" target="_blank"  method="POST" enctype="multipart/form-data">
<div class="Panel with panel-primary class" style="background-color:#EEEEEE;">
      <div class="panel-body">

                    <br>
                 
                     <input class="form-control" type="text" name="numeroNota"  value="<?php echo $nota;?>" readonly  required>
<br>                
 <td> <?php echo $fecha_base;?></td>
<br>
<br>
<br>
<div class="container-fluid bg-3 text-center"> 
    <div class="row">
<?php echo "Referencia Expediente: ";?>
                    <?php   $ExpRefe="Ref: Expte: " . $datos['ExpRefe']; ?>
                    <input class="form-control" type="text" name="ExpRefe" value="<?php echo $ExpRefe; ?>" readonly required>
                    <input class="form-control" type="text" name="ministerio" value="<?php echo $datos['ministerio']; ?>"  readonly required >
                    <input class="form-control" type="text" name="cargo" value="<?php echo $datos['cargo']; ?>"  readonly required >
                    <input class="form-control" type="text" name="responsable" value="<?php echo $datos['responsable']; ?>"  readonly required >
                    <input class="form-control" type="hidden" name="content" value="<?php echo $datos['Cuerpo']; ?>" required >             
<?php echo $datos['Cuerpo']; ?>
     </div>
                    </div><br>
                     <div class="form-group">
                         <button type="submit" class="btn btn-success" name="enviar">IMRPIMIR</button>
                     </div>
    </div>
</div>
                   

                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
      </div>
    </div>
</div>
<?php
}
?>