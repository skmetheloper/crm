<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/ProductCustomField.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$ProductCustomField = new ProductCustomField($db);

// Blog post query
$result = $ProductCustomField->read();
// Get row count
$num = $result->rowCount();

// Check if any posts
if ($num > 0) {
    // Post array
    $arr = array();
    // $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $item = array(
            'id' => $id,
            'owner_visibility_name' => $owner_visibility_name,
            'description' => $description
        );

        // Push to "data"
        array_push($arr, $item);
        // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($arr);
} else {
    // No Posts
    echo json_encode(
        array('message' => 'No Teams Found')
    );
}