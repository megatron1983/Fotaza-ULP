<?php
class Valoracion extends EntidadBase{
    private int $valoracionId;
    private int $usuarioId;
    private int $publicacionId;
    private int $cantidadEstrellas;
    private string $fechaDeValoracion;
    private int $cantidadDeValoracion;
	
    public function __construct() {
        $table="valoracion";
        $primarykey="valoracionId";
        parent::__construct($table,$primarykey);
    }
    
    public function getId() {
        return $this->valoracionId;
    }

    public function setId($id) {
        $this->usuarioId = $id;
    }
    
    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function getPublicacionId() {
      return $this->publicacionId;
    }

     public function setPublicacionId($publicacionId) {
      $this->publicacionId = $publicacionId;
    }

    public function getCantidadEstrellas() {
      return $this->cantidadEstrellas;
    }

     public function setCantidadEstrellas($cantidadEstrellas) {
      $this->cantidadEstrellas = $cantidadEstrellas;
    }

    public function getFechaDeValoracion() {
      return $this->fechaDeValoracion;
    }

     public function setFechaDeValoracion($fechaDeValoracion) {
      $this->fechaDeValoracion = $fechaDeValoracion;
    }

    public function getCantidadDeValoracion() {
      return $this->cantidadDeValoracion;
    }

     public function setCantidadDeValoracion($cantidadDeValoracion) {
      $this->cantidadDeValoracion = $cantidadDeValoracion;
    }

    public function alta(){
      $query="INSERT INTO valoracion (valoracionId,usuarioId,publicacionId,cantidadEstrellas,fechaDeValoracion,cantidadDeValoracio)
              VALUES(NULL,
                    '".$this->usuarioId."',
						        '".$this->publicacionId."',
						        '".$this->cantidadEstrellas."',
                    '".$this->fechaDeValoracion."
                    ".$this->cantidadDeValoracion."');";
      $save=$this->db()->query($query);
      //$this->db()->error;
      return $save;
  }

  public function modificar(){
      $query= "UPDATE valoracion set nombre = '$this->valoracionId'  where valoracionId = $this->valoracionId";
      
      $save=$this->db()->query($query);
      //$this->db()->error;
      return $save;

  }

  public function eliminar(){
      $query= "DELETE valoracion  where valoracionId = $this->valoracionId";
      
      $save=$this->db()->query($query);
      //$this->db()->error;
      return $save;

  }


}
?>