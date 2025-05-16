<?php
header("Content-Type: application/json");
require_once 'BooksDB.php';

if (isset($_GET['id_book'])) {
    $booksDB = new BooksDB();
    echo json_encode($booksDB->getOneBook($_GET['id_book']));
} else {
    http_response_code(400);
    echo json_encode(["error" => "Missing id_book"]);
}
?>