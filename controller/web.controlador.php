<?php

require_once 'model/modelo_usuarios.php';
require_once 'model/modelo_productos.php';
require_once 'model/modelo_categorias.php';	
require_once 'model/modelo_valoraciones.php';		

class WebControlador{
	
    private $usuario;
    private $productos;
    private $categorias;
    private $valoraciones;
    

	public function __CONSTRUCT(){
		
    $this->usuario= new Usuario();
    $this->productos= new productos();
    $this->categorias= new Categorias();
    $this->valoraciones= new valoraciones();

    }
    
    public function Index(){
		
        $productos = new Productos();

        require_once 'view/header.php';
        require_once 'view/Contenido/home.php';
        require_once 'view/footer.php';
    }
	
	public function Registro_usuario(){
		
		$user = new Usuario();
		
        require_once 'view/header.php';
        require_once 'view/Contenido/registro.php';
        require_once 'view/footer.php';
    }
	
	public function Login_usuario(){
		
		$user = new Usuario();
		
        require_once 'view/header.php';
        require_once 'view/Contenido/login.php';
        require_once 'view/footer.php';
    }


    public function Crud(){

        $prod = new Productos();
      
        require_once 'view/header.php';
        require_once 'view/Contenido/vista_productos.php';
        require_once 'view/footer.php';
    }
	
	public function Guardar_usuarios(){


		$user = new Usuario();
		
        $user->nombre_usuario = $_REQUEST['nombre_usuario'];
        $user->password_usuario = $_REQUEST['password_usuario'];
       	$this->usuario->Registrar($user);
        
        echo "Usuario registrado con exito, <a href='index.php'>volver</a>";
	}
	
	public function Iniciar_sesion(){
		
		$user = new Usuario();
		
        $user->nombre_usuario = $_REQUEST['nombre_usuario'];
        $user->password_usuario = $_REQUEST['password_usuario'];        
		
		$this->usuario->Validar($user);

    }


    public function ValorarProducto(){

        $prodsel = new Productos();

        if(isset($_SESSION["nombre_usuario"])){
        
            if(isset($_REQUEST['id_producto'])){
                $prodsel = $this->productos->ObtenerProducto($_REQUEST['id_producto']);
            }
            
            require_once 'view/header.php';
            require_once 'view/Contenido/vista_valora_producto.php';
            require_once 'view/footer.php';
        }

        else {
			header("Location: index.php?c=Web&a=Login_usuario");
		}
    }

    public function Admin(){

        $user = new Usuario();

        if ($_SESSION["nombre_usuario"] == 'Admin' ) {		
			
			require_once 'view/header.php';
			require_once 'view/Contenido/vista_admin.php';
			require_once 'view/footer.php';
		}

		elseif ($_SESSION["nombre_usuario"] == 'Admin' ) {		
			
			echo "Necesitas ser Goku o el Administrador de la web para acceder";
		}

		
		else {
			header("Location: index.php?c=Web&a=Login_usuario");
		}
    }

    public function Administracion(){

        $user = new Usuario();

        if ($_SESSION["nombre_usuario"] == 'Admin' ) {		
			
			require_once 'view/header.php';
			require_once 'view/Contenido/vista_administracion.php';
			require_once 'view/footer.php';
		}

		elseif ($_SESSION["nombre_usuario"] == 'Admin' ) {		
			
			echo "Necesitas ser Goku o el Administrador de la web para acceder";
		}

		
		else {
			header("Location: index.php?c=Web&a=Login_usuario");
		}
    }

    public function Administracion_prod(){

        $prod =new Productos();
        if ($_SESSION["nombre_usuario"] == 'Admin' ) {		
			
			require_once 'view/header.php';
			require_once 'view/Contenido/vista_administracion_prod.php';
			require_once 'view/footer.php';
		}

		elseif ($_SESSION["nombre_usuario"] == 'Admin' ) {		
			
			echo "Necesitas ser Goku o el Administrador de la web para acceder";
		}

		
		else {
			header("Location: index.php?c=Web&a=Login_usuario");
		}

    }


    public function Editar_Usuario(){

        $user = new Usuario();
        
        if(isset($_REQUEST['id_usuario'])){
            $user = $this->usuario->Obtener_usuario($_REQUEST['id_usuario']);
        }
        
        require_once 'view/header.php';
        require_once 'view/Contenido/vista_editar_usuario.php';
        require_once 'view/footer.php';

    }

    public function Guardar_Usuario(){

        $user = new Usuario();
        
        $user->id_nivel = $_REQUEST['id_nivel'];
        $user->nombre_usuario = $_REQUEST['nombre_usuario'];
        $user->password_usuario = $_REQUEST['password_usuario'];
        $user->id_usuario = $_REQUEST['id_usuario'];

        $this->usuario->Actualizar_usuario($user);
        
        header("Location: index.php?c=Web&a=Administracion");

    }

