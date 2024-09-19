<?php
// Conexión a la base de datos
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos enviados desde el formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNac = $_POST["fechaNac"];
    $celular = $_POST["celular"];
    $user = $_POST["user"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
    $rol = $_POST["rol"];
    
    // Verificar si las contraseñas coinciden
    if ($password !== $confirmPassword) {
        echo "<script>alert('Las contraseñas no coinciden');</script>";
        exit();
    }

    // Verificar si el correo ya existe
    $checkEmailSql = "SELECT * FROM Usuario WHERE Email = '$email'";
    $result = $conn->query($checkEmailSql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Este correo ya está registrado');</script>";
    } else {
        // Inserta el nuevo usuario en la tabla Usuario
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO Usuario (Nombre, Apellido, FechaNac, Celular, Email, User, Pass) 
                VALUES ('$nombre', '$apellido', '$fechaNac', '$celular', '$email', '$user', '$password_hash')";

        if ($conn->query($sql) === TRUE) {
            $userId = $conn->insert_id;
            
            // Inserta en la tabla correspondiente según el rol
            if ($rol == 'cliente') {
                $sql_cliente = "INSERT INTO Cliente (CodCliente) VALUES ('$userId')";
                $conn->query($sql_cliente);
            } elseif ($rol == 'artesano') {
                $sql_artesano = "INSERT INTO Artesano (CodArtesano, Descripcion, AniosExp) VALUES ('$userId', '', 0)";
                $conn->query($sql_artesano);
            } elseif ($rol == 'delivery') {
                $sql_delivery = "INSERT INTO Delivery (CodDelivery, TipoVehiculo, Placa, ZonaCobertura, HoraIngreso, HoraSalida) 
                                 VALUES ('$userId', '', '', '', '00:00', '00:00')";
                $conn->query($sql_delivery);
            }

            echo "<script>alert('Registro exitoso');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Cerrar conexión
    $conn->close();
}
?>
