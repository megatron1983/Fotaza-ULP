<?php
class HomeController extends ControladorBase{
    public $conectar;
		
    public function __construct() {
        parent::__construct();
		 
        
    }

    public function index(){

        $usuario = new Usuario();
        $this->view("Inicio/index",array(
            
           "usuario"=>$usuario
        ));			
}	 
  }
  ?>