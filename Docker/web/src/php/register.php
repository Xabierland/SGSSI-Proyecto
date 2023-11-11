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
$recaptchaResponse = $_POST["g-recaptcha-response"]; // Captura la respuesta de reCAPTCHA

// Verificar el reCAPTCHA
$recaptchaSecretKey = '6Lc-xQspAAAAAKrk-Fsj9tHjpiER300jq0NqvMD5'; // Reemplaza con tu clave secreta de reCAPTCHA
$recaptchaScoreThreshold = 0.5; // Umbral de puntuación, ajusta según tus necesidades

$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse");
$responseKeys = json_decode($response, true);

if ($responseKeys["success"] == true && $responseKeys["score"] >= $recaptchaScoreThreshold) {
    // El reCAPTCHA se ha completado correctamente, continúa con el registro
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
} else {
    // El reCAPTCHA no se ha completado correctamente, muestra un mensaje de error
    echo "Error en la verificación de reCAPTCHA.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
