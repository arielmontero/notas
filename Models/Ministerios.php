<?php namespace Models;

	//include_once("Conexion.php");
	 class Ministerios{
	 	private $id;
	 	private $Saf;
	 	private $Ministerios;
	 	private $con;

			public function __construct(){
				$this->con = new Conexion();
			 }
			public function set($atributo, $contenido){
				return $this->$atributo = $contenido;
			}
			public function get($atributo){
				return $this->$atributo;
			}
			public function listar(){
				$sql= "SELECT * FROM Ministerios Order By Saf";
				$resultado = $this->con->consultaRetorno($sql);
				return $resultado;
			}
			public function add(){
					$sql="INSERT INTO Ministerios (Saf,Ministerios)
					VALUES('{$this->Saf}','{$this->Ministerios}')";
				    $this->con->consultaSimple($sql);				 
			}
			public function delete(){
				$sql="DELETE FROM Ministerios WHERE ID_Ministerios = '{$this->id}'";
				$this->con->consultaSimple($sql);
			}
			public function edit(){
				$sql="UPDATE Ministerios SET Saf = '{$this->Saf}', Ministerios = '{$this->Ministerios}' WHERE ID_Ministerios = '{$this->id}'";
				$this->con->consultaSimple($sql);
			}
			public function view(){
			    $sql="SELECT * FROM Ministerios WHERE ID_Ministerios = '{$this->id}'";
				$datos = $this->con->consultaRetorno($sql);
				$row = mysqli_fetch_assoc($datos);
				return $row;	
			}
			public function bus(){
			    $sql2="SELECT * FROM Ministerios WHERE Ministerios = '{$this->Ministerios}'";
				$dato = $this->con->consultaRetorno($sql2);
				$num = mysqli_num_rows($dato);
				if ($num != 0) {
				$sql="SELECT * FROM Ministerios WHERE Ministerios = '{$this->Ministerios}'";
				$datos = $this->con->consultaRetorno($sql);
				$row = mysqli_fetch_assoc($datos);
				return $row;
				}else{
					$num=0;
					return $num;

			}
	
		}
	}
?>