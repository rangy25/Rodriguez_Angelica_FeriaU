<?php
// create_user.php - ejecutar una sola vez desde el navegador
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexion.php'; // tu archivo de conexión que define $conn

$nombre = 'Test Usuario';
$email  = 'test@local';
$password = password_hash('Test1234', PASSWORD_DEFAULT); // contraseña de prueba
$rol = 'delegado';

$stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssss', $nombre, $email, $password, $rol);
if ($stmt->execute()) {
    echo "Usuario creado: $email / contraseña: Test1234";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
