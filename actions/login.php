<?php

require_once '../models/User.php';
require_once '../models/Session.php';
require_once '../connection/DbManager.php';

session_start();
$email = $_POST["email"];
$password = $_POST["password"];


$pdo = DbManager::Connect("ecommerce");

$stmt = $pdo->prepare("SELECT * FROM ecommerce.users WHERE email = :email AND password = :password LIMIT 1");
$stmt->bindParam(":email", $email);
$stmt->bindParam(":password", $password);
$stmt->execute();
$user = $stmt->fetchObject("User");

//5echo "Role ID: " . $user->GetRole_ID(); // Stampa il valore del role_id


if (!$user) {
    header('Location: /E-COMMERCE/views/login.php');
    exit;
} else {
    $_SESSION['current_user'] = $user;
    if ($_SESSION['current_user']->GetRole_ID() == "1") {
        $params = array('ip' => '127.0.0.1', 'data_login' => date('d/m/y H:i'), 'user_id' => $user->getId());
        $_SESSION['object_session'] = Session::Create($params);
        header('Location: /E-COMMERCE/views/products/index.php');
        exit;
    } else {
        $params = array('ip' => '127.0.0.1', 'data_login' => date('d/m/y H:i'), 'user_id' => $user->getId());
        $_SESSION['object_session'] = Session::Create($params);
        header('Location: /E-COMMERCE/views/admin/index_admin.php');
        exit;
    }
}


