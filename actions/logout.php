<?php
require_once '../models/User.php';
require_once '../models/Session.php';
require_once '../connection/DbManager.php';

session_start();

$user = $_SESSION['current_user'];
if ($user) {
    try {
        $user_id = $_SESSION['current_user']->getId();
        $logout = date('Y-m-d H:i:s');

        $pdo = DbManager::Connect("ecommerce");
        $stmt = $pdo->prepare("UPDATE sessions SET data_logout = :logout_date WHERE user_id = :user_id AND data_logout IS NULL");
        $stmt->bindParam(":logout_date", $logout);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();

        session_destroy();
        $_SESSION["current_user"] = null;


        header('location: ../views/login.php');
        exit;
    } catch (PDOException $e) {
        echo "Errore durante il logout";
    }
} else {
    header('location: ../views/login.php');
    exit;
}




