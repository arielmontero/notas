<?php namespace Controllers;



use Models\Login as Login;



	class loginController{

		private $login;



		public function __construct(){
			// Comentario de prueba 14/04/2023
			//el comentario de diego rearte esta listo para merge
			$this->login = new login();

		}

		public function login(){

			if($_POST['User'] == ""){

				header("Location: " . URL);	

			}else{

				$this->login->set("User",$_POST['User']);

				$this->login->set("Clave",$_POST['Clave']);

				$datos = $this->login->log();

				return $datos;

			}

		}

	}	

	$login = new loginController();



?>