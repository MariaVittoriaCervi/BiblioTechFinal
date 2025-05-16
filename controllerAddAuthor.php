<?php
header("Content-Type: application/json");
require_once 'BooksDB.php';

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $booksDB = new BooksDB();
    $result = $booksDB->addAuthor(
        $data['name'], $data['nationality'], $data['sex'], $data['picture']
    );
    echo json_encode(["success" => $result]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid JSON or missing fields"]);
}
