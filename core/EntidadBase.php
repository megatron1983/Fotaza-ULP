<?php
class EntidadBase{
    private string $table;
    private static mysqli $db;
    private  string $primarykey;
    //private $conectar;

    public function __construct(string $table, string $primarykey) {
        $this->table= $table;
      $this->primarykey = $primarykey;
        require_once 'Conectar.php';
        $conectar = new Conectar();
        self::$db = $conectar->getConnection();

    }
    
    
    public function db(){
        return self::$db;
    }
    
    public function getAll( string $order="DESC"): array
    {
        
        $resultSet = [];

        $query=$this->db()->query("SELECT * FROM $this->table ORDER BY $this->primarykey $order");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getById( int $id): NULL | object 
    {
        $resultSet = NULL;
        $query=$this->db()->query("SELECT * FROM $this->table WHERE $this->primarykey =$id");

        if($row = $query->fetch_object()) {
           $resultSet=$row;
        }
        
        return $resultSet;
    }
    
    public function getBy(string $columna, string $value):array
    {
        $resultSet = [];
        $query=$this->db()->query("SELECT * FROM $this->table WHERE $columna='$value'");

        while($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }
    //Elimina un solo registro por id
    public function deleteById( int $id):bool
    {
        $query=$this->db()->query("DELETE FROM $this->table WHERE $this->primarykey =$id");
        if($query) {
         return true;
        }else{
         return false;
        }
        
    }
    //Elimina 0 o más filas con un valor determinado
    public function deleteBy(string $columna,string $value):bool
    {
        $query=$this->db()->query("DELETE FROM $this->table WHERE $columna='$value'"); 
        if($query) {
         return true;
        }else{
         return false;
        }
        
    }
    /*
     * Aqui podemos agregar otros métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */
    
}
?>
