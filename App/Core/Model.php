<?php 

namespace App\Core;

use App\Core\DBConnection;
use PDO;

class Model
{
    public $table_name;

    function __construct($table_name)
    {
       $this->table_name = $table_name;
    }

    // database connection and table name
    private function DB()
    {
        $db = new DBConnection();
        return $db->getConnection();
    }

    public function all($model)
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id";  
        $result = $this->DB()->query( $query )->fetchAll(PDO::FETCH_CLASS, $model); 
        return $result;
    }

    public function create(array $columns, array $values)
    {
        $query = "INSERT INTO " . $this->table_name . " (" . implode(",", $columns) . ")
                  VALUES ('" . implode("', '", $values) . "')";  
        $result = $this->DB()->query( $query ); 
        return $result;
    }

    public function delete($ids)
    {
        $values = is_array($ids) ? implode("', '", $ids) : $ids;
        $query = "DELETE FROM " . $this->table_name . " WHERE id in('" . $values . "')";  
        $result = $this->DB()->query( $query ); 
        return $result;
    }
}