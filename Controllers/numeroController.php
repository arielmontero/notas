<?php namespace Controllers;

use Models\Numero as Numero;
use Models\Permiso as Permiso;
use Models\Ministerios as Ministerios;


	class NumeroController{
		private $numero;
		private $permiso;
		private $ministerios;
		

		public function __construct(){
			$this->numero = new numero();
			$this->permiso = new Permiso();
			$this->ministerios = new Ministerios();
			
		}

		public function index(){
		  $datos = $this->numero->listar();
		  return $datos;
		}
		public function ControlPermiso($us,$per){
			$this->permiso->set("us", $us);
			$this->permiso->set("per", $per);
			$datos = $this->permiso->allow();
			return $datos;
		}

		public function listarMinisterios(){
			$datos = $this->ministerios->listar();
			return $datos;
		}	

	
		public function crear(){
		  $datos = $this->numero->listar();
		  return $datos;
			if($_POST){	
				$this->numero->set("Numero", $_POST['Numero']);
				$this->numero->add();
				//echo "control: " . $promedio;
				header("Location: " . URL . "numero");
			}	
		}

		
		public function eliminar($id){

			if(!$_POST){
				$this->numero->set("id", $id);
				$datos = $this->numero->view();
				return $datos;
			}else{
				$this->numero->set("id", $id);
				$this->numero->delete();
				header("Location: " . URL . "Numero");	
			}

		}

		public function ver($id){
			$this->numero->set("id",$id);
			$datos = $this->numero->view();
			return $datos;
		}
		public function buscar(){
			//echo "numero: " . $this->numero;
			if($_POST['Numero'] == ""){
				header("Location: " . URL . "Numero");	
			}else{
				$this->numero->set("Numero",$_POST['Numero']);
				$datos = $this->numero->bus();
				return $datos;
			}
		}


		public function editar($id){
				if(!$_POST){
					$this->numero->set("id", $id);
					$datos = $this->numero->view();
					return $datos;
				}else{
					$this->numero->set("id", $_POST['id']);	
					$this->numero->set("Numero", $_POST['Numero']);	
					$this->numero->edit();
					header("Location: " . URL . "Numero");
			}
		}


		public function listarNumero(){
		$datos = $this->numero->ask();
		return $datos;
		header("Location: " . URL . "numero/crear");
		}			


}	
	$numero = new NumeroController();

?>