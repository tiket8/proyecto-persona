<?php
require_once 'models/Profesion.php';
require_once 'config/database.php';

class ProfesionController {
    private $db;
    private $profesion;

    public function __construct($db) {
        $this->db = $db;
        $this->profesion = new Profesion($db);
    }

    public function read() {
        $stmt = $this->profesion->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $this->profesion->profesion = $data['profesion'];
        $this->profesion->hora = $data['hora'];
        $this->profesion->fecha = $data['fecha'];
        $this->profesion->estado = 1;
        return $this->profesion->create();
    }

    public function softDelete($id) {
        $this->profesion->pk_profesion = $id;
        return $this->profesion->softDelete();
    }
}
?>
