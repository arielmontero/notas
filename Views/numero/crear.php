<?php 
$decimo = $numero->listarNumero();
$ministerios = $numero->listarMinisterios();

?>

<script language="javascript" type="text/javascript" src="/notas/Views/numero/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
    <script language="javascript" type="text/javascript">
    tinyMCE.init({
       mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		//theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		//theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
    });
    </script> 
</script>    
<?php 
//adicionales de fecha y anios
setlocale(LC_TIME,"es_ES.UTF-8");
setlocale(LC_MONETARY,'es_AR.UTF-8');
date_default_timezone_set("America/Argentina/Buenos_Aires");
$fecha=utf8_decode(strftime ("%A, %d de %B de %Y"));
$fechaactual=strtotime('now');
$anioactual=substr(date('d/m/Y',$fechaactual),8,2);
?>


<div class="box-principal">
<h3 class="titulo">Agregar Numero<hr></h3>

	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar Numero</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
<!--target="_blank"--> 
	  			<form class="form-horizontal" action=""  method="POST" enctype="multipart/form-data">
<div class="Panel with panel-primary class" style="background-color:#EEEEEE;">
	  <div class="panel-body">
	  				<td> <?php 
	  				echo "Nota C.G.P Nº " .$decimo. "/".$anioactual; ?></td>
	  				<br>
	  				<td> <?php echo $fecha;?></td>
<br>
<br>
<br>
<div class="container-fluid bg-3 text-center"> 
	<div class="row">
		<?php echo "Expediente: ";?>
					<div class="col-sm-2"> 
					<input class="form-control" type="text" name="Numero1" required>
					</div>	

					<div class="col-sm-2"> 
						<input class="form-control" for="inputEmail"  type="number" name="Numero2" required>
					</div>

					<div class="col-sm-2"> 
					<input class="form-control" type="number" name="Numero3" required>
					
					</div>

					<div class="col-sm-2"> 
						<input class="form-control" type="number" name="Numero2" required>
						<br>
					</div>
								<div class="col-sm-4">
		      <label for="inputEmail" class="control-label">Organismo</label>
		      <select id="Oministerio" name="Oministerio" class="form-control">
		      	<option value=""></option>
		      	<?php while($row = mysqli_fetch_array($ministerios)){ ?>
		      		<option value="<?php echo $row['ID_Ministerios']; ?>"><?php echo $row['Ministerios']; ?></option>
		      	<?php } ?>
		      </select>
		    </div>
					<div class="form-group"> 
		<tr>
        <textarea name="content" cols="90" rows="10" ></textarea></td>	
        </tr>     
					</div>			


	 </div>
				    </div><br>
				     <div class="form-group">
				     	<a href="/notas/Views/numero/fpdf/imprimir.php" class="btn btn-primary">Imprimir</a>
				     	<a href="/fpdf/imprimir.php" class="btn btn-primary">Imprimir</a>
				    	 <button type="submit" class="btn btn-success" name="enviar">Registrar</button>
				        <button type="reset" class="btn btn-warning">Borrar</button>
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
