<?php
include 'bdcon.php';

// Recuperar datos del formulario
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$passwd = $_POST["passwd"];
$dni = $_POST["dni"];
$fechaNacimiento = $_POST["fecha_nacimiento"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];

// SQL para insertar datos en la tabla
$sql = "INSERT INTO usuarios (nombre, apellidos, passwd, dni, fechaN, email, telefono)
VALUES ('$nombre', '$apellidos', '$passwd', '$dni', '$fechaNacimiento', '$email', '$telefono')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.html"); // Redirigir al usuario a index.html
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
