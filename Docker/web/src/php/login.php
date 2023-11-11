<?php
session_start(); // Inicia la sesión

include 'bdcon.php';

// Recuperar datos del formulario
$email = $_POST["email"];
$passwd = $_POST["passwd"];
$recaptchaResponse = $_POST["g-recaptcha-response"];

// Verifica el reCAPTCHA v3
$recaptchaSecretKey = '6Lc-xQspAAAAAKrk-Fsj9tHjpiER300jq0NqvMD5'; // Reemplaza con tu clave secreta de reCAPTCHA v3
$recaptchaScoreThreshold = 0.5; // Umbral de puntuación, ajusta según tus necesidades

// Verifica el reCAPTCHA v3
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse");
$responseKeys = json_decode($response, true);

if ($responseKeys["success"] == true && $responseKeys["score"] >= $recaptchaScoreThreshold) {
    // El reCAPTCHA v3 se ha completado correctamente
    // Procesa el formulario

    // SQL para buscar el usuario por email
    $sql = "SELECT id, admin, passwd FROM usuarios WHERE email='$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedHash = $row['passwd']; // Contraseña almacenada en la base de datos

        // Verificar la contraseña utilizando password_verify
        if (password_verify($passwd, $storedHash)) {
            // Contraseña correcta
            // Guarda la ID del usuario en la sesión
            $_SESSION['user_id'] = $row['id'];

            // Guarda la variable 'admin' en la sesión (puedes cambiar 'admin' por lo que necesites)
            $_SESSION['admin'] = $row['admin'];

            // Credenciales correctas
            echo "Inicio de sesión exitoso";
        } else {
            // Contraseña incorrecta
            echo "Inicio de sesión fallido";
        }
    } else {
        // Usuario no encontrado
        echo "Usuario no encontrado";
    }
} else {
    // La verificación de reCAPTCHA v3 falló
    echo "Completa el Captcha la verificación de seguridad.";
}

// Cerrar la conexión
$conn->close();
?>
