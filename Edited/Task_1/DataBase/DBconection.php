<?php
class DB {
    protected $con;
    protected $host = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $database = 'user';
    
    // Create a connection
    public function __construct() {
        $dsn = "mysql:host=".$this->host.";dbname=".$this->database;
        try {
            $this->con = new PDO($dsn, $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>