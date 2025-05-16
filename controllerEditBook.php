<?php
header("Content-Type: application/json");
require_once 'BooksDB.php';

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $booksDB = new BooksDB();
    $result = $booksDB->editBook(
        $data['title'], $data['original_language'], $data['genre'],
        $data['plot'], $data['comment'], $data['cover'],
        $data['id_author'], $data['id_book']
    );
    echo json_encode($result);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid JSON or missing fields"]);
}
