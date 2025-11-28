<?php
// Simple User Service
header("Content-Type: application/json");

$users = [
    1 => ["id" => 1, "name" => "Alice", "email" => "alice@example.com"],
    2 => ["id" => 2, "name" => "Bob", "email" => "bob@example.com"],
    3 => ["id" => 3, "name" => "Mark", "email" => "mark@example.com"]
];

$request = $_SERVER['REQUEST_METHOD'];
$uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));

if ($request === "POST" && $uri[0] === "users") {
    $input = json_decode(file_get_contents("php://input"), true);
    $id = count($users) + 1;
    $users[$id] = ["id" => $id, "name" => $input["name"], "email" => $input["email"]];
    echo json_encode($users[$id]);
} elseif ($request === "GET" && $uri[0] === "users" && isset($uri[1])) {
    $id = (int)$uri[1];
    if (isset($users[$id])) {
        echo json_encode($users[$id]);
    } else {
        http_response_code(404);
        echo json_encode(["error" => "User not found"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid request"]);
}
?>