<?php

require_once '../models/User.php';
require_once '../models/Session.php';


session_start();

$user = $_SESSION['current_user'];

if ($user) {
    try {
        session_destroy();
        $_SESSION["current_user"]=null;
        header('location: ../views/login.php');
        exit;
    } catch (PDOException $e) {
        echo "errore durante logout";
    }
}