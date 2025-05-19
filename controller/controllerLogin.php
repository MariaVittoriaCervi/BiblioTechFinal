<?php
session_start();
require_once("../model/BooksDB.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $name = $_POST['name'] ?? '';
    $db = new BooksDB();
    $info = $db->getCustomer($name, $email); //la funzione restituisce un boolean, true se l'utente esiste e l'id dell'utente
    $flag = $info['status'];
    if ($flag) {
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $info['id'];
        file_put_contents('log.txt', print_r($_SESSION['id']), FILE_APPEND);
        header("Location: ../index.php");

        exit();
    } else {
        $_SESSION['error'] = "Invalid email or name.";
        header("Location: ../view/login.php");
        exit();
    }
}