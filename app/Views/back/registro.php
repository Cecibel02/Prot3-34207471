<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$database = "aguirret_cecilia";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = $_POST['password'];
$perfil_id = 2; // Perfil de cliente por defecto

// Preparar consulta SQL
$sql = "INSERT INTO usuarios (nombre, apellido, usuario, email, pass, perfil_id, baja) VALUES (?, ?, ?, ?, ?, ?, 0)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $nombre, $apellido, $usuario, $email, $password, $perfil_id);

// Ejecutar consulta
if ($stmt->execute()) {
    // Registro exitoso
    echo "<div class='container my-5 text-center'>";
    echo "<div class='alert alert-success' role='alert'>";
    echo "Registro de paciente exitoso.";
    echo "</div>";
    echo "<div class='alert alert-success' role='alert'>";
    echo "Inicio de sesión correcto.";
    echo "</div>";
    echo "</div>";
} else {
    // Error en el registro
    echo "<div class='container my-5 text-center'>";
    echo "<div class='alert alert-danger' role='alert'>";
    echo "Error al registrar el paciente: " . $stmt->error;
    echo "</div>";
    echo "</div>";
}

// Cerrar conexión
$stmt->close();
$conn->close();

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Aquí puedes agregar la lógica para guardar los datos en una base de datos o realizar cualquier otra acción necesaria

    // Muestra un mensaje de éxito
    echo "<div class='container my-5 text-center'>";
    echo "<div class='alert alert-success' role='alert'>";
    echo "¡Registro exitoso! Bienvenido, " . $name . " " . $lastname . ".";
    echo "</div>";
    echo "</div>";
}
?>