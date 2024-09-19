<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .password-container {
            position: relative;
            width: 45%;
        }
        .password-container input {
            width: calc(100% - 40px); /* Ajusta el espacio para el botón */
        }
        .password-container button {
            position: absolute;
            color: black;
            right: 0;
            top: 17px;
            width: 40.5px;
            height: 50%;
            background: #eee;
            border: none;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 align="center">Restablecer Contraseña</h1>
        <form action="../php/reset_password_process.php" method="POST">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">

            <!-- Contraseña con botón de visibilidad -->
            <div class="password-container">
                <label for="new_password">Nueva Contraseña</label>
                <input type="password" id="new_password" name="new_password" placeholder="Nueva Contraseña" required>
                <button type="button" id="toggle-password">
                    <i class="fa-regular fa-eye" id="password-icon"></i>
                </button>
            </div>

            <div class="password-container">
                <label for="confirm_password">Confirmar Contraseña</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmar Contraseña" required>
                <button type="button" id="toggle-confirm-password">
                    <i class="fa-regular fa-eye" id="confirm-password-icon"></i>
                </button>
            </div>

            <button type="submit">Restablecer Contraseña</button>
        </form>
    </div>

    <script>
        // Función para alternar visibilidad de contraseña
        function togglePasswordVisibility(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const passwordIcon = document.getElementById(iconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }

        document.getElementById('toggle-password').addEventListener('click', () => {
            togglePasswordVisibility('new_password', 'password-icon');
        });

        document.getElementById('toggle-confirm-password').addEventListener('click', () => {
            togglePasswordVisibility('confirm_password', 'confirm-password-icon');
        });
    </script>
</body>
</html>
