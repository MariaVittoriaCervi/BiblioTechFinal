<?php
session_start();
require_once("../model/BooksDB.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $name = $_POST['name'] ?? '';
    $db = new BooksDB();
    $flag = $db->getCustomer($name, $email); //la funzione restituisce un boolean, true se l'utente esiste
    if ($flag) {
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        header("Location: ../index.php");

        exit();
    } else {
        $_SESSION['error'] = "Invalid email or name.";
        header("Location: ../view/login.php");
        exit();
    }
}