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

    public function softDelete($id) {
        $this->profesion->pk_profesion = $id;
        if ($this->profesion->softDelete()) {
            header("Location: /ProyectoPersona/index.php?action=readProfesion");
        } else {
            echo "Error al eliminar la profesión";
        }
    }
}

$database = new Database();
$db = $database->getConnection();
$controller = new ProfesionController($db);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'readProfesion':
        $profesiones = $controller->read();
        $view = 'views/profesion/index.php';
        break;
    case 'softDelete':
        $controller->softDelete($id);
        break;
    default:
        $profesiones = $controller->read();
        $view = 'views/profesion/index.php';
        break;
}

include('views/layout.php');
?>
