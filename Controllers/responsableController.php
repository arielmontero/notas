<?php namespace Controllers;

	use Models\Responsable as Responsable;
		use Models\Permiso as Permiso;

		class responsableController{
			private $responsable;
			private $permiso;
			public function __construct(){
				$this->responsable = new Responsable();
				$this->permiso = new Permiso();
			}
			public function index(){
			  $datos = $this->responsable->listar();
			  return $datos;
			}
			public function ControlPermiso($us,$per){
			$this->permiso->set("us", $us);
			$this->permiso->set("per", $per);
			$datos = $this->permiso->allow();
			return $datos;
		}
			public function crear(){
				if($_POST){
					
					$this->responsable->set("Saf", $_POST['Saf']);
					$this->responsable->set("Responsable", $_POST['Responsable']);
					$this->responsable->set("Cargo", $_POST['Cargo']);
					$this->responsable->add();
					//header("Location: " . URL . "responsable");
					?><META HTTP-EQUIV="refresh" CONTENT="0;URL= <?php echo URL;?>responsable"><?php
				}	
			}
			public function eliminar($id){

				if(!$_POST){
					$this->responsable->set("id", $id);
					$datos = $this->responsable->view();
					return $datos;
				}else{
					$this->responsable->set("id", $id);
					$this->responsable->delete();
					//header("Location: " . URL . "responsable");
					?><META HTTP-EQUIV="refresh" CONTENT="0;URL= <?php echo URL;?>responsable"><?php	
				}

			}

			public function ver($id){
				$this->responsable->set("id",$id);
				$datos = $this->responsable->view();
				return $datos;
			}
			public function buscar(){
				//echo "cedula: " . $this->cedula;
				if($_POST['Responsable'] == ""){
					//header("Location: " . URL . "responsable");
					?><META HTTP-EQUIV="refresh" CONTENT="0;URL= <?php echo URL;?>responsable"><?php	
				}else{
					$this->responsable->set("Responsable",$_POST['Responsable']);
					$datos = $this->responsable->bus();
					return $datos;
				}
			}

			public function editar($id){
					if(!$_POST){
						$this->responsable->set("id", $id);
						$datos = $this->responsable->view();
						return $datos;
					}else{
						$this->responsable->set("id", $id);	
						$this->responsable->set("Saf", $_POST['Saf']);		
						$this->responsable->set("Responsable", $_POST['Responsable']);		
						$this->responsable->set("Cargo", $_POST['Cargo']);		
						$this->responsable->edit();
						//header("Location: " . URL . "responsable");
						?><META HTTP-EQUIV="refresh" CONTENT="0;URL= <?php echo URL;?>responsable"><?php
				}
			}
	}	
	$responsable = new ResponsableController();
?>