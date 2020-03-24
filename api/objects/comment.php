<?php

class Comment
{
    const TABLE_NAME = "comments";

    private $conn;

    // Object properties.
    public $id;
    public $author;
    public $comment;
    public $createdAt;
    public $isApproved;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT * FROM " . self::TABLE_NAME;
        $statement = $this->conn->prepare($query);
        $statement->execute();

        return $statement;
    }

    function readApproved() {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE isApproved = 1";
        $statement = $this->conn->prepare($query);
        $statement->execute();

        return $statement;
    }

    function readUnapproved() {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE isApproved = 0";
        $statement = $this->conn->prepare($query);
        $statement->execute();

        return $statement;
    }

    function create() {
        $query = "INSERT INTO " . self::TABLE_NAME
                . " SET "
                . " author=:author,
                    comment=:comment,
                    email=:email";

        $statement = $this->conn->prepare($query);

        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->comment = htmlspecialchars(strip_tags($this->comment));
        $this->email = htmlspecialchars(strip_tags($this->email));

        $statement->bindParam(":author", $this->author);
        $statement->bindParam(":comment", $this->comment);
        $statement->bindParam(":email", $this->email);

        if ($statement->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    function approve() {
        $query = "UPDATE " . self::TABLE_NAME
                . " SET isApproved = 1"
                . " WHERE id = " . $this->id;

        $statement = $this->conn->prepare($query);

        return $statement->execute();
    }
}
?>
