<?php namespace Models;

	//include_once("Conexion.php");
	 class Responsable{
	 	private $id;
	 	private $Saf;
	 	private $Responsable;
	 	private $Cargo;
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
				$sql= "SELECT * FROM Responsable Order by Saf";
				$resultado = $this->con->consultaRetorno($sql);
				return $resultado;
			}
			public function add(){
					$sql="INSERT INTO Responsable (Saf,Responsable,Cargo)
					VALUES('{$this->Saf}','{$this->Responsable}', '{$this->Cargo}')";
				    $this->con->consultaSimple($sql);				 
			}
			public function delete(){
				$sql="DELETE FROM Responsable WHERE ID_Responsable = '{$this->id}'";
				$this->con->consultaSimple($sql);
			}
			public function edit(){
				$sql="UPDATE Responsable SET Saf = '{$this->Saf}',Responsable = '{$this->Responsable}', Cargo = '{$this->Cargo}' WHERE ID_Responsable = '{$this->id}'";
				$this->con->consultaSimple($sql);
			}
			public function view(){
			    $sql="SELECT * FROM Responsable WHERE ID_Responsable = '{$this->id}'";
				$datos = $this->con->consultaRetorno($sql);
				$row = mysqli_fetch_assoc($datos);
				return $row;	
			}
			public function bus(){
			    $sql2="SELECT * FROM Responsable WHERE Responsable = '{$this->Responsable}'";
				$dato = $this->con->consultaRetorno($sql2);
				$num = mysqli_num_rows($dato);
				if ($num != 0) {
				$sql="SELECT * FROM Responsable WHERE Responsable = '{$this->Responsable}'";
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