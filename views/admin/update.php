<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
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

        input[type="submit"] {
            background-color: #ff00ff;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #ff33ff;
        }
    </style>
</head>
<body>

<h1>Update Product</h1>

<form action="Modifica.php" method="POST">
    <label for="id">ID del prodotto da aggiornare:</label>
    <input type="number" name="id" required>

    <label for="nome">Nuovo Nome:</label>
    <input type="text" name="nome">

    <label for="prezzo">Nuovo Prezzo:</label>
    <input type="number" name="prezzo" step="0.01">

    <input type="submit" value="Update">
</form>

</body>
</html>
