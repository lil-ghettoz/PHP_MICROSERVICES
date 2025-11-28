<?php
// Simple Client Gateway
header("Content-Type: application/json");

$userId = $_GET['user'] ?? 1;
$productId = $_GET['product'] ?? 1;

$userServiceUrl = "http://localhost:8001/users/" . $userId;
$productServiceUrl = "http://localhost:8002/products/" . $productId;

$user = file_get_contents($userServiceUrl);
$product = file_get_contents($productServiceUrl);

$response = [
    "user" => json_decode($user, true),
    "product" => json_decode($product, true)
];

echo json_encode($response);
?>