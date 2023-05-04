<?php 

namespace App\Core;

use PDO;
use PDOException;

class DBConnection 
{
    private $serverName = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $dbName = DB_NAME; 
    protected $connection;

    public function __construct() 
    {
        $this->connection = $this->connect();
    }

    private function connect() 
    {
        try {
            $connection = new PDO("mysql:host=$this->serverName;dbname=$this->dbName",
                $this->username,
                $this->password
            );
    
            // set the PDO error mode to exception
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $connection;
    }

    public function getConnection() 
    {
		try {
			return $this->connection;
		} catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
