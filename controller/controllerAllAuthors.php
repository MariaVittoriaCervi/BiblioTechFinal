<?php
header("Content-Type: application/json");
require_once 'BooksDB.php';

$booksDB = new BooksDB();
echo json_encode($booksDB->getAllAuthors());
?>