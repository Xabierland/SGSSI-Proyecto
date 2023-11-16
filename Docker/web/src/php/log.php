<?php
// Ruta del archivo de registro
$logFile='../log/log.json';

// Verifica si la ruta del archivo no está vacía antes de intentar abrirlo
if (!empty($logFile)) {
    $archivo = fopen($logFile, 'a');

    // Verifica si la apertura del archivo fue exitosa antes de escribir en él
    if ($archivo) {
        // Obtiene la fecha y hora actual
        $date = date('Y-m-d H:i:s');

        // Elimina el último elemento del array $_POST
        array_pop($_POST);

        // Obtiene la dirección IP del cliente
        // $ip = $_SESSION['ip'];

        // Crea un array con la fecha, hora y datos del $_POST
        $logData = [
            'date' => $date,
            //'ip' => $ip,
            'postData' => $_POST,
        ];

        // Convierte el array a formato JSON de manera legible
        $mensaje = json_encode($logData, JSON_PRETTY_PRINT);
        fwrite($archivo, $mensaje . "\n");
        fclose($archivo);
    } else {
        echo "Error al abrir el archivo de registro.";
    }
} else {
    echo "La ruta del archivo de registro está vacía.";
}
?>

