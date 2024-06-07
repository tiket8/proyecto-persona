<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'personacrud';
    private $username = 'postgres';
    private $password = 'Practicas';
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("pgsql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            //$this->conn->exec("set names utf8"); esto ya lo utiliza por defecto postgree
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
