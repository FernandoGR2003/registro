<?php

include '../dataAccess/conexion/Conexion.php';
include '../dataAccess/dataAccessLogic/Notas.php';

function sendResponse($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

function sendError($message) {
    header('Content-Type: application/json');
    echo json_encode(array('success' => false, 'message' => $message));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['action']) && $data['action'] == 'create') {
        $objConexion = new ConexionDB();
        $objNotas = new Notas($objConexion);

        $nombre_estudiante = $data['nombre_estudiante'];
        $nota_materia_1 = $data['nota_materia_1'];
        $nota_materia_2 = $data['nota_materia_2'];
        $nota_materia_3 = $data['nota_materia_3'];
        $nota_materia_4 = $data['nota_materia_4'];
        $nota_materia_5 = $data['nota_materia_5'];

        if (empty($nombre_estudiante) || empty($nota_materia_1) || empty($nota_materia_2) || empty($nota_materia_3) || empty($nota_materia_4) || empty($nota_materia_5)) {
            sendError('Por favor, complete todos los campos obligatorios.');
        }

        $objNotas->setNombreEstudiante($nombre_estudiante);
        $objNotas->setNotaMateria1($nota_materia_1);
        $objNotas->setNotaMateria2($nota_materia_2);
        $objNotas->setNotaMateria3($nota_materia_3);
        $objNotas->setNotaMateria4($nota_materia_4);
        $objNotas->setNotaMateria5($nota_materia_5);

        $success = $objNotas->addNota();
        sendResponse(array('success' => $success, 'message' => $success ? 'Nota añadida correctamente' : 'Error al añadir nota'));
    }

    sendError('Acción no válida.');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $objConexion = new ConexionDB();
    $objNotas = new Notas($objConexion);

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $nota = $objNotas->readNotaById($id);
        sendResponse($nota);
    }

    $array = $objNotas->readNotas();
    sendResponse($array);
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id <= 0) {
        sendError('ID no válido.');
    }

    $objConexion = new ConexionDB();
    $objNotas = new Notas($objConexion);
    $objNotas->setId($id);
    $success = $objNotas->deleteNota();
    sendResponse(array('success' => $success, 'message' => $success ? 'Nota eliminada correctamente' : 'Error al eliminar nota'));
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['action']) && $data['action'] == 'update') {
        $id = isset($data['id']) ? intval($data['id']) : 0;

        if ($id <= 0) {
            sendError('ID no válido.');
        }

        $nombre_estudiante = $data['nombre_estudiante'];
        $nota_materia_1 = $data['nota_materia_1'];
        $nota_materia_2 = $data['nota_materia_2'];
        $nota_materia_3 = $data['nota_materia_3'];
        $nota_materia_4 = $data['nota_materia_4'];
        $nota_materia_5 = $data['nota_materia_5'];

        if (empty($nombre_estudiante) || empty($nota_materia_1) || empty($nota_materia_2) || empty($nota_materia_3) || empty($nota_materia_4) || empty($nota_materia_5)) {
            sendError('Por favor, complete todos los campos obligatorios.');
        }

        $objConexion = new ConexionDB();
        $objNotas = new Notas($objConexion);
        $objNotas->setId($id);
        $objNotas->setNombreEstudiante($nombre_estudiante);
        $objNotas->setNotaMateria1($nota_materia_1);
        $objNotas->setNotaMateria2($nota_materia_2);
        $objNotas->setNotaMateria3($nota_materia_3);
        $objNotas->setNotaMateria4($nota_materia_4);
        $objNotas->setNotaMateria5($nota_materia_5);

        $success = $objNotas->updateNota();
        sendResponse(array('success' => $success, 'message' => $success ? 'Nota actualizada correctamente' : 'Error al actualizar nota'));
    }

    sendError('Acción no válida.');
}

sendError('Método HTTP no permitido.');
?>
