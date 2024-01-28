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



<head>
    <title>Prodotti</title>
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

        ul {
            list-style-type: none;
            padding: 0;
            margin-bottom: 10px;
        }

        li {
            margin-bottom: 5px;
        }

        form {
            background-color: #444;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        form:hover {
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



<a href="../../actions/logout.php">
    <button name="logout">Logout</button>
</a>

<a href="../carts/index.php">
    <button name="carrello">Vai al carrello</button>
</a>


</body>
</html>
