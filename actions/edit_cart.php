<?php

require_once "../models/Cart.php";
require_once "../models/Product.php";
require_once "../models/User.php";
session_start();

$quantita = $_POST['quantita'];
$product_id = $_POST['product_id'];


$user = $_SESSION['current_user'];
$carrello = Cart::FindByUser($user->GetId());


if ($quantita > 0) {
    $esiste = $carrello->FindProductById($product_id);

    if ($esiste) {
        // se esiste quindi diventa true, aggiorna la quantità
        $esiste->setQuantita($quantita);
        $esiste->save();
    }
} else {
    // se la quantità è 0, elimina il record dalla tabella cart_products
    $carrello->DeleteProduct($product_id);
}

header('Location: ../views/carts/index.php');
exit;
?>