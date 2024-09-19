<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Inicio Munayart</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        .password-container {
            position: relative;
            width: 100%;
        }
        .password-container input {
            width: calc(100% - 40px); /* Ajusta el espacio para el botón */
        }
        .password-container button {
            position: absolute;
            color: black;
            right: 0;
            top: -2px;
            width: 40px;
            height: 69.5%;
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

    <div class="container" id="container">
        <!-- Formulario de Registro -->
        <div class="form-container sign-up">
            <form action="../php/register.php" method="POST">
                <h1>Crear Cuenta</h1>
                <div class="input-group">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <input type="text" name="apellido" placeholder="Apellido" required>
                </div>
                <input type="date" name="fechaNac" placeholder="Fecha de Nacimiento" required>
                <input type="tel" name="celular" placeholder="Número de Celular" required>
                <input type="text" name="user" placeholder="Usuario" required>
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                
                <!-- Contraseña con botón de visibilidad -->
                <div class="password-container">
                    <input type="password" name="password" id="register-password" placeholder="Contraseña" required>
                    <button type="button" id="toggle-password">
                        <i class="fa-regular fa-eye" id="password-icon"></i>
                    </button>
                </div>
                
                <div class="password-container">
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirmar Contraseña" required>
                    <button type="button" id="toggle-confirm-password">
                        <i class="fa-regular fa-eye" id="confirm-password-icon"></i>
                    </button>
                </div>
                <label for="rol">Rol:</label>
                <select name="rol" required>
                    <option value="cliente">Cliente</option>
                    <option value="artesano">Artesano</option>
                    <option value="delivery">Delivery</option>
                </select><br>
                <button type="submit">Registrarse</button>
            </form>
        </div>

        <!-- Formulario de Inicio de Sesión -->
        <div class="form-container sign-in">
            <form action="../php/login.php" method="POST">
                <h1>Iniciar Sesión</h1>
                <input type="text" name="user" placeholder="Usuario" required>
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                
                <!-- Contraseña con botón de visibilidad -->
                <div class="password-container">
                    <input type="password" name="password" id="login-password" placeholder="Contraseña" required>
                    <button type="button" id="toggle-login-password">
                        <i class="fa-regular fa-eye" id="login-password-icon"></i>
                    </button>
                </div>
                <label for="rol">Rol:</label>
                <select name="rol" required>
                    <option value="cliente">Cliente</option>
                    <option value="artesano">Artesano</option>
                    <option value="delivery">Delivery</option>
                </select><br>
                <div class="g-recaptcha" data-sitekey="6Lflbz8qAAAAAGSLYjCqAx0pDCjwgR4J-aWRkb5z"></div>
                <a href="../views/forgot_password.php">¿Olvidaste tu contraseña?</a>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>

        <!-- Contenedor de Toggle -->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>¡Bienvenido de nuevo a MUNAYART!</h1>
                    <p>Ingresa tus datos personales para acceder a todas las funciones del sitio</p>
                    <button class="hidden" id="login">Iniciar Sesión</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>¡Hola!</h1>
                    <p>Regístrate con tus datos personales para acceder a todas las funciones del sitio</p>
                    <button class="hidden" id="register">Registrarse</button>
                </div>
            </div>
        </div>

    </div>

    <script src="script.js"></script>
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
            togglePasswordVisibility('register-password', 'password-icon');
        });

        document.getElementById('toggle-confirm-password').addEventListener('click', () => {
            togglePasswordVisibility('confirm-password', 'confirm-password-icon');
        });

        document.getElementById('toggle-login-password').addEventListener('click', () => {
            togglePasswordVisibility('login-password', 'login-password-icon');
        });
    </script>
</body>
</html>
