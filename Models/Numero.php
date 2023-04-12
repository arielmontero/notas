<?php namespace Models;

//include_once("Conexion.php");
 class Numero{
 	private $id;
 	private $Numero;
 	private $Nuevo;
 	private $ultimo;
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
			$sql= "SELECT * FROM Numero";
			$resultado = $this->con->consultaRetorno($sql);
			return $resultado;
		}

		public function add(){

				$sql="INSERT INTO Numero (Numero)
				VALUES('{$this->Numero}')";
			    $this->con->consultaRetorno($sql);	

		}
		public function ask(){
		    $sql2="SELECT max(ID_Numero) id, max(Numero) numero FROM Numero";
			$dato = $this->con->consultaRetorno($sql2);
			$rum = mysqli_fetch_array($dato);
			$this->nuevo = $rum['numero'] + 1;
			//$ultimo= $this->nuevo;
			 

			$sql="INSERT INTO Numero (Numero)
			VALUES({$this->nuevo})";
		    $datos = $this->con->consultaSimple($sql);	
		    $row = mysqli_fetch_assoc($datos);
		    return $this->nuevo;
		}

		public function delete(){
			//echo "Numero: " . $this->id;
			$sql="DELETE FROM Numero WHERE ID_Numero = '{$this->id}'";
			$this->con->consultaSimple($sql);
		}

		public function edit(){
	//echo "promedio: " . $this->promedio;
	$sql="UPDATE Numero SET Numero = '{$this->Numero}' WHERE ID_Numero = '{$this->id}'";
	//echo "sql: " . $sql;
	$this->con->consultaSimple($sql);
		}

		public function view(){

		    $sql="SELECT * FROM Numero WHERE ID_Numero = '{$this->id}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;	
		}
		
		public function bus(){
		    $sql2="SELECT * FROM Numero WHERE Numero = '{$this->Numero}'";
			$dato = $this->con->consultaRetorno($sql2);
			$num = mysqli_num_rows($dato);
			if ($num != 0) {
			$sql="SELECT * FROM Numero WHERE Numero = '{$this->Numero}'";
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