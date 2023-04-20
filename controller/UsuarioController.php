<?php
class UsuarioController extends ControladorBase{
    public $conectar;
    
		
    public function __construct() {
        parent::__construct();
		 
        
    }

		//Listar todos los Usuarios	
		public function index(){
			
			//Creamos el objeto usuario
			$usuario=new Usuario();

			//Conseguimos todos los usuarios
			$allusers=$usuario->getAll();
			//var_dump($allusers);

		   //Cargamos la vista index y le pasamos valores
			$this->view("usuario/usuario",array(
				"allusers"=>$allusers,
				"UnaVariableDeLaVista"    =>"Valor de la Vista"
			));
		}

		//Muestra el formulario de inserción
		//public function insertar(){
        
			//Conseguimos todos los usuarios
			//$provincia=new Provincia();
			//$allProvincias= $provincia->getAll();
			
			//Cargamos la vista para mostrar formulario de insert
			//$this->view("insertar",array(
			//	"allProvincias"=>$allProvincias
			//));
		
		

		// Llama a la vista para registrar un usuario
		public function registrar(){

				$this->view("usuario/registrar",[]);			
		}	 
        //Procesa los datos del formulario de inserción
		public function crear(){
            
			// posible agregacion de longitud
			if(isset($_POST["nombre"]) && $_POST["nombre"]!="" 
                && isset($_POST["apellido"]) && $_POST["apellido"]!="" 
                && isset($_POST["sexo"]) && $_POST["sexo"]!="" 
                && isset($_POST["email"]) && $_POST["email"]!="" 
                && isset($_POST["contrasena"]) && $_POST["contrasena"]!="" ){
                
                //Validar el mail del usuario para saber si el usuario no esta registrado
                $usuario= new Usuario();
                if($usuario->verificarUsuario($_POST["email"])==0){
                    //Creamos un usuario
                    $usuario->setNombre($_POST["nombre"]);
                    $usuario->setApellido($_POST["apellido"]);
                    $usuario->setEmail($_POST["email"]);
                    $usuario->setContrasena($_POST["contrasena"]);
                    $usuario->setSexo($_POST["sexo"]);
                    $save=$usuario->save();
                    $this->redirect("usuario", "index");
                }
                else{//Por aca entra cuando el usuario existe
                    $alert=true;
                    $mensaje="El usuario ya existe!";
                    //ir de nuevo a la vista registrar
                    $this->view("usuario/registrar",array("alert"=>$alert,"mensaje"=>$mensaje));
                }
				
			}else{//Por aca entra cuando un campo esta vacio
                $alert=true;
                  $mensaje="Datos imcompletos!";
                    //ir de nuevo a la vista registrar
                    $this->view("usuario/registrar",array("alert"=>$alert,"mensaje"=>$mensaje));
                
            }
			
		}

		//Procesa el borrado de unUsuario
		public function borrar(){
			if(isset($_GET["id"])){ 
				$id=(int)$_GET["id"];
				
				$usuario=new Usuario();
				$usuario->deleteById($id); 
			}
			$this->redirect("usuario", "index");
		}
   
     
	
		public function editar(){
			if(isset($_GET["id"])){ 
				$id=(int)$_GET["id"];
				$usuario = new Usuario();
				$usuario = $usuario->getById($id);

				$this->view("usuario/editar",array(
					"usuario"=>$usuario
				));
			}
		}	 

		//Procesa los datos del formulario de edición
		public function actualizar(){
			
			if(isset($_POST["nombre"])){

				$usuario=new Usuario();
				$usuario->setId($_POST["id"]);
				$usuario->setNombre($_POST["nombre"]);
				$usuario->setApellido($_POST["apellido"]);
				$usuario->setSexo($_POST["sexo"]);
				$usuario->setEmail($_POST["email"]);
				

				$save=$usuario->save();
			}
			$this->redirect("Usuario", "index");
		}

		public function iniciarSesion(){
			
			$usuario = new Usuario();
			$this->view("usuario/login",array(
				
				"usuario"=>$usuario
			));			
	}	 

	public function login(){
		
		if(isset($_POST["email"]) && isset($_POST["contrasena"]) ){
				
			//Creamos un usuario
			$usuario=new Usuario();
			$usuario->setEmail($_POST["email"]);
			
			$usuario->setContrasena($_POST["contrasena"]);
			//var_dump($usuario);
			//$save=$usuario->save();
			if($usuario->existe($usuario)){
				echo "Usuario encontrado";

				
			}
			else{
				echo "Usuario no encontrado";
			}
		}
		else{
			echo "Complete los campos";
		}
		
	}

	}

    


?>
