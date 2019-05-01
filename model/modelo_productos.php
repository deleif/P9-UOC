<?php

require_once 'model/conexion.php';
		

    class  Productos {

        private $pdo;

        public $id_producto;
        public $id_categoria;
        public $nombre_producto;
        public $descripcion_producto;
        public $ruta_foto;
        public $num_votos;
        public $noticia_texto;
        public $puntos_total;
        public $puntos_media;
   

        public function __CONSTRUCT(){
            try{
                $this->pdo = Conexion::Conectar();     
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
        


        public function ListarProductos()
        {
            try
            {
                $stm = $this->pdo->prepare("SELECT a.id_producto, b.descripcion_categoria as id_categoria, a.nombre_producto, a.descripcion_producto, a.ruta_foto, a.num_votos, a.puntos_total, a.puntos_media 
                FROM productos a 
                inner join categorias b where a.id_categoria = b.id_categoria");

                $stm->execute();    
                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Nuevo_prod(Productos $data){

            try {                
                $sql = "INSERT INTO productos (id_categoria,nombre_producto,descripcion_producto,ruta_foto) 
                VALUES (?,?,?,?)";
                        
                $this->pdo->prepare($sql)
                    ->execute(
                        array(
                            $data->id_categoria,
                            $data->nombre_producto,
                            $data->descripcion_producto,
                            $data->ruta_foto
                        )
                    );
                } catch (Exception $e) {    
                    echo "Error al crear el producto<br>";
                    die($e->getMessage());
                }
        }


        public function ObtenerProducto($id_producto)
        {
            try 
            {                
                $stm = $this->pdo->prepare("SELECT a.id_producto, b.descripcion_categoria as id_categoria, a.nombre_producto, a.descripcion_producto, a.ruta_foto, a.num_votos, a.puntos_total, a.puntos_media 
                FROM productos a 
                inner join categorias b where a.id_categoria = b.id_categoria and id_producto = '$id_producto' " );
    
                $stm->execute(array($id_producto));
                return $stm->fetch(PDO::FETCH_OBJ);
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }


        public function ObtenerProductoCategoria($id_categoria)
        {
            try 
            {                
                $stm = $this->pdo->prepare("SELECT a.id_producto, b.descripcion_categoria as descripcion_categoria, a.nombre_producto, a.descripcion_producto, a.ruta_foto, a.num_votos, a.puntos_total, a.puntos_media 
                FROM productos a 
                inner join categorias b where a.id_categoria = b.id_categoria and a.id_categoria = '$id_categoria' ");
    
                $stm->execute();    
                return $stm->fetchAll(PDO::FETCH_OBJ);

            } 
            catch (Exception $e) 
            {
                die($e->getMessage());
            }
        }

        public function Obtener_prod($id_producto){

            try{ 
                $sql = $this->pdo->prepare("SELECT * FROM productos WHERE id_producto = ?");
                $sql->execute(array($id_producto));
                return $sql->fetch(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }
    }

    public function Modificar_prod($data){

        try{
                $sql = "UPDATE productos SET 
                    id_categoria = ?, 
                    nombre_producto = ?,
                    descripcion_producto = ?,
                    ruta_foto = ?
                WHERE id_producto = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->id_categoria, 
                        $data->nombre_producto,
                        $data->descripcion_producto,
                        $data->ruta_foto,
                        $data->id_producto
                    )
                );
            } catch (Exception $e) {
                die($e->getMessage());
                }
    }

    public function Eliminar_prod($id_producto){

            try{
                $sql = $this->pdo->prepare("DELETE FROM productos WHERE id_producto = ?");			          
                $sql->execute(array($id_producto));
            } catch (Exception $e){
                die($e->getMessage());
            }
    }


    public function ActualizaCategoriaProductos($id_categoria){

        try{
            $sql = $this->pdo->prepare("UPDATE productos SET id_categoria = 4 where id_categoria = ?");			          

            $sql->execute(array($id_categoria));
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

}



    

?>



  