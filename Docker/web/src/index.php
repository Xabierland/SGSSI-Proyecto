<?php
session_start([
    'cookie_lifetime' => 0,           // La sesión expira cuando se cierra el navegador.
    'cookie_path' => '/',             // Disponible en todo el dominio.
    'cookie_secure' => true,          // Solo se envía la cookie sobre conexiones HTTPS.
    'cookie_httponly' => true,        // La cookie solo es accesible a través de HTTP.
    'cookie_samesite' => 'Lax',       // Define la política de SameSite (puede ser 'Lax' o 'Strict').
]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Content-Security-Policy" content="
    default-src 'self';
    script-src 'self' https://code.jquery.com/ 'unsafe-inline';
    style-src 'self';
    img-src 'self' data:;
    ">
    <title>Cine Nómada</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
            <li>|</li>
            <li><a href="" onclick="cargarContenido('php/catalogo.php', event)">Catálogo</a></li>
            <li>|</li>
            <li><a href="" onclick="cargarContenido('html/faq.html', event)">FAQ</a></li>
        </ul>
        <ul>
        <?php
            if (isset($_SESSION['user_id'])) {
                // Si hay una sesión activa, muestra el enlace para cerrar sesión
                echo '<li><a href="" onclick="cargarContenido(\'php/profile.php?id=' . $_SESSION['user_id'] . '\', event)">Perfil</a></li>';
                echo '<li>|</li>';
                echo '<li><a href="" onclick="cargarContenido(\'html/upload.html\', event)">Subir Pelicula</a></li>';
                echo '<li>|</li>';
                echo '<li><a href="" onclick="cargarContenido(\'php/logout.php\', event)">Cerrar Sesión</a></li>';
            } else {
                // Si no hay sesión activa, muestra el enlace para iniciar sesión y registrarse
                echo '<li><a href="" onclick="cargarContenido(\'html/login.html\', event)">Iniciar Sesión</a></li>';
                echo '<li>|</li>';
                echo '<li><a href="" onclick="cargarContenido(\'html/register.html\', event)">Registrarse</a></li>';
            }
            ?>
        </ul>
    </nav>

    <div id="content">
        <!-- Aquí se cargará el contenido dinámico -->
        <h3>Explora el mundo a través del cine</h3>
        <p>¿Listo para un viaje cinemático inolvidable?</p>
        <p>En "Cine Nómada," llevamos la pasión por el cine a nuevas alturas. Somos más que un videoclub; somos una puerta abierta a un universo de historias, géneros y culturas.</p>
    </div>

    <footer>
        <a href="https://github.com/Xabierland/SGSSI-Proyecto">Github</a>
    </footer>
</body>
</html>