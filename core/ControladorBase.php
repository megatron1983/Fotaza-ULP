<?php
class ControladorBase{

    public function __construct() {
		require_once 'Conectar.php';
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';
        
        //Incluir todos los modelos
        foreach(glob("model/*.php") as $file){
            require_once $file;
        }
    }
    
    //funcionalidades comunes a todos los controladores
    
    public function view($vista,$datos){
        foreach ($datos as $id_assoc => $valor) {
            //define y setea todas las variables que se usarán en la vista
            $$id_assoc=$valor; 
        }
        
        //crea una instancia con funciones ùtiles para las vistas
        require_once 'core/AyudaVistas.php';
        $helper=new AyudaVistas();
    
        require_once 'view/'.$vista.'View.php';
    }
    
    public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        header("Location:index.php?controller=".$controlador."&action=".$accion);
    }
    
    public function subirNuevo() {
        $imagenSubida = false;

        if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['name'] != "") {

            // Recibimos los datos de la imagen
            $nombre_imagen = $_FILES['imagen']['name'][0];
            $tipo_imagen = $_FILES['imagen']['type'][0];
            $size_imagen = $_FILES['imagen']['size'][0];
            $tmpName = $_FILES['imagen']['tmp_name'][0];

            $wh =  getimagesize($tmpName);
            $width = $wh[0];              //Ancho
            $height = $wh[1];               //Alto

            if ( !( (strpos($tipo_imagen, 'gif') || strpos($tipo_imagen, 'jpeg') || strpos($tipo_imagen, 'jpg') || strpos($tipo_imagen, 'png')) && ($size_imagen < 2000000)) ) {

                $mensajes[] = "Error. La extensión o el tamaño del archivo NO es correcta.";
                $this->view("mensajeError", array("mensajes"=>$mensajes));

            } else {
                if ( move_uploaded_file($tmpName,CARPETA_IMAGENES.$nombre_imagen) ) {

                    chmod(CARPETA_IMAGENES.$nombre_imagen, 0777);
//                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                    $imagenSubida = true;

                } else {
                    $mensajes[] = "Error. Ocurrió algún error al subir el fichero. No pudo guardarse.";
                    $this->view("mensajeError", array("mensajes"=>$mensajes));
                }
            }
        }
        
        return $imagenSubida;
    }
    

}
?>
