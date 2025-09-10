<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre   = $conn->real_escape_string($_POST['nombre']);
    $email    = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol      = $conn->real_escape_string($_POST['rol']);

    $check = "SELECT * FROM usuarios WHERE email='$email' LIMIT 1";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "<script>alert('⚠️ El correo ya está registrado'); window.history.back();</script>";
    } else {
        $sql = "INSERT INTO usuarios (nombre, email, password, rol) 
                VALUES ('$nombre', '$email', '$password', '$rol')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['usuario'] = $nombre;
            $_SESSION['rol']     = $rol;
            $_SESSION['registro_exitoso'] = true; // 👈 bandera de bienvenida

            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('❌ Error al registrar: " . $conn->error . "'); window.history.back();</script>";
        }
    }
}
?>



