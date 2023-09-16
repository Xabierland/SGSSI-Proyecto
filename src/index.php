<?php
session_start(); // Inicia la sesión PHP
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Nómada</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/validar.js"></script>  
    <script src="js/login.js"></script>   
    <script src="js/register.js"></script>   
    <script>
        function cargarContenido(opcion, event) 
        {
            event.preventDefault();
            $.ajax({
                url: opcion, // Cambiar la extensión a .html
                method: "GET",
                success: function (data) 
                {
                    $("#content").html(data);
                },
                error: function () 
                {
                    $("#content").html("Error al cargar el contenido.");
                }
            });
        }
    </script>
</head>
<body>
    <header>
        <h1>Cine Nómada</h1>
        <h2>El mejor cine</h2>
    </header>

    <nav>
        <ul>
            <li><a href="" onclick="cargarContenido('html/inicio.html', event)">Inicio</a></li>
            <li><a href="" onclick="cargarContenido('php/catalogo.php', event)">Catálogo</a></li>
            <li><a href="" onclick="cargarContenido('html/faq.html', event)">FAQ</a></li>
        </ul>
        <ul>
        <?php
            if (isset($_SESSION['user_id'])) {
                // Si hay una sesión activa, muestra el enlace para cerrar sesión
                echo '<li><a href="" onclick="cargarContenido(\'php/profile.php\', event)">Perfil</a></li>';
                echo '<li><a href="" onclick="cargarContenido(\'html/peliculas.html\', event)">Subir Pelicula</a></li>';
                echo '<li><a href="" onclick="cargarContenido(\'php/logout.php\', event)">Cerrar Sesión</a></li>';
            } else {
                // Si no hay sesión activa, muestra el enlace para iniciar sesión y registrarse
                echo '<li><a href="" onclick="cargarContenido(\'html/login.html\', event)">Iniciar Sesión</a></li>';
                echo '<li><a href="" onclick="cargarContenido(\'html/register.html\', event)">Registrarse</a></li>';
            }
            ?>
        </ul>
    </nav>

    <div id="content">
        <!-- Aquí se cargará el contenido dinámico -->
    </div>

    <footer>
        <h6>Creado por Xabier Gabiña</h6>
    </footer>
</body>
</html>