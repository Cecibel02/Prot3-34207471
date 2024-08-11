<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "aguirret_cecilia";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$perfil_id = $_POST['perfil_id'];

// Preparar y ejecutar la consulta SQL
$sql = "INSERT INTO usuarios (nombre, apellido, usuario, email, pass, perfil_id, baja) VALUES (?, ?, ?, ?, ?, ?, 0)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $nombre, $apellido, $usuario, $email, $pass, $perfil_id);

if ($stmt->execute()) {
  echo json_encode(array(
    'id_usuario' => $conn->insert_id,
    'nombre' => $nombre,
    'apellido' => $apellido,
    'usuario' => $usuario,
    'email' => $email,
    'perfil_id' => $perfil_id
  ));
} else {
  echo json_encode(array('error' => 'Error al registrar el usuario.'));
}

$stmt->close();
$conn->close();
?>
