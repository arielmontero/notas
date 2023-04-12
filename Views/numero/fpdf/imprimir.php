<?php 


define('FPDF_FONTPATH','font/');
require_once('fpdf.php');

setlocale(LC_TIME,"es_ES.UTF-8");
setlocale(LC_MONETARY,'es_AR.UTF-8');
date_default_timezone_set("America/Argentina/Buenos_Aires");
//$fecha=utf8_decode(strftime ("%A, %d de %B de %Y"));
    //Recibimos 
	$id=$_GET['id'];
    //$expediente=$_POST['expediente'];
    //$servicio=$_POST["servicio"];
    //$sumatoria=money_format('%+n',$_POST["sumatoria"]. "\n");  
    //$proveedor=$_POST["proveedor"]; 
    //$fecha_venc=$_POST["fecha_venc"];
	$fecha = "La Rioja,  ".date('j')." de ".date('F')." del ".date('Y')."";
	$titulo_pag_dos= utf8_decode("Contaduria de La Provincia de la Rioja");
    $titulo2_pag_dos= utf8_decode("Pedido de Fondos");
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

setlocale(LC_TIME, 'spanish'); 


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
$pdf->Cell(0,7,'',0,0,'C',$pdf->Image('logo.png', 35,5, 15));
$pdf->SetY($i=$i+5);
$pdf->SetX(5);
$pdf->Cell(0,7,'Contaduria General de la Provincia',0,0,'L');
$pdf->SetY($i=$i+5);
$pdf->SetX(8);
//$pdf->Cell(0,7,'CGP',0,0,'L');
$pdf->SetX(110);    
$pdf->Cell(0,0,$fecha,0,1,'R'); //Imprime en el pdf la cadena $fecha
$pdf->SetY($i=$i+5);
$pdf->SetX(25);
//$uno=utf8_decode(file_get_contents('senor.txt'));
//$dos=utf8_decode(file_get_contents('area.txt'));
//$tres=utf8_decode(file_get_contents('quien.txt'));
//$cuatro=utf8_decode(file_get_contents('contenidouno.txt'));
$cero=utf8_decode("DIRECTOR GRAL. DE ADMINISTRACION");
$ceros=utf8_decode("Sec. General y Legal de la Gobernación");
$ceroes=utf8_decode("SU DESPACHO:");
$cerotro=utf8_decode("Tengo el agrado de dirigirme a Ud. a los efectos de comunicarle que de acuerdo a lo establecido por el Decreto N° 898, de fecha 15/10/02, emanado del Poder Ejecutivo Provincial, por el cual se dispone que el pago de la facturación del servicio telefónico, se efectuara por intermedio de la Dirección General de Obligaciones a Cargo del Tesoro, previa revisión e informe de la Dirección General de Comunicaciones, que evaluara el consumo que realicen los distintos Organismos y de esa manera optimizar el uso de los fondos públicos.
Por lo expuesto con anterioridad y de acuerdo al Art. 2° del mencionado Decreto, se establece que la/s siguiente/s factura/s:");

$pdf->SetFont('Arial','',10);
$pdf->SetY($i=$i+7);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$cero,0,'J',0,15);
$pdf->SetY($i=$i+7);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$ceros,0,'J',0,15);
$pdf->SetY($i=$i+7);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$ceroes,0,'J',0,15);
$pdf->SetY($i=$i+7);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$cerotro,0,'J',0,15);

       $pdf->SetY($i=$i+50);
       $pdf->SetX(25);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,5,'Factura',1, 0 , 'C' ) ;
        $pdf->Cell(25,5,'Vencimiento',1, 0 , 'C' ) ;
        $pdf->Cell(25,5,'Inicio Periodo',1, 0 , 'C' ) ;
        $pdf->Cell(25,5,'Fin Periodo',1, 0 , 'C' ) ;
        $pdf->Cell(25,5,'Servicio',1, 0 , 'C' ) ;
        $pdf->Cell(25,5,'Monto',1, 0 , 'C' ) ;
        $sumatoria=0;

$pdf->SetFont('Arial','B',10);
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
//$pdf->MultiCell(0,7,$veintiseistres,0,0,'L',0);

$pdf->SetY($i=$i+7);
$pdf->SetX(25);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(238,238,238);
//$pdf->MultiCell(165,5,'Monto Total:'.$sumatorias,0,'J','True');
$pdf->SetY($i=$i+7);
$pdf->SetX(25);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(238,238,238);
//$pdf->MultiCell(165,5,'Proveedor:'.$proveedor,0,'J','True');
$pdf->SetY($i=$i+7);
$pdf->SetX(25);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(238,238,238);
//$pdf->MultiCell(165,5,'Expediente:'.$expediente,0,'J','True');

$cincos=utf8_decode("Luego de ser controladas y verificadas, por nuestra CGP, realizado dicho trámite es que corresponde abonar a la empresa prestataria del servicio.");
//$cinco=utf8_decode(file_get_contents('contenidodos.txt'));
$pdf->SetY($i=$i+15);
$pdf->SetX(25);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(165,5,$id,0,'J',0,15);


$siete=utf8_decode("__________________");
$pdf->SetY($i=$i+25);
$pdf->SetX(153);    
$pdf->Cell(0,0,$siete,0,0,'L'); 
$pdf->SetY($i=$i+25);
$pdf->Output();

ob_end_flush();
?>