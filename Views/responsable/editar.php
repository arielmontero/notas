<div class="box-principal">
<h3 class="titulo">Editar el Responsable: <?php echo  $datos['Responsable'];?><hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar el Responsable: <?php echo  $datos['Responsable'];?></h3>
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
				      <label for="inputEmail" class="control-label">Responsable</label>
				        <input class="form-control" value="<?php echo $datos['Responsable'];?>" name="Responsable" type="text" required>
				    </div>				    
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Cargo</label>
				        <input class="form-control" value="<?php echo $datos['Cargo'];?>" name="Cargo" type="text" required>
				    </div>
				    <input value="<?php echo $datos['ID_Responsable'];?>" name="id" type="hidden" required>
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Editar</button>
				    </div>
				</form>
	  		</div>
	  	</div>
	  </div>
	</div>
</div>