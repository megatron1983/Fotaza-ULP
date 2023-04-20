<?php
class AcercaDeController extends ControladorBase{
    public $conectar;
		
    public function __construct() {
        parent::__construct();
		 
        
    }

    public function acercaDe(){

        $usuario = new Usuario();
        $this->view("acerca/acercaDe",array(
            
           "usuario"=>$usuario
        ));			
}	 
  }
  ?>