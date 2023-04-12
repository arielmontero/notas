<?php 
//adicionales de fecha y anios
//setlocale(LC_TIME,"es_AR.UTF-8");
//setlocale(LC_MONETARY,'es_AR.UTF-8');
//date_default_timezone_set("America/Argentina/Buenos_Aires");
//$fecha=utf8_decode(strftime ("%A, %d de %B de %Y"));
setlocale(LC_TIME, 'es_AR.UTF-8');
$fechadehoy = strftime("%A, %d de %B del %Y");
$fechadecreado=$datos['Fecha'];
$fecha_base = strftime(" %A, %d de %B de %Y", strtotime($fechadecreado));
//$fecha=utf8_decode($fecha);
$fechaactual=strtotime('now');
$anioactual=substr(date('d/m/Y',$fechaactual),8,2);
?>

<div class="box-principal">
<h3 class="titulo">Previsualización<hr></h3>

    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">Lista Para Imprimir</h3>
      </div>
      <div class="panel-body">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
<!--target="_blank"--> 

                <form class="form-horizontal" action="/notas/Views/nota/fpdf/imprimir.php" target="_blank"  method="POST" enctype="multipart/form-data">
<div class="Panel with panel-primary class" style="background-color:#EEEEEE;">
      <div class="panel-body">

                    <br>
                 <?php   $nota="NOTA C.G.P. Nº : " . $datos['numero'] . "/" . $anioactual; ?>
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

                    <textarea name="content" rows="20" cols="500"> <?php echo $datos['Cuerpo'];?>  </textarea>
                    <input class="form-control" type="hidden" name="fecha_base" value="<?php echo $fecha_base; ?>">

                   


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
