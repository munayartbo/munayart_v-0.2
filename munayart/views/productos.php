<?php include '../php/db_connection.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munayart - Productos</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #1D3354;
            color: #ffffff;
            padding: 50px 100px;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        section {
            padding: 30px;
        }
        .product {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 15px;
            transition: transform 0.3s;
        }
        .product:hover {
            transform: scale(1.02);
        }
        .product h3 {
            margin: 0 0 10px 0;
            font-size: 1.2em;
        }
        .product p {
            margin: 5px 0;
        }
        footer {
            background-color: #1D3354;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Productos</h1>
    </header>
    <section>
        <h1>Productos</h1>
    </section>
    <section>
        <?php
        $sql = "SELECT * FROM producto";
        $result = $conn->query($sql);
       
        if ($result->num_rows > 0) {
            echo "<h2>PRODUCTO</h2>";
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<h3>" . htmlspecialchars($row['Nombre']) . "</h3>";
                echo "<p>Tipo: " . htmlspecialchars($row['Tipo']) . "</p>";
                echo "<p>Precio: " . htmlspecialchars($row['Precio']) . " Bs</p>";
                echo "<p>Material: " . htmlspecialchars($row['Material']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay productos disponibles.</p>";
        }

        $conn->close();
        ?>
    </section>
    <footer>
        <p>Munayart - © 2024</p>
    </footer>
</body>
</html>
