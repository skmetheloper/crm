<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Product.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$product = new Product($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$product->name = $data->name;
$product->product_code = $data->product_code;
$product->category = $data->category;
$product->prices = $data->prices;
$product->active_flag = $data->active_flag;
$product->visible_to = $data->visible_to;
$product->unit = $data->unit;
$product->tax = $data->tax;

// Create new product
if ($product->create()) {
  echo json_encode(
    array('message' => 'Product Created')
  );
} else {
  echo json_encode(
    array('message' => 'Product Not Created')
  );
}