<?php
require_once 'model/conexion.php';
    class  Valoraciones {
        private $pdo;
        public $id_usuario;
        public $id_producto;
        public $puntos_producto_usuario;
        public $valoracion_producto;
        public $nombre_usuario;
        public $nombre_producto;

        public function __CONSTRUCT(){
            try{
                $this->pdo = Conexion::Conectar();     
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
        public function Votacion(Valoraciones $data){
 
                try{
                    
                $sql = "INSERT INTO votaciones_producto (id_usuario, id_producto, puntos_producto_usuario,valoracion_producto) 
                            VALUES (?, ?, ?, ?)";
                    $this->pdo->prepare($sql)
                        ->execute(
                            array(
                                $data->id_usuario,
                                $data->id_producto, 
                                $data->puntos_producto_usuario, 
                                $data->valoracion_producto)
                            
                    );
                    
                    } catch (Exception $e) {
                        $_SESSION['errorvaloracion'] ="Error en votación. <br>Has intentado votar el mismo producto dos veces.";			
                        header("Location: index.php?c=Web&a=ValorarProducto&id_producto=<?php echo $r->id_producto; ?>");
                      }
            
        }        
        public function buscar_id_usuario($nombre_usuario){
            
                try{
                    $sql="SELECT * FROM usuario WHERE nombre_usuario= '$nombre_usuario' ";
                    $stm= $this->pdo->prepare($sql);
                    $stm->execute();
                    return $stm->fetch(PDO::FETCH_OBJ);
                }catch(Exception $e){
                    die($e->getMessage());
                }
            
        }   
        
        
         public function Buscar_Lista_Votaciones(){
            
            try{
                
                $stm= $this->pdo->prepare("SELECT nombre_usuario, nombre_producto, ruta_foto, valoracion_producto, puntos_media, puntos_producto_usuario
                FROM usuario
                INNER JOIN votaciones_producto ON usuario.id_usuario = votaciones_producto.id_usuario
                INNER JOIN productos ON votaciones_producto.id_producto = productos.id_producto");
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        
    } 
    public function buscar_valoracion_por_producto($id_producto){
            
        try{
            
            $stm= $this->pdo->prepare("SELECT nombre_usuario, nombre_producto, ruta_foto, valoracion_producto, puntos_media, puntos_producto_usuario
            FROM usuario
            INNER JOIN votaciones_producto ON usuario.id_usuario = votaciones_producto.id_usuario
            INNER JOIN productos ON votaciones_producto.id_producto = productos.id_producto
            and productos.id_producto= '$id_producto'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    
    }
    public function ListarValoraciones(){
        try{
			$result = array();
			$sql = $this->pdo->prepare("SELECT usuario.nombre_usuario, votaciones_producto.valoracion_producto, votaciones_producto.id_usuario, votaciones_producto.id_producto, productos.nombre_producto 
                                        FROM usuario, votaciones_producto, productos
                                        WHERE usuario.id_usuario=votaciones_producto.id_usuario AND productos.id_producto=votaciones_producto.id_producto");
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
    }
    public function Obtener_coment($id_usuario, $id_producto){
		try{
			$sql = $this->pdo
			    ->prepare("SELECT * FROM votaciones_producto WHERE id_usuario = ? AND id_producto = ?");         
				$sql->execute(array($id_usuario, $id_producto));
			return $sql->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
    public function Modificar_Comentario($data){
        try{
			$sql = "UPDATE votaciones_producto SET 
						valoracion_producto = ? 
				    WHERE id_usuario = ? AND id_producto = ?";
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->valoracion_producto, 
                        $data->id_usuario,
                        $data->id_producto
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
    }
}
?>