<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

require_once('../controller/userController.php');

$controller = new UserController();
$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        echo json_encode($controller->getAll());
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if($controller->create($data['nom'], $data['email'])) {
            echo json_encode(["message" => "Utilisateur ajoute"]);
        } else {
            http_response_code(500);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if($controller->update($data['id'], $data['nom'], $data['email'])) {
            echo json_encode(["message" => "Utilisateur modifie"]);
        } else {
            http_response_code(500);
        }
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if($controller->delete($data['id'])) {
            echo json_encode(["message" => "Utilisateur supprime"]);
        } else {
            http_response_code(500);
        }
        break;
}
