<?php
require_once 'config/database.php';
require_once 'controllers/PersonaController.php';


$database = new Database();
$db = $database->getConnection();

$controller = new PersonaController($db);

$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'create':
        $view = 'views/personas/create.php';
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
        header("Location: /ProyectoPersona/index.php?action=read");
        exit();
    case 'getLocation':
        $controller->getLocation();
        exit();       
    default:
        $personas = $controller->read();
        $view = 'views/personas/index.php';
        break;
   
}

include('views/layout.php');
?>
