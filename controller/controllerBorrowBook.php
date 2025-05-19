<?php
header("Content-Type: application/json");
require_once '../model/BooksDB.php';

$data = json_decode(file_get_contents("php://input"), true);
$date_start = date('Y-m-d');
$date_and = date('Y-m-d', strtotime('+1 month'));

if ($data) {
    $booksDB = new BooksDB();
    $result = $booksDB->borrowBook(
        $data['id_book'], $data['id_customer'],
        $date_start, $date_end
    );
    echo json_encode(["success" => $result]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid JSON or missing fields"]);
}
