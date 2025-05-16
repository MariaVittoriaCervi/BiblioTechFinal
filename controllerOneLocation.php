<?php
header("Content-Type: application/json");
require_once 'BooksDB.php';

if (isset($_GET['id_location'])) {
    $booksDB = new BooksDB();
    echo json_encode($booksDB->getOneLocation($_GET['id_location']));
} else {
    http_response_code(400);
    echo json_encode(["error" => "Missing id_location"]);
}
