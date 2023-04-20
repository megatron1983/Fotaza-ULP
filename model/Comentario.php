<?php
class Comentario extends EntidadBase{
    private int $comentarioId;
    private int $publicacionId;
    private int $usuarioId;
    private $fechaDeCreacion;
    private string $descripcion;
	
    
    public function __construct() {
        $table="comentario";
        $primarykey="comentarioId";
        parent::__construct($table,$primarykey);
    }
    
    public function getId() {
        return $this->comentarioId;
    }

    public function setId($id) {
        $this->comentarioId = $id;
    }
    
    public function getPubliacacioId() {
        return $this->publicacionId;
    }

    public function setPubliacacioId($publicacionId) {
        $this->publicacionId = $publicacionId;
    }

    public function getUsuarioId() {
      return $this->usuarioId;
  }

  public function setUsuarioId($usuarioId) {
      $this->usuarioId = $usuarioId;
  }

  public function getFechaDeCreacion() {
    return $this->fechaDeCreacion;
}

public function setFechaDeCreacion($fechaDeCreacion) {
    $this->fechaDeCreacion = $fechaDeCreacion;
}

public function getDescripcion() {
  return $this->descripcion;
}

public function setDescripcion($descripcion) {
  $this->descripcion = $descripcion;
}

public function alta(){
    $query="INSERT INTO comentario (comentarioId,publicacionId,usuarioId,fechaDeCreacion,descripcion)
            VALUES(NULL,
                           '".$this->publicacionId."',
						   '".$this->usuarioId."',
						   '".$this->fechaDeCreacion."',
                           '".$this->descripcion."');";
    $save=$this->db()->query($query);
    //$this->db()->error;
    return $save;
}

public function modificar(){
    $query= "UPDATE comentario set nombre = '$this->nombre'  where comentarioId = $this->comentarioId";//que va en $this->nombre
    
    $save=$this->db()->query($query);
    //$this->db()->error;
    return $save;

}

public function eliminar(){
    $query= "DELETE comentario  where comentarioId = $this->comentarioId";
    
    $save=$this->db()->query($query);
    //$this->db()->error;
    return $save;

}


}
?>