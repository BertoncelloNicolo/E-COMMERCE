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
        $esiste->setQuantita($quantita); // cerco il prodotto all'interno del carrello e se esiste
        $esiste->save(); //richiamo il metodo save che andrà a modificare la quantita di quel determinato prodotto in quel determinato carrello
    }
} else {
    $carrello->DeleteProduct($product_id); // se la quantità è 0, elimina il record dalla tabella cart_products
}

header('Location: ../views/carts/index.php');
exit;
?>
