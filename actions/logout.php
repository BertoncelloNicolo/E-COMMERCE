<?php

require_once '../models/User.php';
require_once '../models/Session.php';


session_start();

$user = $_SESSION['current_user'];


if($user)
{
    $user_id = $user -> getId();
   
    try {
        $sessione = Session::FindByUser($user_id);
        $sessione->Delete();
        $_SESSION['current_user'] = null;
        header('location: ../views/login.php');
        exit;
    }catch (PDOException $e)
    {
        echo "errore durante logout";
    }
}
