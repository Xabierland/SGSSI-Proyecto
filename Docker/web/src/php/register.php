<?php
session_start();
include 'bdcon.php';

// Recuperar datos del formulario
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$passwd = $_POST["passwd"];
$dni = $_POST["dni"];
$fechaNacimiento = $_POST["fecha_nacimiento"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];

// Hashear la contraseña
$options = ['cost' => 12];
$hashedPassword = password_hash($passwd, PASSWORD_BCRYPT, $options);

// SQL seguro utilizando consultas preparadas
$sql = "INSERT INTO usuarios (nombre, apellidos, passwd, dni, fechaN, email, telefono) VALUES (?, ?, ?, ?, ?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    // Vincula las variables a los marcadores de posición
    $stmt->bind_param("sssssss", $nombre, $apellidos, $hashedPassword, $dni, $fechaNacimiento, $email, $telefono);

    // Ejecuta la consulta preparada
    if ($stmt->execute()) {
        echo "Registrado con éxito";
    } else {
        echo "Error al ejecutar la consulta: " . $stmt->error;
    }

} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>
