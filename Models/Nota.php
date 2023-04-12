<?php namespace Models;

//include_once("Conexion.php");
 class Nota{
 	private $id;
 	private $Nota;
 	private $Numero_ID;
 	private $Fecha;
 	private $ExpRefe;
 	private $Ministerio_ID;
 	private $Responsable_ID;
 	private $Cuerpo;
 	private $Nuevo;
 	private $ultimo;
 	private $con;
 	private $User_ID;
 	private $user;
 	private $ministerio;
 	private $ID_Ministerios;


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
		$u=$_SESSION["idUser"];
			  $sql= "SELECT t1.*, 
			  t2.Ministerios AS ministerio,
			  t3.Responsable AS responsable,
			  t4.Numero AS numero,
			  t5.User AS user
			  FROM Nota t1 
			  LEFT JOIN Ministerios t2 ON t1.Ministerio_ID = t2.ID_Ministerios
			  LEFT JOIN Responsable t3 ON t1.Responsable_ID = t3.ID_Responsable
			  LEFT JOIN Numero t4 ON t1.Numero_ID = t4.ID_Numero
			  LEFT JOIN User t5 ON t1.User_ID = t5.ID_User
			  WHERE t1.User_ID = $u  ORDER BY ID_Nota DESC";
			  $resultado = $this->con->consultaRetorno($sql);
			  return $resultado;
		}


		public function print(){
			//echo "Nota: " . $this->id;
			  $sql= "SELECT t1.*, 
			  t2.Ministerios AS ministerio,
			  t3.Responsable AS responsable,
			  t4.Cargo AS cargo,
			  t5.Numero AS numero
			  FROM Nota t1 
			  LEFT JOIN Ministerios t2 ON t1.Ministerio_ID = t2.ID_Ministerios
			  LEFT JOIN Responsable t3 ON t1.Responsable_ID = t3.ID_Responsable
			  LEFT JOIN Responsable t4 ON t1.Responsable_ID = t4.ID_Responsable
			  LEFT JOIN Numero t5 ON t1.Numero_ID = t5.ID_Numero 
			  WHERE t1.ID_Nota = '{$this->id}'";
			  $datos = $this->con->consultaRetorno($sql);
			  $result = mysqli_fetch_assoc($datos);
			 // echo "cuerpo: " . $result['Cuerpo'];
			   return $result;
		}

		public function add(){


 			$sqlu="SELECT ID_User FROM User WHERE User = '{$this->User_ID}'";
			$datou = $this->con->consultaRetorno($sqlu);
			$ram = mysqli_fetch_array($datou);
			$user = $ram['ID_User']; 			

			$sql2="SELECT max(ID_Numero) id, max(Numero) Numero FROM Numero";
			$dato = $this->con->consultaRetorno($sql2);
			$rum = mysqli_fetch_array($dato);
			$this->nuevo = $rum['Numero'] + 1;
			$this->ultimo= $rum['id'] + 1;
			$ultimo = $this->ultimo;

			$sql3="INSERT INTO Numero (Numero)
			VALUES({$this->nuevo})";
		    $datos = $this->con->consultaSimple($sql3);	
		    $row = mysqli_fetch_assoc($datos);
		    $Nuevo= $this->nuevo;

			$sql="INSERT INTO Nota (Numero_ID, User_ID, Fecha, ExpRefe, Ministerio_ID, Responsable_ID, Cuerpo)
			VALUES('$ultimo','$user', NOW(),'{$this->ExpRefe}', '{$this->Ministerio_ID}','{$this->Responsable_ID}', '{$this->Cuerpo}')";
		    $this->con->consultaSimple($sql);	
		    //echo "sql: " . $sql;
		}

/* FUNCION PARA INCREMENTAR el numero de nota en dinamico ahora la funcion que hace eso es add() cuando se crea la nota
		public function ask(){
		    $sql2="SELECT max(ID_Numero) id, max(Numero) Numero FROM Numero";
			$dato = $this->con->consultaRetorno($sql2);
			$rum = mysqli_fetch_array($dato);
			$this->nuevo = $rum['Numero'] + 1;
			//$ultimo= $this->nuevo;
			 

			$sql="INSERT INTO Numero (Numero)
			VALUES({$this->nuevo})";
		    $datos = $this->con->consultaSimple($sql);	
		    $row = mysqli_fetch_assoc($datos);
		    return $this->nuevo;
		}		
 */
		public function delete(){
			//echo "Nota: " . $this->id;
			$sql="DELETE FROM Nota WHERE ID_Nota = '{$this->id}'";
			$this->con->consultaSimple($sql);
		}

		public function edit(){
		//echo "promedio: " . $this->promedio;
		$sql="UPDATE Nota SET ExpRefe = '{$this->ExpRefe}' , Ministerio_ID = '{$this->Ministerio_ID}', Responsable_ID = '{$this->Responsable_ID}', Cuerpo = '{$this->Cuerpo}'  WHERE ID_Nota = '{$this->id}'";
		//echo "sql: " . $sql;
		$this->con->consultaSimple($sql);
		}

		public function view(){
		    $sql="SELECT t1.*, 
			  t2.Ministerios AS ministerio,
			  t3.Responsable AS responsable,
			  t4.Numero AS numero
			  FROM Nota t1 
			  LEFT JOIN Ministerios t2 ON t1.Ministerio_ID = t2.ID_Ministerios
			  LEFT JOIN Responsable t3 ON t1.Responsable_ID = t3.ID_Responsable
			  LEFT JOIN Numero t4 ON t1.Numero_ID = t4.ID_Numero 
			  WHERE t1.ID_Nota = '{$this->id}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;	
		}
		
		public function bus(){	
		    $sql2="SELECT * FROM Numero WHERE Numero = '{$this->Nota}'";
			$dato = $this->con->consultaRetorno($sql2);
			$num = mysqli_fetch_assoc($dato);
            $mun = $num['ID_Numero']; 
            
			$sql="SELECT t1.*, 
			  t2.Ministerios AS ministerio,
			  t3.Responsable AS responsable,
			  t4.Cargo AS cargo,
			  t5.Numero AS numero,
			  t6.User AS user
			  FROM Nota t1 
			  LEFT JOIN Ministerios t2 ON t1.Ministerio_ID = t2.ID_Ministerios
			  LEFT JOIN Responsable t3 ON t1.Responsable_ID = t3.ID_Responsable
			  LEFT JOIN Responsable t4 ON t1.Responsable_ID = t4.ID_Responsable
			  LEFT JOIN Numero t5 ON t1.Numero_ID = t5.ID_Numero
			  LEFT JOIN User t6 ON t1.User_ID = t6.ID_User
			   WHERE Numero_ID = $mun";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
	
		}


		public function gime(){
			$ministerio=$this->ID_Ministerios;
			echo "ministerio: " . $this->ID_Ministerios;
		    $sql2="SELECT t1.*, 
			  t2.Ministerios AS ministerio
			  FROM Responsable t1 
			  LEFT JOIN Ministerios t2 ON t1.Ministerio_ID = t2.ID_Ministerios
			  WHERE Ministerio_ID = $ministerio";
			$dato = $this->con->consultaRetorno($sql2);
		    $row = mysqli_fetch_assoc($dato);
		    return $row;
		}

}
?>