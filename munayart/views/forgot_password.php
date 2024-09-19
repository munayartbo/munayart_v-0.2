<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1 align="center">Recuperar Contraseña</h1>
        <form action="../php/send_reset_link.php" method="POST">
            <label for="email">Introduce tu correo electrónico para enviar el enlace</label>
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <button type="submit">Enviar enlace de restablecimiento</button>
        </form>
    </div>
</body>
</html>