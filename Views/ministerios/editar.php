<div class="box-principal">
<h3 class="titulo">Editar el Ministerios: <?php echo  $datos['Ministerios'];?><hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar el Ministerios: <?php echo  $datos['Ministerios'];?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-9">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Saf</label>
				        <input class="form-control" value="<?php echo $datos['Saf'];?>" name="Saf" type="number" required>
				    </div>				    
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Ministerios</label>
				        <input class="form-control" value="<?php echo $datos['Ministerios'];?>" name="Ministerios" type="text" required>
				    </div>
				    <input value="<?php echo $datos['ID_Ministerios'];?>" name="id" type="hidden" required>
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Editar</button>
				    </div>
				</form>
	  		</div>
	  	</div>
	  </div>
	</div>
</div>