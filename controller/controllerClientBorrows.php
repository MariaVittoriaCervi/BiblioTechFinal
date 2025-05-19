<?php
session_start();
header("Content-Type: application/json");
require_once '../model/BooksDB.php';

if (isset($_SESSION['id'])) {
    $booksDB = new BooksDB();
    echo json_encode($booksDB->getCustomerBorrows($_SESSION['id']));
} else {
    http_response_code(400);
    echo json_encode(["error" => "You have to be logged in to see your borrows"]);
}
?>