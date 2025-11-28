<?php
// Simple Product Service
header("Content-Type: application/json");

$products = [
    1 => ["id" => 1, "name" => "Laptop", "price" => 50000],
    2 => ["id" => 2, "name" => "Phone", "price" => 25000]
];

$request = $_SERVER['REQUEST_METHOD'];
$uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));

if ($request === "GET" && $uri[0] === "products" && !isset($uri[1])) {
    echo json_encode(array_values($products));
} elseif ($request === "GET" && $uri[0] === "products" && isset($uri[1])) {
    $id = (int)$uri[1];
    if (isset($products[$id])) {
        echo json_encode($products[$id]);
    } else {
        http_response_code(404);
        echo json_encode(["error" => "Product not found"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid request"]);
}
?>