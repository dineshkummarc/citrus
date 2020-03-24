<?php
    
include_once '../config/database.php';
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$statement = $product->read();
$num = $statement->rowcount();

if ($num > 0) {
    $products = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $products[] = [
            'id' => $row['ID'],
            'name' => $row['name'],
            'description' => $row['description'],
            'img' => $row['img']
        ];
    }

    echo json_encode($products);
}

return null;
