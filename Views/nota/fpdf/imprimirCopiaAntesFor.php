<?php 


define('FPDF_FONTPATH','font/');
require_once('fpdf.php');

setlocale(LC_TIME, 'es_AR.UTF-8');
$fecha = strftime("La Rioja, %A %d de %B del %Y");
//setlocale(LC_TIME,"es_AR.UTF-8");
//setlocale(LC_MONETARY,'es_AR.UTF-8');
//date_default_timezone_set("America/Argentina/Buenos_Aires");
//$fecha=utf8_decode(strftime ("%A, %d de %B de %Y"));
    //Recibimos 
	//$id=$_GET['id'];
    $numeroNota=$_POST['numeroNota'];
    $numeroNota= utf8_decode($numeroNota);
    $ExpRefe=$_POST['ExpRefe'];
    $ministerio=$_POST['ministerio'];
    $responsable=$_POST['responsable'];
    $content=$_POST['content'];
    $content= utf8_decode($content);
    $content= strip_tags($content);
    //$servicio=$_POST["servicio"];
    //$sumatoria=money_format('%+n',$_POST["sumatoria"]. "\n");  
    //$proveedor=$_POST["proveedor"]; 
    //$fecha_venc=$_POST["fecha_venc"];
	//$fecha = "La Rioja,  ".date('j')." de ".date('F')." del ".date('Y')."";
    $fecha= utf8_decode($fecha);
	//$titulo_pag_dos= utf8_decode("Contaduria de La Provincia de la Rioja");
    //$titulo2_pag_dos= utf8_decode("Pedido de Fondos");
    //Recibimos dentro de una cadena la fecha
    //$fecha="La Rioja, ".$_POST['dia']." de  ". $_POST['mes']. " de ".$_POST['anio'];
    //Se crea un objeto de PDF
    //Para hacer uso de los métodos
    //$pdf = new PDF();
    //$pdf->AddPage('P', 'A4'); //Vertical, A4
    // $pdf->SetFont('Arial','B',12); //Arial, negrita, 12 puntos
    // $pdf->Cell(0,0,$fecha,0,1,'R'); //Imprime en el pdf la cadena $fecha
    // $pdf->ImprimirTexto('textoFijo.txt'); //Texto fijo
    //$pdf->Ln();    
error_reporting ( E_ERROR ); 

//setlocale(LC_TIME, 'spanish'); 


ob_start();
$pdf = new FPDF('P','mm','A4');
$pdf->Open('nota.pdf');
//Disable automatic page break
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();
$InterLigne = 4;
$y_axis_initial = 25;
// imprime el titulo de la pagina
$pdf->SetFillColor(256,256,256);
$pdf->SetFont('Arial','B',16);
$pdf->SetX(30);
$i=25;//era 100 originalmente
$pdf->SetY($i);
$pdf->SetX(25);
//$pdf->SetFillColor(51,51,51);
$pdf->SetY($i=$i);
$pdf->SetX(25);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(0,7,'',0,0,'C',$pdf->Image('logo.png',42,10, 15));
$pdf->SetY($i=$i+5);
$pdf->SetX(25);
$pdf->Cell(0,7,'Gobierno del Pueblo de La Rioja');
$pdf->SetY($i=$i+5);
$pdf->SetX(30);
$pdf->Cell(0,7,'Ministerio de Hacienda');
$pdf->SetY($i=$i+5);
$pdf->SetX(8);
$pdf->Cell(0,7,'',0,0,'C',$pdf->Image('logo-contaduria.png',165,17, 15));
$pdf->Cell(0,-7,'Contaduria General de La Provincia',0,'J',0,0);
$pdf->SetY($i=$i+5);
$pdf->SetX(25);