    public function Eliminar_Usuario(){

        $this->usuario->Eliminar_user($_REQUEST['id_usuario']);
        header("Location: index.php?c=Web&a=Administracion");

    }

    public function Editar_Producto(){

        $prod= new Productos();

		if(isset($_REQUEST['id_producto'])){
            $prod = $this->productos->Obtener_prod($_REQUEST['id_producto']);
        }

		require_once 'view/header.php';
		require_once 'view/Contenido/vista_administracion_prod2.php';
		require_once 'view/footer.php';
    }

    public function Actualizar_producto(){

		$prod= new Productos();

		//para la carga de la imagen
		$foto = $_FILES['ruta_foto']['name'];
		$ruta = $_FILES['ruta_foto']['tmp_name'];
		$destino = "assets/images/".$foto;
		copy($ruta,$destino);

        $prod->id_producto = $_REQUEST['id_producto'];
        $prod->id_categoria = $_REQUEST['id_categoria'];
        $prod->nombre_producto = $_REQUEST['nombre_producto'];
		$prod->descripcion_producto = $_REQUEST['descripcion_producto'];
		$prod->ruta_foto= $destino;



        $this->productos->Modificar_prod($prod);
        
        header("Location: index.php?c=Web&a=Admin");


	}

    public function Eliminar_Producto(){

        $this->productos->Eliminar_prod($_REQUEST['id_producto']);
        header("Location: index.php?c=Web&a=Administracion");

    }

    public function Anadir_Producto(){

        $prod= new Productos();
        $user = new Usuario();

        if ($_SESSION["nombre_usuario"] == 'Admin' ) {		
			
			require_once 'view/header.php';
			require_once 'view/Contenido/vista_anadir_prod.php';
			require_once 'view/footer.php';
		}

		elseif ($_SESSION["nombre_usuario"] == 'Admin' ) {		
			
			echo "Necesitas ser Goku o el Administrador de la web para acceder";
		}

		
		else {
			header("Location: index.php?c=Web&a=Login_usuario");
		}
		
		
	}

    public function Nuevo_Producto(){

        $prod= new Productos();

		//para la carga de la imagen
		$foto = $_FILES['ruta_foto']['name'];
		$ruta = $_FILES['ruta_foto']['tmp_name'];
		$destino = "assets/images/".$foto;
		copy($ruta,$destino);

        $prod->id_categoria = $_REQUEST['id_categoria'];
        $prod->nombre_producto = $_REQUEST['nombre_producto'];
		$prod->descripcion_producto = $_REQUEST['descripcion_producto'];
		$prod->ruta_foto= $destino;


		$this->productos->Nuevo_prod($prod);		

		echo "Producto añadido con éxito, <a href='index.php'>volver</a>";
    }


    public function ListarMenuCategorias(){
		
		$cat = new Categorias();
		
		$this->cat->ListarTipoCategorias();
    }


    public function VerProductosCategorias(){

        $prodcatsel = new Productos();
  

        
        if(isset($_REQUEST['id_categoria'])){
            $prodcatsel = $this->productos->ObtenerProductoCategoria($_REQUEST['id_categoria']);           
            
        require_once 'view/header.php';
        require_once 'view/Contenido/vista_categoria_productos.php';
        require_once 'view/footer.php';
 
        }
        else {
			header("Location: index.php?c=Web&a=Login_usuario");
		}
    }

    public function Votar(){
        require_once 'model/modelo_valoraciones.php';
        require_once 'model/modelo_usuarios.php';

        $alm= new Valoraciones();
        $usu= new Usuario();
        
        
                $usu = $this->valoraciones->buscar_id_usuario($_SESSION['nombre_usuario']);
                
                $alm->id_usuario = $usu->id_usuario;
                $alm->id_producto = $_REQUEST['id_producto'];
                $alm->puntos_producto_usuario = $_REQUEST['estrellas'];
                $alm->valoracion_producto = $_REQUEST['valoracion_escrita'];
                
                $this->valoraciones->Votacion($alm);
                
                //intento de if para que detecte si el usuario ya ha votado una vez un produco y poder 
                //actualizarlo o registrarlo si no lo ha votado nunca.
                //if ($alm->id_usuario && $alm->id_producto  == 0 ){
                   // $this->valoraciones->Votacion($alm);
               // }else{
                   // $this->valoraciones->Update_Votacion($alm);
               // }
                   
                    

                   
                
                header("Location: index.php");
                         
   }
   
   
}


    

?>