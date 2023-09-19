<?php
session_start(); // Inicia la sesión

include 'bdcon.php';

// Recuperar datos del formulario
$email = $_POST["email"];
$passwd = $_POST["passwd"];

// SQL para buscar el usuario por email y contraseña
$sql = "SELECT id, admin FROM usuarios WHERE email='$email' AND passwd='$passwd'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario autenticado correctamente
    $row = $result->fetch_assoc();

    // Guarda la ID del usuario en la sesión
    $_SESSION['user_id'] = $row['id'];

    // Guarda la variable 'admin' en la sesión (puedes cambiar 'admin' por lo que necesites)
    $_SESSION['admin'] = $row['admin'];

    // Credenciales correctas
    echo "Inicio de sesión exitoso";
    // Cerrar la conexión
    $conn->close();
    exit;
    
} else {
    // Credenciales incorrectas
    echo "Inicio de sesión fallido";
    // Cerrar la conexión
    $conn->close(); 
}
?>
