<?php
session_start();

require_once '../../models/User.php';

require_once '../../models/Product.php';

$products = Product::fetchAll();

foreach ($products as $product) { ?>
    <ul>
        <li><?php echo $product->getMarca() ?></li>
        <li><?php echo $product->getNome() ?></li>
        <li><?php echo $product->getPrezzo() ?></li>
    </ul>

    <form action="../../actions/add_to_cart.php" method="POST">
        <input type="number" name="quantita" placeholder="quantita" min="1">
        <input type="hidden" name="id" value="<?php echo $product->getId(); ?>">
        <input type="submit" value="Aggiungi al Carrello">
    </form>
<?php } ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodotti</title>
    <!-- Includi Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2e2e2e;
            color: #fff;
            padding: 20px;
        }

        .product-box {
            background-color: #444;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            margin: 10px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .product-box:hover {
            background-color: #555;
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

        a {
            text-decoration: none;
            color: #fff;
            margin-top: 10px;
        }

        button {
            background-color: #444;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<a href="../../actions/logout.php">
    <button class="btn btn-primary" name="logout">Logout</button>
</a>

<a href="../carts/index.php">
    <button class="btn btn-primary" name="carrello">Vai al carrello</button>
</a>





</body>
</html>
