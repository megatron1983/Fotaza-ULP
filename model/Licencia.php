<?php
class Licencia extends EntidadBase{
    private int $licenciaId;
    private int $usuarioId;
    private int $categoriaId;

   private string $tipo;
	
    public function __construct() {
        $table="licencia";
        $primarykey="licenciaId";
        parent::__construct($table,$primarykey);
    }
    
    public function getId() {
        return $this->licenciaId;
    }

    public function setId($id) {
        $this->licenciaId = $id;
    }
    
    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function alta(){
        $query="INSERT INTO interes (licenciaId,usuarioId,categoriaId,tipo)
                VALUES(NULL,
                       '".$this->usuarioId."',
                       '".$this->categoriaId."'
                       '".$this->tipo."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }
    
    public function modificar(){
        $query= "UPDATE interes set nombre = '$this->nombre'  where licenciaId = $this->licenciaId";//que va en $this->nombre
        
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    
    }
    
    public function eliminar(){
        $query= "DELETE interes  where id = $this->licenciaId";
        
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    
    }

}
?>