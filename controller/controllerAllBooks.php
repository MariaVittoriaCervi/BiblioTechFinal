<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once 'BooksDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $booksDB = new BooksDB();
    echo json_encode($booksDB->getAllBooks());
}
?>
