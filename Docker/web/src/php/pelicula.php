<?php
session_start();
include 'bdcon.php';

// Verificar si se recibió un ID válido a través de la URL
if (isset($_GET['id']) && isset($_SESSION['user_id']) && is_numeric($_GET['id'])) 
{
    $id = $_GET['id'];

    // Consulta SQL
    $sql = "SELECT user_id FROM peliculas WHERE id=$id";

    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();
            $user_id = $row['user_id'];
        }
    }

    // Verificar si el usuario es el mismo que el de la sesión
    if ((int)$_SESSION['admin'] == 1)
    {
        $peliculaId = $_GET['id'];

        // Verificar si se enviaron datos para actualizar la película
        if (isset($_POST['actualizar'])) {
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $duracion = $_POST['duracion'];
            $fechaSalida = $_POST['fechaSalida'];
            $calidad = $_POST['calidad'];
            $resumen = $_POST['resumen'];

            // Consulta SQL para actualizar los datos de la película
            $sql = "UPDATE peliculas SET
                    titulo = '$titulo',
                    autor = '$autor',
                    duracion = '$duracion',
                    fechaSalida = '$fechaSalida',
                    calidad = '$calidad',
                    resumen = '$resumen'
                    WHERE id = $peliculaId";

            if ($conn->query($sql) === TRUE) {
                header('Location: ../.');
                exit;       
            } else {
                echo "Error al actualizar los datos de la película: " . $conn->error;
            }
            exit; // Importante: detener la ejecución para evitar que se siga generando el resto de la página
        }

        // Consulta SQL para obtener los detalles de la película por su ID
        $sql = "SELECT * FROM peliculas WHERE id = $peliculaId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Mostrar los detalles de la película con formularios para editar
            echo '<div class="form pelicula">';
            echo '<h2>Detalles de la Película</h2>';
            echo '<h3>Admin View</h3>';
            echo '<form action="php/pelicula.php?id=' . $_GET['id'] . '" method="POST" id="formulario">';
            echo '<table>';
            echo '<tr><td>Título:</td><td><input type="text" name="titulo" value="' . $row["titulo"] . '"></td></tr>';
            echo '<tr><td>Autor:</td><td><input type="text" name="autor" value="' . $row["autor"] . '"></td></tr>';
            echo '<tr><td>Duración:</td><td><input type="text" name="duracion" value="' . $row["duracion"] . '"></td></tr>';
            echo '<tr><td>Fecha de Salida:</td><td><input type="date" name="fechaSalida" value="' . $row["fechaSalida"] . '"></td></tr>';
            echo '<tr><td>Calidad:</td><td><input type="text" name="calidad" value="' . $row["calidad"] . '"></td></tr>';
            echo '<tr><td>Resumen:</td><td><textarea name="resumen" rows="4">' . $row["resumen"] . '</textarea></td></tr>';
            echo '</table>';
            echo '<input type="submit" name="actualizar" value="Guardar Cambios">';
            echo '</form>';
            // Botón para eliminar la película
            echo '<form action="php/borrar.php" method="POST">';
            echo '<input type="hidden" name="id_pelicula" value="' . $_GET['id'] . '">';
            echo '<input type="submit" name="eliminar" value="Eliminar Película">';
            echo '</form>';

            echo '</form>';
            echo '</div>';
            echo '</div>';
        } else {
            echo "No se encontraron detalles para esta película.";
        }
    }
    else if ((int)$user_id == (int)$_SESSION['user_id'])
    {
    
        $peliculaId = $_GET['id'];

        // Verificar si se enviaron datos para actualizar la película
        if (isset($_POST['actualizar'])) {
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $duracion = $_POST['duracion'];
            $fechaSalida = $_POST['fechaSalida'];
            $calidad = $_POST['calidad'];
            $resumen = $_POST['resumen'];

            // Consulta SQL para actualizar los datos de la película
            $sql = "UPDATE peliculas SET
                    titulo = '$titulo',
                    autor = '$autor',
                    duracion = '$duracion',
                    fechaSalida = '$fechaSalida',
                    calidad = '$calidad',
                    resumen = '$resumen'
                    WHERE id = $peliculaId";

            if ($conn->query($sql) === TRUE) {
                header('Location: ../.');
                exit;       
            } else {
                echo "Error al actualizar los datos de la película: " . $conn->error;
            }
            exit; // Importante: detener la ejecución para evitar que se siga generando el resto de la página
        }

        // Consulta SQL para obtener los detalles de la película por su ID
        $sql = "SELECT * FROM peliculas WHERE id = $peliculaId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Mostrar los detalles de la película con formularios para editar
            echo '<div class="form pelicula">';
            echo '<h2>Detalles de la Película</h2>';
            echo '<form action="php/pelicula.php?id=' . $_GET['id'] . '" method="POST" id="formulario">';
            echo '<table>';
            echo '<tr><td>Título:</td><td><input type="text" name="titulo" value="' . $row["titulo"] . '"></td></tr>';
            echo '<tr><td>Autor:</td><td><input type="text" name="autor" value="' . $row["autor"] . '"></td></tr>';
            echo '<tr><td>Duración:</td><td><input type="text" name="duracion" value="' . $row["duracion"] . '"></td></tr>';
            echo '<tr><td>Fecha de Salida:</td><td><input type="date" name="fechaSalida" value="' . $row["fechaSalida"] . '"></td></tr>';
            echo '<tr><td>Calidad:</td><td><input type="text" name="calidad" value="' . $row["calidad"] . '"></td></tr>';
            echo '<tr><td>Resumen:</td><td><textarea name="resumen" rows="4">' . $row["resumen"] . '</textarea></td></tr>';
            echo '</table>';
            echo '<input type="submit" name="actualizar" value="Guardar Cambios">';
            echo '</form>';
            // Botón para eliminar la película
            echo '<form action="php/borrar.php" method="POST">';
            echo '<input type="hidden" name="id_pelicula" value="' . $_GET['id'] . '">';
            echo '<input type="submit" name="eliminar" value="Eliminar Película">';
            echo '</form>';

            echo '</form>';
            echo '</div>';
            echo '</div>';
        } else {
            echo "No se encontraron detalles para esta película.";
        }
    }
    else
    {
        echo "No tienes permisos para editar esta pelicula.";
    }
} 
else {
    echo "Es necesario iniciar sesión para editar una película.";
}

// Cerrar la conexión
$conn->close();
?>
