<?php
    
include_once '../config/database.php';
include_once '../objects/comment.php';

$database = new Database();
$db = $database->getConnection();

$comment = new Comment($db);

$comment->author = $_POST['author'];
$comment->email = $_POST['email'];
$comment->comment = $_POST['comment'];

return $comment->create();

/* If we wanted to return some response: */ 
/* if ($comment->create()) {
/*     $response = [
/*         'success' => true,
/*         'message' => 'Comment added successfully!'
/*        // 'id' => $comment->id, ...
/*     ];
/* } else {
/*    $response = [
/*        'success' => false,
/*        'message' => 'An error during comment addition occured!'
/*    ];
/* }
/* print_r(json_encode($response)); */
?>
