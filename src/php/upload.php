<?php
session_start();
include "bdcon.php";

// Obtener datos del formulario
$titulo = $_POST["titulo"];
$user_id = $_SESSION["user_id"];
$calidad = $_POST["calidad"];
$duracion = $_POST["duracion"];
$autor = $_POST["autor"];
$fechaSalida = $_POST["fechaSalida"];
$resumen = $_POST["resumen"];

// SQL para insertar datos en la tabla peliculas
$sql = "INSERT INTO peliculas (titulo, user_id, calidad, duracion, autor, fechaSalida, resumen) VALUES ('$titulo', $user_id, '$calidad', '$duracion', '$autor', '$fechaSalida', '$resumen')";

if ($conn->query($sql) === TRUE) {
    header('Location: ../.');
    exit;   
} else {
    echo "Error al crear la película: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
exit;
?>