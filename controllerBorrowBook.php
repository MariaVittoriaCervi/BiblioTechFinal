<?php
header("Content-Type: application/json");
require_once 'BooksDB.php';

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $booksDB = new BooksDB();
    $result = $booksDB->borrowBook(
        $data['id_book'], $data['id_customer'],
        $data['date_start'], $data['date_end']
    );
    echo json_encode(["success" => $result]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid JSON or missing fields"]);
}
