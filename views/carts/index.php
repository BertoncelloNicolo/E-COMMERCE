<?php
require_once "../../models/Cart.php";
require_once "../../models/User.php";
require_once "../../models/Product.php";

session_start();


if (!isset($_SESSION['current_user'])) {
    exit(); // l'isset torna true se la condizione è verificata
}


$current_user = $_SESSION['current_user'];
$carrello = Cart::FindByUser($current_user->GetId());


if ($carrello) { //controllo se esiste il carrello
    $cart_products = $carrello->Find(); //assegno a cartproduct un array chiave valore , find va a trovare tutti i prodotti associati a quel carrello quello esistente 
    $products = []; //creo array vuoto
    foreach ($cart_products as $cp) {//itera su tutti i prodotti e assegna a array product la chiave che contiene la quantita associata al prodotto corrispondente all'id del prodotto
        $products[$cp->getQuantita()] = Product::Find($cp->getProductId());
    }
} else {

    exit();
}
?>

<html>
<head>
    <title>Carrello</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2e2e2e;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #fff;
        }


        li {
            margin-bottom: 10px;
        }

        form {
            ul {
                list-style-type: none;
                padding: 0;
            }

            background-color: #444;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            margin-top: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #666;
            border-radius: 4px;
            background-color: #333;
            color: #fff;
        }

        input[type="submit"] {
            background-color: #ff00ff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ff33ff;
        }

        p {
            margin-top: 20px;
        }
    </style>

</head>

<body>
<?php $totale = 0; ?>

<?php foreach ($products as $quantita => $product) { ?>
    <ul>
        <li><?php echo $product->getMarca(); ?></li>
        <li><?php echo $product->getNome(); ?></li>
        <li><?php echo $product->getPrezzo(); ?></li>
        <li><?php echo $quantita * $product->getPrezzo();
            $totale += $quantita * $product->getPrezzo(); ?></li>
    </ul>

    <form action="../../actions/edit_cart.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $carrello->getId(); ?>">
        <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>">
        <input type="number" name="quantita" placeholder="quantita" min="0" value="<?php echo $quantita ?>">
        <input type="submit" name="modifica" placeholder="modifica" value="modifica">

    </form>
<?php } ?>

<p>Totale carrello: <?php echo $totale; ?></p>

<button style="background-color: #ff00ff; color: #fff; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">
    <a href="../products/index.php" style="text-decoration: none; color: #fff;">Vai a Prodotti</a>
</button>

</body>
</html>
