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
    $cargo=$_POST['cargo'];
    $responsable=$_POST['responsable'];
    $content=$_POST['content'];


    $cargo= utf8_decode($cargo);
      

    $responsable= utf8_decode($responsable);


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
$pdf->AliasNbPages();
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
$pdf->Cell(0,7,'',0,0,'C',$pdf->Image('membretes.jpg',26,10, 170, 'JPG'));
$pdf->SetY($i=$i+5);
$pdf->SetX(25);
//$pdf->Cell(0,7,'Gobierno del Pueblo de La Rioja');
$pdf->SetY($i=$i+5);
$pdf->SetX(30);
//$pdf->Cell(0,7,'Ministerio de Hacienda');
$pdf->SetY($i=$i+5);
$pdf->SetX(8);
//$pdf->Cell(0,7,'',0,0,'C',$pdf->Image('logo-contaduria.png',165,17, 15));
//$pdf->Cell(0,-7,'Contaduria General de La Provincia',0,'J',0,0);
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
//$cero=utf8_decode("DIRECTOR GRAL. DE ADMINISTRACION");
$ceroes=utf8_decode("SU DESPACHO:");


$pdf->SetFont('Arial','B',10);
$pdf->SetY($i=$i+4);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$ministerio,0,'J',0,15);
$pdf->SetY($i=$i+4);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$cargo,0,'J',0,15);
$pdf->SetY($i=$i+4);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$responsable,0,'J',0,15);
$pdf->SetY($i=$i+4);
$pdf->SetX(25);
$pdf->MultiCell(165,5,$ceroes,0,'J',0,15);
$pdf->SetY($i=$i+4);
$pdf->SetY($i=$i+4);

//cuanto el total 
$cortePagina=2300;
$contenidouno = $content;
$pagina = $content;
$row_cnt =strlen($content);
$resto=$row_cnt;





//divido veo cuantas vueltas
$dividirContenido= $row_cnt / $cortePagina;
$vueltas=$dividirContenido;


//si el contenido es mayor a 2300 
    //entra en el ciclo
            //separa el contenido 
            //busca el contenido el salto de linea guarda la pocicion
            //remplaza el valor de inicio (desde) de la separacion y modifica el hasta , toma ese blocke y vuelve a hcer lo mismo de separar y buscar , despues remplazar el inicio y fin de cada separacion 




//cuento el total
if ($row_cnt > $cortePagina){





                //separo el contenido en partes
                $pasador=mb_substr($contenidouno,0,$cortePagina,"utf-8");
                //guardo el valor del salto de linea
                $ultimoPuntoAparte=strrpos($pasador, ".\r\n");
                $desde=0;
                $hasta=$ultimoPuntoAparte + 1;

                //resto el valor del total por el resultado de ultimopunto Aparte
                $resto=$resto - $ultimoPuntoAparte;
                //separo el contenido en partes
                $paginaimprime=mb_substr($contenidouno, $desde , $hasta,"utf-8");
                //separame desde 0 a 2300 
                    //buscame el salto de linea 
                    //modificame los valores 
                    //$desde iria desde 0 si no tenia valor anterior si no obtiene el valor de ultimo salto de linea .-
                    //hasta es remplazado por el valor del valor de salto de linea 
                    //al total le modificamos por la resta del total menos el primer salto de linea 
              

                $pdf->SetX(25);
                $pdf->SetFont('Arial','',10);
                $pdf->MultiCell(165,5,$paginaimprime,0,'J',0,15);
                      $pdf->SetY($i=$i+10);
                      $pdf->SetY($i=$i+10);
 

                if($resto > 0) {
                    //resto por que ya imprimio la primera hoja 
                     $vueltas = $vueltas - 1;
                     //reasigno lo valores de desde y hasta que quedaron en 
                     $desde=$hasta;
                     $hasta=($desde + $cortePagina);

                       for ($j=0; $j <= $vueltas ; $j++) { 
                        
                        //     while ($vueltas >= 0) {

                                            

                                                                    if ($resto > $cortePagina AND $resto > 0){
                                                                       $pasadordos=mb_substr($pagina,$desde,$hasta,"utf-8");
                   
                                                                       $ultimoPuntoAparte=strrpos($pasadordos, ".\r\n");
                                                                        
                                                                        $resto=$resto - $ultimoPuntoAparte + 1;
                                                       
                                                                        $hasta=($ultimoPuntoAparte + 1);                                                                      
  /*                                                                      
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"ultimoPuntoAparte " . $ultimoPuntoAparte,0,1,'R'); 
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"cortePagina " . $cortePagina,0,1,'R'); 
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"desde " . $desde,0,1,'R'); 
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"hasta " . $hasta,0,1,'R'); 
*/
                                                                        $text[j]=mb_substr($pagina,$desde,$hasta,"utf-8");

                                                                    }else{
                                                                        $text[j]=mb_substr($pagina,$desde,$hasta,"utf-8");
                                                                    }
                                                    $pdf->AddPage();
                                                    $InterLigne = 4;
                                                    $y_axis_initial = 25;
                                                    //imprime el titulo de la pagina
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
                                                    $pdf->SetY($i=$i+10);$pdf->SetY($i=$i+10);$pdf->SetY($i=$i+10);
                                                    $pdf->SetY($i=$i+10);
                                                    $pdf->SetX(25);
                                                   

                                                             //$vueltas--;
                                                                    $desde=$hasta;
                                                                    $hasta=($desde + $cortePagina);
                                                                         
                                                             
                                                                          
                                     
                                                                        
                                                    
                                                 
                            }
                } 
}else{

                $pdf->SetX(25);
                $pdf->SetFont('Arial','',10);
                $pdf->MultiCell(165,5,$content,0,'J',0,15);
                $pdf->SetY($i=$i+10);
                $pdf->SetY($i=$i+10);

}
/*
$pdf->AddPage();
$InterLigne = 4;
$y_axis_initial = 25;
//imprime el titulo de la pagina
$pdf->SetFillColor(256,256,256);
$pdf->SetFont('Arial','B',16);
$pdf->SetX(30);
$i=25;//era 100 originalmente
$pdf->SetY($i);
$pdf->SetX(25);

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
$pdf->Cell(0,7,"el ultimoPuntoAparte " . $ultimoPuntoAparte,0,0,'L',0);
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"el valor de desde " . $desde,0,0,'L',0);
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"el valor de hasta " . $hasta,0,0,'L',0);
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"el valor wile " . $wile,0,0,'L',0);
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"el valor resto " . $resto,0,0,'L',0);
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->Cell(0,7,"el valor fo " . $fo,0,0,'L',0);
$pdf->SetY($i=$i+10);
$pdf->SetX(25);
$pdf->SetX(25);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(165,5,$content,0,'J',0,15);
*/
$pdf->Output();
ob_end_flush();
?>