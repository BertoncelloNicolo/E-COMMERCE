<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elimina Prodotto</title>
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

        label {
            display: block;
            margin: 10px 0;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #666;
            border-radius: 4px;
            background-color: #333;
            color: #fff;
            margin-bottom: 10px;
        }

        button {
            background-color: #ff00ff;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background-color: #ff33ff;
        }
    </style>
</head>
<body>

<h1>Elimina Prodotto</h1>

<form action="../admin/Eliminazione.php" method="POST">
    <label for="id">ID del prodotto da eliminare:</label>
    <input type="number" name="id" required>

    <button type="submit">Elimina prodotto</button>
</form>

</body>
</html>
