<?php
session_start();
include 'conexion.php'; // Asegúrate que aquí se conecta bien a tu BD

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email='$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verificar la contraseña encriptada
        if (password_verify($password, $usuario['password'])) {
            // Guardamos datos en la sesión
            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['rol']     = $usuario['rol']; // 👈 ahora guarda el rol también

            // Redirigir al home
            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('❌ Contraseña incorrecta'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('❌ Usuario no encontrado'); window.history.back();</script>";
    }
}
?>

