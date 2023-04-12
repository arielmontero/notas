<?php 
//$decimo = $nota->listarnota();
$ministerios = $nota->listarMinisterios();
$responsable = $nota->listarResponsable();
$pedido = $nota->pedir();

?>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript" src="/notas/Views/nota/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
    <script language="javascript" type="text/javascript">
    tinyMCE.init({
       mode : "textareas",
		//theme : "simple",
		theme : "advanced",
		skin : "o2k7",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "undo,redo,|,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|replace,|,bullist,numlist,|,outdent,indent,blockquote,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
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
<!--
<script language="javascript">
$(document).ready(function(){
    $("#ministerio").on('change', function () {
        $("#ministerio option:selected").each(function () {
            var ID_Ministerios = $(this).val();
            $.POST("<?php $nota->pedir(); ?>", { ID_Ministerios: ID_Ministerios }, function(data) {
                $("#responsable").pedido(data);
            });			
        });
   });
});


 function verefe()
        {

$(document).ready(function() {      
 $("#ministerio").live("change",function(){
    //$("#fecha_m").live("change", function(){
      //String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
      //console.log('disparado!');

      var ministerio =  document.getElementById('ministerio').value;
      var cadena="ministerio="+ministerio;
      //alert ('num_referencia');

      $.ajax({
                  type:"POST",
                  url:"pedir.php",
                  data:cadena,
                  success:function(data)

                  {
                        //$("#contenido2").fadeIn(1000).html(data);
              var control=data;
              if (control==1){
                //alert("hola");
                document.getElementById("responsable").value="1"; 
                }else{
				document.getElementById("responsable").value="2";
					}
                  }
              
                  
              });
    
      })
});
  }


</script>


</script>   
-->



 
<?php 
setlocale(LC_TIME, 'es_AR.UTF-8');
$fecha = strftime("%A, %d de %B del %Y");
//adicionales de fecha y anios
//setlocale(LC_TIME,"es_AR.UTF-8");
//setlocale(LC_MONETARY,'es_AR.UTF-8');
//date_default_timezone_set("America/Argentina/Buenos_Aires");
//$fecha=utf8_decode(strftime ("%A, %d de %B de %Y"));
$fechaactual=strtotime('now');
$anioactual=substr(date('d/m/Y',$fechaactual),8,2);
?>


<div class="box-principal">
<h3 class="titulo">Agregar Nota<hr></h3>

	<div class="panel panel-success">
	  <div class="panel-heading">
	    
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
<!--target="_blank"--> 
	  			<form class="form-horizontal"  method="POST" enctype="multipart/form-data">
<div class="Panel with panel-primary class" style="background-color:#EEEEEE;">
	  <div class="panel-body">

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
						<input class="form-control" type="number" name="Numero4" required>
						<br>
					</div>
								<div class="col-sm-4">
		      <label for="inputEmail" class="control-label">Organismo</label>
		      <select id="ministerio" name="ministerio" class="form-control" onBlur="verefe()">
		      	<option value=""></option>
		      	<?php while($row = mysqli_fetch_array($ministerios)){ ?>
		      		<option value="<?php echo $row['ID_Ministerios']; ?>"><?php echo $row['Ministerios']; ?></option>
		      	<?php } ?>
		      </select>
		    </div>
		    <div class="col-sm-4">
		      <label for="inputEmail" class="control-label">Responsable</label>
		      <select id="responsable" name="responsable" class="form-control">
		      	<option value=""></option>
		      	<?php while($row = mysqli_fetch_array($responsable)){ ?>
		      		<option value="<?php echo $row['ID_Responsable']; ?>"><?php echo $row['Responsable']; ?></option>
		      	<?php } ?>
		      </select>
		    </div>
					<div class="form-group"> 
<br>
<br>
<br>
		<tr>
       <td> <textarea name="content" cols="110" rows="10" ></textarea></td>	
        </tr>     
					</div>			
					<input value="<?php echo $_SESSION["usuarioactual"];?>" name="user" type="hidden" required>


	 </div>
				    </div><br>
				     <div class="form-group">
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
