<?php
require_once 'models/Persona.php';
require_once 'config/database.php';

class PersonaController {
    private $db;
    private $persona;

    public function __construct($db) {
        $this->db = $db;
        $this->persona = new Persona($db);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->persona->nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
            $this->persona->primer_apellido = isset($_POST['primer_apellido']) ? $_POST['primer_apellido'] : '';
            $this->persona->segundo_apellido = isset($_POST['segundo_apellido']) ? $_POST['segundo_apellido'] : '';
            $this->persona->fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';
            $this->persona->edad = isset($_POST['edad']) ? $_POST['edad'] : '';
            $this->persona->sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
            $this->persona->fk_profesion = isset($_POST['fk_profesion']) ? $_POST['fk_profesion'] : '';
            $this->persona->direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
            $this->persona->codigo_postal = isset($_POST['codigo_postal']) ? $_POST['codigo_postal'] : '';

                        
            $this->persona->telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';

            // Manejo del archivo de foto de perfil
            if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["foto_perfil"]["name"]);
                move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], $target_file);
                $this->persona->foto_perfil = $target_file;
            } else {
                $this->persona->foto_perfil = null;
            }

            if ($this->persona->create()) {
                header("Location: /ProyectoPersona/index.php?action=read");
                exit();
            } else {
                echo "Error al crear la persona";
            }
        } else {
            $view = 'views/personas/create.php';
            include('views/layout.php');
        }
    }

    public function getLocation() {
        if (isset($_GET['codigo_postal'])) {
            $codigo_postal = $_GET['codigo_postal'];
            $query = "
                SELECT 
                    cp.codigo_postal, 
                    l.nombre AS localidad, 
                    m.nombre AS municipio, 
                    e.nombre AS estado 
                FROM codigos_postales cp
                JOIN localidades l ON cp.localidad_id = l.id
                JOIN municipios m ON l.municipio_id = m.id
                JOIN estados e ON m.estado_id = e.id
                WHERE cp.codigo_postal = :codigo_postal
            ";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':codigo_postal', $codigo_postal);
            $stmt->execute();
            $location = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($location) {
                echo json_encode($location);
            } else {
                echo json_encode(['error' => 'No se encontraron datos para el código postal proporcionado.']);
            }
        } else {
            echo json_encode(['error' => 'Código postal no proporcionado.']);
        }
        exit();
    }


    public function read() {
        $stmt = $this->persona->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($id) {
        $query = "SELECT p.*, pr.profesion 
                  FROM persona p
                  LEFT JOIN profesion pr ON p.fk_profesion = pr.pk_profesion
                  WHERE p.id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->persona->id = $id;
            $this->persona->nombres = $_POST['nombres'];
            $this->persona->primer_apellido = $_POST['primer_apellido'];
            $this->persona->segundo_apellido = $_POST['segundo_apellido'];
            $this->persona->fecha_nacimiento = $_POST['fecha_nacimiento'];
            $this->persona->edad = $_POST['edad'];
            $this->persona->sexo = $_POST['sexo'];
            $this->persona->fk_profesion = $_POST['fk_profesion'];
            $this->persona->direccion = $_POST['direccion'];
            $this->persona->codigo_postal = $_POST['codigo_postal'];
            $this->persona->municipio = $_POST['municipio'];
            $this->persona->estado = $_POST['estado'];
            $this->persona->localidad = $_POST['localidad'];
            $this->persona->telefono = $_POST['telefono'];
    
            if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["foto_perfil"]["name"]);
                move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], $target_file);
                $this->persona->foto_perfil = $target_file;
            } else {
                $this->persona->foto_perfil = $_POST['foto_perfil_actual'];
            }
    
            if ($this->persona->update()) {
                header("Location: /ProyectoPersona/index.php?action=read");
            } else {
                echo "Error al actualizar la persona";
            }
        } else {
            $this->persona->id = $id;
            $persona = $this->persona->readOne($id);
            $view = 'views/personas/edit.php';
            include('views/layout.php');
        }
    }

    public function delete($id) {
        $this->persona->id = $id;
        if ($this->persona->delete()) {
            header("Location: /ProyectoPersona/index.php?action=read");
        } else {
            echo "Error al eliminar la persona";
        }
    }
}

$database = new Database();
$db = $database->getConnection();
$controller = new PersonaController($db);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'read':
        $personas = $controller->read();
        $view = 'views/personas/index.php';
        break;
    case 'readOne':
        $persona = $controller->readOne($id);
        $view = 'views/personas/show.php';
        break;
    case 'update':
        $view = 'views/personas/edit.php';
        break;
    case 'delete':
        $controller->delete($id);
        break;
    case 'getLocation':
        $controller->getLocation();
        break;
    default:
        $personas = $controller->read();
        $view = 'views/personas/index.php';
        break;
}

// include('views/layout.php');
?>
