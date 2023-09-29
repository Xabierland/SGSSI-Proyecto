<?php
include 'bdcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_pelicula"])) {
    // Obtener el ID de la película a eliminar
    $id_pelicula = $_POST["id_pelicula"];

    // Consulta SQL para eliminar la película por su ID
    $sql = "DELETE FROM peliculas WHERE id = $id_pelicula";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar de vuelta a la página principal u otra página de tu elección
        header('Location: ../.');
        exit;
    } else {
        echo "Error al eliminar la película: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
