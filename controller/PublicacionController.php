<?php
class PublicacionController extends ControladorBase{
    public $conectar;
		
    public function __construct() {
        parent::__construct();
		 
        
    }

    //Muestra la pagina para publicar una imagen
    public function publicar(){

      $categoria= new Categoria();
      $allcategorias=$categoria->getAll();
      $licencia= new Licencia();
      $alllicencias=$licencia->getAll();
      //var_dump($_POST);
      //return;

		   //Cargamos la vista index y le pasamos valores
			$this->view("Publicar/publicar",array(
				"allcategorias"=>$allcategorias,
            "alllicencias"=>$alllicencias
			));
      }	
    //Inserta la publicacion en la BD

   public function insertar(){
     // var_dump($_FILES);
      
       //$this->redirect("home", "index");
      //return;
			//controlar
			if( 
                 isset($_POST["licencia"]) && $_POST["licencia"]!="" 
                && isset($_POST["categoria"]) && $_POST["categoria"]!=""
                && isset($_POST["titulo"]) && $_POST["titulo"]!="" 
                && isset($_POST["etiqueta1"]) && $_POST["etiqueta1"]!="" 
                && isset($_POST["etiqueta2"]) && $_POST["etiqueta2"]!="" 
                && isset($_POST["etiqueta3"]) && $_POST["etiqueta3"]!=""
                && isset($_POST["publica"]) && $_POST["publica"]!=""
               ) 
                {
               
                  //almacenar el archivo
                  $publicacion= new Publicacion();
                  //var_dump(getdate());
                      //return;
                    //Creamos una publicacion
                
                    $publicacion->setLicenciaId($_POST["licencia"]);
                    $publicacion->setCategoriaId($_POST["categoria"]);
                    $publicacion->setImagen($_POST["imagen"]);
                    $publicacion->setTitulo($_POST["titulo"]);
                    $publicacion->setEtiqueta1($_POST["etiqueta1"]);
                    $publicacion->setEtiqueta2($_POST["etiqueta2"]);
                    $publicacion->setEtiqueta3($_POST["etiqueta3"]);
                    $publicacion->setPublica($_POST["publica"]);
                
                     //-------------------------------------------------
                    $nombreUnico = "default.jpg";
          //-------------------------------------------------
                  if ( isset($_FILES['imagen']) && !empty($_FILES['imagen']['name'][0]) ) {
                   sleep(1);// dormir durante 1 segundo
                  // Subir imagen (avatar) del usuario
                  $imagen = $_FILES['imagen']['name'][0];
                  $tmp = explode('.', $imagen);
                   $extension = end($tmp);
                   $nombreUnico = time().'.'.$extension;
          
                   if ( $extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension ==  'gif' || $extension == 'bmp') {
                       if ( !$this->subirImagen($nombreUnico, 0) ) {
                           $this->redirect("home", "index");
                       }
                        } else {
                           $this->redirect("home", "index");
                       }
                  }   
//-------------------------------------------------
        
                   $publicacion->setImagen($nombreUnico);
//-------------------------------------------------


                    $save=$publicacion->alta();
                    $this->redirect("usuario", "index");
                
                }
                 else{
                      //var_dump($_POST);
                      return;//Por aca entra cuando un campo esta vacio
                      $alert=true;
                      $mensaje="Datos imcompletos!";
                       //ir de nuevo a la vista registrar
                      $this->view("Publicar/publicar",array("alert"=>$alert,"mensaje"=>$mensaje));
                
                } 
			
		}
  }

  
  ?>