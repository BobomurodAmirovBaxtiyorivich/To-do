<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$todos = new App\ToDo();
$method = $_SERVER['REQUEST_METHOD'];
$requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$id = isset($requestUri[2]) ? (int)$requestUri[2] : null;

switch ($method) {
    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['title'], $input['due_date'], $input['user_id'])) {
            $result = $todos->store($input['title'], $input['due_date'], intval($input['user_id']));
            echo json_encode(['status' => $result]);
        } else {
            echo json_encode(['error' => 'Invalid input']);
        }
        break;
    case 'GET':
        if ($id) {
            $result = $todos->edit($id);
        } else {
            $result = $todos->getTodosWithoutU();
        }
        echo json_encode($result);
        break;
    case 'PUT':
        if ($id) {
            $input = json_decode(file_get_contents('php://input'), true);
            if (isset($input['title'], $input['status'], $input['due_date'])) {
                $result = $todos->update($id, $input['title'], $input['status'], $input['due_date']);
                echo json_encode(['success' => $result]);
            } else {
                echo json_encode(['error' => 'Invalid input']);
            }
        } else {
            echo json_encode(['error' => 'ID is required']);
        }
        break;
    case 'DELETE':
        if ($id) {
            $result = $todos->delete($id);
            echo json_encode(['success' => $result]);
        } else {
            echo json_encode(['error' => 'ID is required']);
        }
        break;

    default:
        echo json_encode(['error' => 'Invalid request method']);
        break;
}
