<?php
class Publicacion extends EntidadBase{
    private $licenciaId;
    private $fechaDePublicacion;
    private $titulo;
    private $imagen;
    private $etiqueta1;
    private $etiqueta2;
    private $etiqueta3;
    private $estado;
    private $publica;
    
    public function __construct() {
        $table="publicacion";
        $primarykey="publicacionId";
        parent::__construct($table,$primarykey);
    }
    
    public function getId() {
        return $this->licenciaId;
    }

    public function setId($id) {
        $this->licenciaId = $id;
    }
    
    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function getCategoriaId() {
      return $this->categoriaId;
  }

  public function setCategoriaId($categoriaId) {
      $this->categoriaId = $categoriaId;
  }

  public function getLicenciaId() {
    return $this->licenciaId;
}

public function setLicenciaId($licenciaId) {
    $this->licenciaId = $licenciaId;
}

public function getFechaDePublicacion() {
  return $this->$fechaDePublicacion;
}

public function setFechaDePublicacion($fechaDePublicacion) {
  $this->fechaDePublicacion = $fechaDePublicacion;
}

public function getTitulo() {
  return $this->titulo;
}

public function setTitulo($titulo) {
  $this->titulo = $titulo;
}

public function getImagen() {
  return $this->imagen;
}

public function setImagen($imagen) {
  $this->imagen = $imagen;
}


public function getEtiqueta1() {
  return $this->etiqueta1;
}

public function setEtiqueta1($etiqueta1) {
  $this->etiqueta1 = $etiqueta1;
}

public function getEtiqueta2() {
  return $this->etiqueta2;
}

public function setEtiqueta2($etiqueta2) {
  $this->etiqueta2 = $etiqueta2;
}

public function getEtiqueta3() {
  return $this->etiqueta3;
}

public function setEtiqueta3($etiqueta3) {
  $this->etiqueta3 = $etiqueta3;
}

public function getPublica() {
  return $this->publica;
}

public function setPublica($publica) {
  $this->publica = $publica;
}

public function alta(){
  $query="INSERT INTO publicacion (publicacionId,usuarioId,categoriId,licenciaId,titulo,imagen,etiqueta1,etiqueta2,etiqueta3,publica)
          VALUES(NULL,
               '".$this->usuarioId."',
						   '".$this->categoriId."',
						   '".$this->licenciaId."',
						   
               '".$this->titulo."',
               '".$this->imagen."',
						   
						   '".$this->etiqueta1."',
						   '".$this->etiqueta2."',
               '".$this->etiqueta3."',
               '".$this->publica."');";
  $save=$this->db()->query($query);
  //$this->db()->error;
  return $save;
}

public function modificar(){
  $query= "UPDATE publicacion set nombre = '$this->nombre'  where id = $this->id";//que va en $this->nombre
  
  $save=$this->db()->query($query);
  //$this->db()->error;
  return $save;

}

public function eliminar(){
  $query= "DELETE publicacion  where id = $this->id";
  
  $save=$this->db()->query($query);
  //$this->db()->error;
  return $save;

}


}
?>