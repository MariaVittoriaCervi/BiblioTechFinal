<?php
header("Content-Type: application/json");
require_once '../model/BooksDB.php';

if (isset($_GET['id_book'])) {
    $booksDB = new BooksDB();
    echo json_encode($booksDB->getLocationsFromAuthor($_GET['id_author']));
} else {
    http_response_code(400);
    echo json_encode(["error" => "Missing id_book"]);
}
