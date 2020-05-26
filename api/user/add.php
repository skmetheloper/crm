<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/User.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$user = new User($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$user->email = $data->email;
$user->first_name = $data->first_name;
$user->last_name = $data->last_name;
$user->visibility_group = $data->visibility_group;
$user->active_flag = $data->active_flag;
$user->permission_set = $data->permission_set;
$user->last_login = $data->last_login;

// Create new team
if ($user->create()) {
    echo json_encode(
        array('message' => 'User Created')
    );
} else {
    echo json_encode(
        array('message' => 'User Not Created')
    );
}