//$siete=utf8_decode("__________________________________________________________________________________________________");
$pdf->SetFillColor(100,100,100);
$pdf->MultiCell(0,0,$siete,0,0,'L'); 
$pdf->SetY($i=$i+10);
$pdf->Cell(0,0,$numeroNota,0,1,'R'); //Imprime en el pdf el numero de la nota 
$pdf->SetY($i=$i+5);
$pdf->SetX(25);
$pdf->SetX(110);    
$pdf->Cell(0,0,$fecha,0,1,'R'); //Imprime en el pdf la cadena $fecha
$pdf->SetY($i=$i+5);
$pdf->SetX(25);
$pdf->SetX(110);    
$pdf->Cell(0,0,$ExpRefe,0,1,'R'); //Imprime en el pdf la cadena referencia y expediente
$pdf->SetY($i=$i+5);
$pdf->SetX(25);
//$uno=utf8_decode(file_get_contents('senor.txt'));
//$dos=utf8_decode(file_get_contents('area.txt'));
//$tres=utf8_decode(file_get_contents('quien.txt'));
//$cuatro=utf8_decode(file_get_contents('contenidouno.txt'));
$cero=utf8_decode("DIRECTOR GRAL. DE ADMINISTRACION");
$ceroes=utf8_decode("SU DESPACHO:");


$pdf->SetFont('Arial','B',10);
$pdf->SetY($i=$i+4);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$ministerio,0,'J',0,15);
$pdf->SetY($i=$i+4);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$cero,0,'J',0,15);
$pdf->SetY($i=$i+4);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$responsable,0,'J',0,15);
$pdf->SetY($i=$i+4);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$ceroes,0,'J',0,15);


$contenidouno = $content;
$row_cnt =strlen($content);
$dividirContenido= $row_cnt / 1500;
$contenidouno=mb_substr($contenidouno,0 , 1500);
$primerPunto=strrpos($contenidouno, ".");
$vueltas=$dividirContenido;


//$cincos=utf8_decode("Luego de ser controladas y verificadas, por nuestra CGP, realizado dicho trámite es que corresponde abonar a la empresa prestataria del servicio.");
//$cinco=utf8_decode(file_get_contents('contenidodos.txt'));
$pdf->SetY($i=$i+15);
$pdf->SetX(25);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(165,5,$contenidouno,0,'J',0,15);




$pdf->SetX(25); 
$pdf->Cell(0,0,"cantidad de cuerpo " . $row_cnt,0,1,'R'); 
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"divicion " . $dividirContenido,0,1,'R'); 
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"vueltas " .$vueltas,0,1,'R'); 
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"el valor de i " . $i,0,0,'L',0);
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"el primerPunto " . $primerPunto,0,0,'L',0);
  
  $desde = 1500;
  $hasta = 3000;


  

for ($j=1; $j <= $vueltas ; $j++) { 

   $text[j]=mb_substr($content,$desde , $hasta);
   $desde= $desde + ($hasta + 1);
   $hasta= $hasta + ($hasta + 1);
   $primerPunto=strrpos($content, ".");

$pdf->AddPage();
$InterLigne = 4;
$y_axis_initial = 25;
// imprime el titulo de la pagina
$pdf->SetFillColor(256,256,256);
$pdf->SetFont('Arial','B',16);
$pdf->SetX(30);
$i=25;//era 100 originalmente
$pdf->SetY($i);
$pdf->SetX(25);
//$pdf->SetFillColor(51,51,51);
$pdf->SetY($i=$i);
$pdf->SetX(25);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(0,7,'',0,0,'C',$pdf->Image('logo.png',42,10, 15));
$pdf->SetY($i=$i+5);
$pdf->SetX(25);
$pdf->Cell(0,7,'Gobierno del Pueblo de La Rioja');
$pdf->SetY($i=$i+5);
$pdf->SetX(30);
$pdf->Cell(0,7,'Ministerio de Hacienda');
$pdf->SetY($i=$i+5);
$pdf->SetX(8);
$pdf->Cell(0,7,'',0,0,'C',$pdf->Image('logo-contaduria.png',165,17, 15));
$pdf->Cell(0,-7,'Contaduria General de La Provincia',0,'J',0,0);
$pdf->SetY($i=$i+5);
$pdf->SetX(25);

//$siete=utf8_decode("__________________________________________________________________________________________________");
$pdf->SetFillColor(100,100,100);
$pdf->MultiCell(0,0,$siete,0,0,'L'); 
$pdf->SetY($i=$i+15);
$pdf->SetX(25);
$pdf->SetFont('Arial','',10);
        $pdf->MultiCell(165,5,$text[j],0,'J',0,15);
        $pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"el primerPunto " . $primerPunto,0,0,'L',0);
         $vueltas--;
}








$pdf->Output();

ob_end_flush();
?>