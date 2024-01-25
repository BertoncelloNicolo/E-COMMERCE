<?php

require_once "../models/Cart.php";
require_once "../models/Product.php";
require_once "../models/User.php";

session_start();

$quantita = $_POST['quantita'];

$user = $_SESSION['current_user'];
$carrello = Cart::FindByUser($user->GetId());


if ($quantita > 0) {
    $carrello->setQuantita($quantita);
    $carrello->save();
} else {

    $carrello->delete();
}

header('Location: ../views/carts/index.php');
exit;