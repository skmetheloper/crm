<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Team.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$team = new Team($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$team->team_name = $data->team_name;
$team->team_manager = $data->team_manager;
$team->team_description = $data->team_description;
$team->team_members = $data->team_members;

// Create new team
if ($team->create()) {
    echo json_encode(
        array('message' => 'Team Created')
    );
} else {
    echo json_encode(
        array('message' => 'Team Not Created')
    );
}