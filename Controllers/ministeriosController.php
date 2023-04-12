<?php namespace Controllers;

	use Models\Ministerios as Ministerios;
	use Models\Permiso as Permiso;

		class ministeriosController{
			private $ministerios;
			private $permiso;
			public function __construct(){
				$this->ministerios = new Ministerios();
				$this->permiso = new Permiso();
			}
			public function index(){
			  $datos = $this->ministerios->listar();
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
					
					$this->ministerios->set("Saf", $_POST['Saf']);
					$this->ministerios->set("Ministerios", $_POST['Ministerios']);
					$this->ministerios->add();
					//header("Location: " . URL . "ministerios");
					?><META HTTP-EQUIV="refresh" CONTENT="0;URL= <?php echo URL;?>ministerios"><?php
				}	
			}
			public function eliminar($id){

				if(!$_POST){
					$this->ministerios->set("id", $id);
					$datos = $this->ministerios->view();
					return $datos;
				}else{
					$this->ministerios->set("id", $id);
					$this->ministerios->delete();
					//header("Location: " . URL . "ministerios");
					?><META HTTP-EQUIV="refresh" CONTENT="0;URL= <?php echo URL;?>ministerios"><?php	
				}

			}

			public function ver($id){
				$this->ministerios->set("id",$id);
				$datos = $this->ministerios->view();
				return $datos;
			}
			public function buscar(){
				//echo "cedula: " . $this->cedula;
				if($_POST['Ministerios'] == ""){
					//header("Location: " . URL . "ministerios");
					?><META HTTP-EQUIV="refresh" CONTENT="0;URL= <?php echo URL;?>ministerios"><?php	
				}else{
					$this->ministerios->set("Ministerios",$_POST['Ministerios']);
					$datos = $this->ministerios->bus();
					return $datos;
				}
			}

			public function editar($id){
					if(!$_POST){
						$this->ministerios->set("id", $id);
						$datos = $this->ministerios->view();
						return $datos;
					}else{
						$this->ministerios->set("id", $id);	
						$this->ministerios->set("Saf", $_POST['Saf']);	
						$this->ministerios->set("Ministerios", $_POST['Ministerios']);		
						$this->ministerios->edit();
						//header("Location: " . URL . "ministerios");
						?><META HTTP-EQUIV="refresh" CONTENT="0;URL= <?php echo URL;?>ministerios"><?php
				}
			}
	}	
	$ministerios = new ministeriosController();
?>