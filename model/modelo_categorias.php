<?php

require_once 'model/conexion.php';
	


class Categorias extends Productos{
	
	private $pdo;

	
	public $id_categoria;
	public $descripcion_categoria;

	
	public function __CONSTRUCT(){
		try{
			$this->pdo = Conexion::Conectar();     
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}


	
	public function ListarTipoCategorias()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM categorias");

			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


}

?>