<?php
class Usuario extends EntidadBase{
    private int $usuarioId;
    private string $contrasena;
    private string $apellido;
    private string $nombre;
    private string $email;
    private string $sexo;
	private $foto;
    
    public function __construct() {
        $table="usuario";
        $primarykey="usuarioId";
        parent::__construct($table,$primarykey);
    }
    
    public function getId() {
        return $this->usuarioId;
    }

    public function setId($id) {
        $this->usuarioId = $id;
    }
    
    public function getContrasena() {
        return $this->contrasena;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
	
    public function save(){
		
		if(isset($this->usuarioId)){
			
			$query= "UPDATE usuario set nombre = '$this->nombre', apellido = '$this->apellido', sexo = '$this->sexo'
			,email = '$this->email'  where usuarioId = $this->usuarioId";
			$save=$this->db()->query($query);
			//$this->db()->error;
			return $save;
			
		}
		else{
					
			$query= "INSERT INTO usuario (usuarioId,contrasena,apellido,nombre,email,sexo,foto)
					VALUES(NULL,
						   '".$this->contrasena."',
						   '".$this->apellido."',
						   '".$this->nombre."',
						   '".$this->email."',
                           '".$this->sexo."',
                           '".$this->foto."');";
			$save=$this->db()->query($query);
			//$this->db()->error;
			return $save;
		}	
    }
    public function eliminar(){
        $query= "DELETE usuario  where usuarioId = $this->usuarioId";
        
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;

    }

    public function existe($usuario){
        $consulta= "SELECT * from usuario where email= '$usuario->email' && contrasena= '$usuario->contrasena' ";
        $result=$this->db()->query($consulta); //or die('Fallo'.$this->db()->error);
        if($result->num_rows==1){
            $row= $result->fetch_assoc();
            $u= new Usuario();
            $u=$this->getById($row['id']);
            $_SESSION['usuarioId']=$u->usuarioId;
            $_SESSION['contrasena']=$u->contrasena;
            $_SESSION['apellido']=$u->apellido;
            $_SESSION['nombre']=$u->nombre;
            $_SESSION['sexo']=$u->sexo; 
            $_SESSION['email']=$u->email;
            $_SESSION['foto']=$u->foto;
            return 1;
        }
        else{
            return 0;
        }

    }
    
    public function verificarUsuario($email){
        $consulta= "SELECT * from usuario where email= '$email' ";
      $result = $this->db()->query($consulta); //or die('Fallo'.$this->db()->error);
        if($result->num_rows==1){
            
            return 1;
        }
        else{
            return 0;
        }

    }
	

}
?>