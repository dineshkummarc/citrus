<?php
    
include_once '../config/database.php';
include_once '../objects/comment.php';

$database = new Database();
$db = $database->getConnection();

$comment = new Comment($db);

$statement = $comment->readUnapproved();
$num = $statement->rowcount();

if ($num > 0) {
    $comments = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $comments[] = [
            'id' => $row['ID'],
            'author' => $row['author'],
            'email' => $row['email'],
            'createdAt' => $row['createdAt'],
            'comment' => $row['comment']
        ];
    }

    echo json_encode($comments);
    return;
}

echo json_encode(['status' => 'No comments found.']);
?>
