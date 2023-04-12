<?php namespace Controllers;

use Models\Nota as Nota;
use Models\Permiso as Permiso;
use Models\Ministerios as Ministerios;
use Models\Responsable as Responsable;
use Models\Numero as Numero;

	class NotaController{
		private $nota;
		private $permiso;
		private $ministerios;
		private $Responsable;
		private $Numero;

		public function __construct(){
			$this->nota = new nota();
			$this->permiso = new Permiso();
			$this->ministerios = new Ministerios();
			$this->responsable = new Responsable();
			$this->Numero = new Numero();
		}

		public function index(){
		  $datos = $this->nota->listar();
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
		public function listarResponsable(){
			$datos = $this->responsable->listar();
			return $datos;
		}		
		public function listarNumero(){
			$datos = $this->numero->listar();
			return $datos;
		}


		public function imprimir($id){
			if(!$_POST){
	  	$this->nota->set("id",$id);
		$datos = $this->nota->print();
		return $datos;
			}
		}	

		public function crear(){
		if($_POST){
				$exprefe= $_POST['Numero1'] ."-". $_POST['Numero2'] ."-". $_POST['Numero3'] ."-". $_POST['Numero4'];
				$this->nota->set("ExpRefe",$exprefe );
				$this->nota->set("User_ID",$_POST['user']);
				$this->nota->set("Ministerio_ID", $_POST['ministerio']);
				$this->nota->set("Responsable_ID", $_POST['responsable']);
				$this->nota->set("Cuerpo", $_POST['content']);
				$this->nota->add();
				/*
				echo "control: " . $exprefe;
				echo "contenido: " . $_POST['content'];
				echo "ministerio: " . $_POST['ministerio'];
				echo "responsable: " . $_POST['responsable'];
				*/
				header("Location: " . URL . "nota");
			}
		}

		
		public function eliminar($id){
			if(!$_POST){
				$this->nota->set("id", $id);
				$datos = $this->nota->view();
				return $datos;
			}else{
				$this->nota->set("id", $id);
				$this->nota->delete();
				header("Location: " . URL . "nota");	
			}
		}

		public function ver($id){
			$this->nota->set("id",$id);
			$datos = $this->nota->view();
			return $datos;
		}
		public function buscar(){
			//echo "nota: " . $_POST['Nota'];
			if($_POST['Nota'] == ""){
				header("Location: " . URL . "nota");	
			}else{
				$this->nota->set("Nota",$_POST['Nota']);
				$datos = $this->nota->bus();
				return $datos;
			}
		}


		public function editar($id){
				if(!$_POST){
					$this->nota->set("id", $id);
					$datos = $this->nota->view();
					return $datos;
				}else{
				$this->nota->set("id", $_POST['id']);	
				$exprefe= $_POST['Numero1'] ."-". $_POST['Numero2'] ."-". $_POST['Numero3'] ."-". $_POST['Numero4'];
				$this->nota->set("ExpRefe",$exprefe );
				$this->nota->set("Ministerio_ID", $_POST['ministerio']);
				$this->nota->set("Responsable_ID", $_POST['responsable']);
				$this->nota->set("Cuerpo", $_POST['content']);
				$this->nota->edit();
				header("Location: " . URL . "nota");
			}
		}


		public function listarnota(){
		$datos = $this->nota->ask();
		return $datos;
		header("Location: " . URL . "nota/crear");
		}

		public function pedir($ID_Ministerios){
		echo "ID_Ministerios: " . $_POST['ID_Ministerios'];
	    $this->nota->set("ID_Ministerios", $_POST['ID_Ministerios']);	
	    $datos = $this->nota->gime();
	    return $datos;
		}			


}	
	$nota = new notaController();

?>