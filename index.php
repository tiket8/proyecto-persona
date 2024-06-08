<?php
require_once 'config/database.php';
require_once 'controllers/PersonaController.php';
require_once 'controllers/ProfesionController.php'; 

$database = new Database();
$db = $database->getConnection();

$personaController = new PersonaController($db);
$profesionController = new ProfesionController($db); 

$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    // Acciones relacionadas con profesiones
    case 'createProfesion':
        $view = 'views/profesion/create.php';
        break;
    case 'readProfesion':
        $profesiones = $profesionController->read();
        $view = 'views/profesion/index.php';
        break;
    case 'deleteProfesion':
        $profesionController->softDelete($id);
        header("Location: /ProyectoPersona/index.php?action=readProfesion");
        exit();
    case 'saveProfesion':
        $data = [
            'profesion' => $_POST['profesion'],
            'hora' => $_POST['hora'],
            'fecha' => $_POST['fecha']
        ];
        $profesionController->create($data);
        header("Location: /ProyectoPersona/index.php?action=readProfesion");
        exit();
        
    // Acciones relacionadas con personas
    case 'create':
        $view = 'views/personas/create.php';
        break;
    case 'read':
        $personas = $personaController->read();
        $view = 'views/personas/index.php';
        break;
    case 'readOne':
        $persona = $personaController->readOne($id);
        $view = 'views/personas/show.php';
        break;
    case 'update':
        $view = 'views/personas/edit.php';
        break;
    case 'delete':
        $personaController->delete($id);
        header("Location: /ProyectoPersona/index.php?action=read");
        exit();
    case 'getLocation':
        $personaController->getLocation();
        exit();

    default:
        $personas = $personaController->read();
        $view = 'views/personas/index.php';
        break;
}

include 'views/layout.php';
?>
