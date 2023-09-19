<?php
include 'bdcon.php';

// Verificar si se recibió un ID válido a través de la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = $_GET['id'];

    // Verificar si se enviaron datos para actualizar el usuario
    if (isset($_POST['actualizar'])) {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $email = $_POST['email'];
        $passwd = $_POST['passwd'];
        $admin = isset($_POST['admin']) ? 1 : 0; // Comprobar si el usuario es administrador

        // Consulta SQL para actualizar los datos del usuario
        $sql = "UPDATE usuarios SET
                nombre = '$nombre',
                apellidos = '$apellidos',
                dni = '$dni',
                telefono = '$telefono',
                fechaN = '$fechaNacimiento',
                email = '$email',
                passwd = '$passwd',
                admin = '$admin'
                WHERE id = $userId";

        if ($conn->query($sql) === TRUE) {
            echo "Los datos del usuario se actualizaron correctamente.";
        } else {
            echo "Error al actualizar los datos del usuario: " . $conn->error;
        }
    }

    // Consulta SQL para obtener los detalles del usuario por su ID
    $sql = "SELECT * FROM usuarios WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Mostrar los detalles del usuario con formularios para editar
        echo '<div class="form profile>"';
        echo '<h2>Detalles del Usuario</h2>';
        echo '<form method="POST">';
        echo '<table>';
        echo '<tr><td>Nombre:</td><td><input type="text" name="nombre" value="' . $row["nombre"] . '"></td></tr>';
        echo '<tr><td>Apellidos:</td><td><input type="text" name="apellidos" value="' . $row["apellidos"] . '"></td></tr>';
        echo '<tr><td>DNI:</td><td><input type="text" name="dni" value="' . $row["dni"] . '"></td></tr>';
        echo '<tr><td>Teléfono:</td><td><input type="text" name="telefono" value="' . $row["telefono"] . '"></td></tr>';
        echo '<tr><td>Fecha de Nacimiento:</td><td><input type="date" name="fechaNacimiento" value="' . $row["fechaN"] . '"></td></tr>';
        echo '<tr><td>Correo Electrónico:</td><td><input type="email" name="email" value="' . $row["email"] . '"></td></tr>';
        echo '<tr><td>Contraseña:</td><td><input type="text" name="passwd" value="' . $row["passwd"] . '"></td></tr>';
        echo '<tr><td>Admin:</td><td><input type="checkbox" name="admin" ' . ($row["admin"] ? 'checked' : '') . '></td></tr>';
        echo '</table>';
        echo '<input type="submit" name="actualizar" value="Guardar Cambios">';
        echo '</form>';
        echo '</div>';
    } else {
        echo "No se encontraron detalles para este usuario.";
    }
} else {
    echo "ID de usuario no válido.";
}

// Cerrar la conexión
$conn->close();
?>
