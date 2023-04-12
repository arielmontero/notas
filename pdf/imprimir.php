<?php
$id_nota=$_GET['id_nota'];
//$id_nota=66;

$url = 'http://192.168.252.53/informesariel/';
//$body = 'fdw=Probando Jua Jua&jua=10';

$parametros = 'id_nota='.$id_nota;
$c = curl_init($url);
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_POSTFIELDS, $parametros);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$respuesta = curl_exec($c);
curl_close($c);
//echo $respuesta;
/*
if ($respuesta==1){//Exito
		$archivo = 'documento.pdf';
	
}
else{//Error
	
}

$origen='http://192.168.252.53/cristal_ariel/reportes/temporal_pdf/nota.pdf';
$destino='nota.pdf';
    

if (!copy($origen,$destino)) {
    echo "Error al copiar $fichero...\n";

}

$archivo = 'nota.pdf';




	

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");

header("Content-Type: application/pdf");
header("Content-Transfer-Encoding: binary");
readfile($destination);

*/


$ch = curl_init();
$source = "http://192.168.252.53/cristal_ariel/reportes/temporal_pdf/nota.pdf";
curl_setopt($ch, CURLOPT_URL, $source);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);
$destination = dirname(__FILE__) . '/file.pdf';
$file = fopen($destination, "w+");
fputs($file, $data);
fclose($file);
$filename = 'nota.pdf';

    header('Content-Type: application/pdf');
	header('Expires: 0'); 	
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	ob_clean();
	flush();
	readfile($destination);
	exit;


?>