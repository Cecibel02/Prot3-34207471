<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$database = "aguirret_cecilia";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar la contraseña (en un escenario real, se utilizaría hash de contraseñas)
        if ($password == $row["password"]) {
            // Iniciar sesión del usuario
            $_SESSION["username"] = $username;
            $_SESSION["logged_in"] = true;

            // Redirigir al usuario a la página de bienvenida
            header("Location: welcome.php");
            exit();
        } else {
            // Mostrar mensaje de error
            $error_message = "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        // Mostrar mensaje de error
        $error_message = "Nombre de usuario o contraseña incorrectos.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<!-- Código HTML de la página de inicio de sesión EN CONSTRUCCION -->