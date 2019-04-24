<?php

require_once 'model/conexion.php';		


class Usuario{
	
	private $pdo;
	
	public $nombre_usuario;
	public $password_usuario;
	public $id_nivel;
	public $id_usuario;
	
	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::Conectar();     
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Registrar(Usuario $data){

		try {

		$sql = "INSERT INTO usuario (id_nivel,nombre_usuario,password_usuario) 
				VALUES (1 , ?, ?)";
				
		$this->pdo->prepare($sql)
		     ->execute(
				array(

                    $data->nombre_usuario,
                    $data->password_usuario)
			);
		} catch (Exception $e) {

			die($e->getMessage());
		}
	}
	
	public function Validar($user){
		
		$sql = "SELECT nombre_usuario FROM usuario WHERE nombre_usuario = :nombre_usuario AND password_usuario = :password_usuario ;"; 
		$result = $this->pdo->prepare($sql); 
		$result->bindValue	(':nombre_usuario', $user->nombre_usuario, PDO::PARAM_STR);
		$result->bindValue(':password_usuario', $user->password_usuario, PDO::PARAM_STR);
		$result->execute(); 
		$count = $result->rowCount();
		$data=$result->fetch(PDO::FETCH_OBJ);
		
		if($count){
			$_SESSION['nombre_usuario']=$data->nombre_usuario;
			$sesion=$_SESSION['nombre_usuario'];

			echo "Login perfecto.<br>";
			echo "Nombre del user: ".$sesion;
			header("Location: index.php");

		}else{
			echo "Usuario no registrado.";  
		} 
	}

	public function Listar_usuarios(){
		try{
			$result = array();
			$sql = $this->pdo->prepare("SELECT * FROM usuario");
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}


	public function Obtener_usuario($id_usuario){

		try{
			$sql = $this->pdo
			    ->prepare("SELECT * FROM usuario WHERE id_usuario = ?");         
				$sql->execute(array($id_usuario));
			return $sql->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}

	public function Actualizar_usuario($data){

		try{
			$sql = "UPDATE usuario SET 
						id_nivel = ?, 
						nombre_usuario = ?,
                        password_usuario = ?
				    WHERE id_usuario = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->id_nivel, 
                        $data->nombre_usuario,
                        $data->password_usuario,
                        $data->id_usuario
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}

	public function Obtener_id($nombre_usuario)
	{
		if(isset($_SESSION["nombre_usuario"])){
			$variable= $_SESSION['nombre_usuario'];
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT id_usuario FROM usuarios WHERE nombre_usuario= '$variable' ");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	}

	public function Eliminar_user($id_usuario){

		try{
			$sql = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario = ?");			          
			$sql->execute(array($id_usuario));
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	

	
}

?>