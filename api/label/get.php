<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Label.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$label = new Label($db);

// Blog post query
$result = $label->read();
// Get row count
$num = $result->rowCount();

// Check if any posts
if ($num > 0) {
    // Post array
    $label_arr = array();
    // $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $label_item = array(
            'label_id' => $label_id,
            'label_name' => $label_name,
        );

        // Push to "data"
        array_push($label_arr, $label_item);
        // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($label_arr);
} else {
    // No Posts
    echo json_encode(
        array('message' => 'No Labels Found')
    );
}