<?php
class Categoria extends EntidadBase{
    private int $categoriaId;
    private string $nombre;
    
    public function __construct() {
        $table="categoria";
        $primarykey="categoriaId";
        parent::__construct($table, $primarykey);
    }
    
    public function getId(): int 
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function alta()
    {
        $query="INSERT INTO categoria (categoriaId,nombre)
                VALUES(NULL,
                       '".$this->nombre."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    public function modificar(){
        $query= "UPDATE categoria set nombre = '$this->nombre'  where categoriaId = $this->id";
        
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;

    }

    public function eliminar(){
        $query= "DELETE categoria  where categoriaId = $this->categoriaId";
        
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;

    }

    

  }
  ?>