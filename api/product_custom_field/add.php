<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/ProductCustomField.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$ProductCustomField = new ProductCustomField($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$ProductCustomField->name = $data->name;
$ProductCustomField->field_type = $data->field_type;
$ProductCustomField->detail_view = $data->detail_view;
$ProductCustomField->add_view = $data->add_view;
$ProductCustomField->visible_to = $data->visible_to;
$ProductCustomField->active_flag = $data->active_flag;

// Create new team
if ($ProductCustomField->create()) {
    echo json_encode(
        array('message' => 'Team Created')
    );
} else {
    echo json_encode(
        array('message' => 'Team Not Created')
    );
}