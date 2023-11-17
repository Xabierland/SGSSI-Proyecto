<meta http-equiv="Content-Security-Policy" content="
    default-src 'self' https://www.google.com/ 'unsafe-inline';
    script-src 'self' https://code.jquery.com/ https://www.google.com/ https://www.gstatic.com 'unsafe-inline';
    style-src 'self';
    img-src 'self' data:;
    form-action 'self';
    ">
<?php

include 'bdcon.php';

// Consulta SQL para obtener las películas
$sql = "SELECT * FROM peliculas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h2>Catálogo de Películas</h2>';
    echo '<input type="text" id="buscador" placeholder="Buscar...">'; // Campo de búsqueda
    echo '<div class="catalogo">';
    echo '<table>';
    echo '<tr>';
    echo '<th>Título</th>';
    echo '<th>Autor</th>';
    echo '<th>Duración</th>';
    echo '<th>Fecha de Salida</th>';
    echo '<th>Calidad</th>';
    echo '</tr>';
    // Mostrar los datos en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // Modificar el título para que llame a la función cargarContenido con el ID de la película como parámetro
        echo "<td><a href='#' onclick='cargarContenido(\"php/pelicula.php?id=" . $row["id"] . "\", event)'>" . $row["titulo"] . "</a></td>";
        echo "<td>" . $row["autor"] . "</td>";
        echo "<td>" . $row["duracion"] . " min.</td>";
        echo "<td>" . $row["fechaSalida"] . "</td>";
        echo "<td>" . $row["calidad"] . "p</td>";
        echo "</tr>";
    }
    echo '</table>';
    echo "</div>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();

?>


<!-- Script para el buscador AJAX -->
<script>
    $(document).ready(function () {
        // Manejar el evento de cambio en el campo de búsqueda
        $("#buscador").on("keyup", function () {
            var valorBusqueda = $(this).val().toLowerCase();
            var filas = $("table tr:not(:first)"); // Obtener todas las filas de datos excluyendo la primera fila de encabezados

            // Recorrer todas las filas de datos
            filas.each(function () {
                var fila = $(this);
                var celdas = fila.find("td"); // Obtener todas las celdas de la fila

                // Bandera para determinar si la fila coincide con la búsqueda
                var coincidencia = false;

                // Recorrer todas las celdas de la fila
                celdas.each(function () {
                    var celda = $(this);
                    var texto = celda.text().toLowerCase();

                    // Verificar si el texto de la celda contiene el valor de búsqueda
                    if (texto.indexOf(valorBusqueda) !== -1) {
                        coincidencia = true;
                        return false; // Salir del bucle cuando se encuentra una coincidencia
                    }
                });

                // Mostrar u ocultar la fila según la coincidencia
                if (coincidencia) {
                    fila.show();
                } else {
                    fila.hide();
                }
            });
        });
    });
</script>
