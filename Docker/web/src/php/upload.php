<?php
session_start();
include "bdcon.php";

// Verificar el token CSRF
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    // Token CSRF válido, continúa con la verificación de reCAPTCHA y el proceso de inserción
    // Obtener datos del formulario
    $titulo = $_POST["titulo"];
    $user_id = $_SESSION["user_id"];
    $calidad = $_POST["calidad"];
    $duracion = $_POST["duracion"];
    $autor = $_POST["autor"];
    $fechaSalida = $_POST["fechaSalida"];
    $resumen = $_POST["resumen"];
    $recaptchaResponse = $_POST["g-recaptcha-response"];

    // Verificar el reCAPTCHA
    $recaptchaSecretKey = '6Lc-xQspAAAAAKrk-Fsj9tHjpiER300jq0NqvMD5'; // Reemplaza con tu clave secreta de reCAPTCHA
    $recaptchaScoreThreshold = 0.5; // Umbral de puntuación, ajusta según tus necesidades

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse");
    $responseKeys = json_decode($response, true);

    if ($responseKeys["success"] == true && $responseKeys["score"] >= $recaptchaScoreThreshold) {
        // El reCAPTCHA se ha completado correctamente, continúa con la inserción en la base de datos
        // SQL para insertar datos en la tabla peliculas
        $sql = "INSERT INTO peliculas (titulo, user_id, calidad, duracion, autor, fechaSalida, resumen) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Vincula las variables a los marcadores de posición
            $stmt->bind_param("siiisss", $titulo, $user_id, $calidad, $duracion, $autor, $fechaSalida, $resumen);

            // Ejecuta la consulta preparada
            if ($stmt->execute()) {
                echo "Subida con éxito";
            } else {
                echo "Error al crear la película: " . $stmt->error;
            }
        } else {
            echo "Error al preparar la consulta: " . $conn->error;
        }
    } else {
        // La verificación de reCAPTCHA falló
        echo "Error en la verificación del reCAPTCHA.";
    }
} else {
    // Token CSRF no válido, muestra un mensaje de error
    echo "Error en la verificación del token CSRF.";
}

// Cerrar la conexión
$conn->close();
exit;
?>
