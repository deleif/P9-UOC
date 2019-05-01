<?php

require_once 'model/conexion.php';
	


class Categorias {
	
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


	public function InsertarNuevaCategoría(Categorias $data){

		try {                
			$sql = "INSERT INTO categorias (descripcion_categoria) 
			VALUES (?)";
					
			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->descripcion_categoria
					)
				);
			} catch (Exception $e) {    
				echo "Error al crear la categoria<br>";
				die($e->getMessage());
			}
	}

	

	public function EliminarCategoria($id_categoria){

		try{
			if ($id_categoria<> 4){
			$sql = $this->pdo->prepare("DELETE FROM categorias WHERE id_categoria = ?");			          
			$sql->execute(array($id_categoria));
			}
			else{
				echo "No se puede eliminar este tipo de categoría";
			}
		} catch (Exception $e){
			die($e->getMessage());
		}
	}



	public function ModificarCategoria($data){

        try{
			$sql = "UPDATE categorias SET descripcion_categoria = ? WHERE id_categoria = ? ";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->descripcion_categoria,
						$data->id_categoria
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}


	public function Obtener_cat($id_categoria){

		try{ 
			$sql = $this->pdo->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
			$sql->execute(array($id_categoria));
			return $sql->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
}

}

?>