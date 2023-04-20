<?php
class Interes extends EntidadBase{
    private int $interesId;
    private int $usuarioId;
    private int $categoriaId;
	
    public function __construct() {
        $table="interes";
        $primarykey="interesId";
        parent::__construct($table,$primarykey);
    }
    
    public function getId() {
        return $this->interesId;
    }

    public function setId($id) {
        $this->interesId = $id;
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

  public function alta(){
    $query="INSERT INTO interes (interesId,usuarioId,categoriaId)
            VALUES(NULL,
                   '".$this->usuarioId."',
                   '".$this->categoriaId."');";
    $save=$this->db()->query($query);
    //$this->db()->error;
    return $save;
}

public function modificar(){
    $query= "UPDATE interes set nombre = '$this->nombre'  where id = $this->id";//que va en $this->nombre
    
    $save=$this->db()->query($query);
    //$this->db()->error;
    return $save;

}

public function eliminar(){
    $query= "DELETE interes  where id = $this->id";
    
    $save=$this->db()->query($query);
    //$this->db()->error;
    return $save;

}


}
?>