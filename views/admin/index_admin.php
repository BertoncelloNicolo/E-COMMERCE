<?php
session_start();

if (isset($_SESSION['current_user'])) {
    $current_user = $_SESSION['current_user'];
}
else
{
    header("HTTP/1.1 401 Unauthorized");
    exit("Utente senza privilegi: Shopper");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azioni utente privilegiato</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2e2e2e;
            color: #fff;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        button {
            background-color: #ff00ff;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            margin: 5px;
        }

        button:hover {
            background-color: #ff33ff;
        }
    </style>
</head>
<body>

<h1>Operazioni</h1>

<form action="../admin/create.php" method="POST">
    <button type="submit">Crea prodotto</button>
</form>

<form action="../admin/update.php" method="POST">
    <button type="submit">Modifica prodotto</button>
</form>

<form action="../admin/elimina.php" method="POST">
    <button type="submit">Elimina prodotto</button>
</form>
<form action="../../actions/logout.php" method="POST">
    <button type="submit">Effettua logout</button>
</form>

</body>
</html>