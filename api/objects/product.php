<?php

class Product
{
    const TABLE_NAME = "products";

    private $conn;

    // Object properties.
    public $id;
    public $name;
    public $description;
    public $img;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT * FROM " . self::TABLE_NAME;
        $statement = $this->conn->prepare($query);
        $statement->execute();

        return $statement;
    }
}
?>
