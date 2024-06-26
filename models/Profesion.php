<?php
class Profesion {
    private $conn;
    private $table_name = "profesion";

    public $pk_profesion;
    public $profesion;
    public $hora;
    public $fecha;
    public $estado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE estado = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (profesion, hora, fecha, estado) VALUES (:profesion, :hora, :fecha, :estado)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':profesion', $this->profesion);
        $stmt->bindParam(':hora', $this->hora);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':estado', $this->estado);
        return $stmt->execute();
    }

    public function softDelete() {
        $query = "UPDATE " . $this->table_name . " SET estado = 0 WHERE pk_profesion = :pk_profesion";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':pk_profesion', $this->pk_profesion);
        return $stmt->execute();
    }
}
?>
