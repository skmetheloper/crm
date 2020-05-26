<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/User.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$user = new User($db);

// Blog post query
$result = $user->read();
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
            'user_id' => $user_id,
            'email' => $email,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'visibility_group' => $visibility_group,
            'active_flag' => $active_flag,
            'permission_set' => $permission_set,
            'last_login' => $last_login
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
        array('message' => 'No user Found')
    );
}