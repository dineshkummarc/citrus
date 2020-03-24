<?php

include_once '../config/database.php';
include_once '../objects/comment.php';

$database = new Database();
$db = $database->getConnection();

$comment = new Comment($db);

$comment->id = $_POST['id'];

$comment->approve();
?>
