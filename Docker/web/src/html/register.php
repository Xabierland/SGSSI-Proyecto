<?php session_start();?>
<meta http-equiv="Content-Security-Policy" content="
    default-src 'self' https://www.google.com/ 'unsafe-inline';
    script-src 'self' https://code.jquery.com/ https://www.google.com/ https://www.gstatic.com 'unsafe-inline';
    style-src 'self';
    img-src 'self' data:;
    form-action 'self';
    ">
<div class="form registro">
    <h2>Formulario de Registro</h2>
    <form id="registro-form" action="../php/register.php" method="post">
        <table>
            <tr>
                <td><label for="nombre">Nombre:</label></td>
                <td><input type="text" id="nombre" name="nombre" placeholder="Nombre" required></td>
            </tr>
            <tr>
                <td><label for="apellidos">Apellidos:</label></td>
                <td><input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required></td>
            </tr>
            <tr>
                <td><label for="passwd">Contraseña:</label></td>
                <td><input type="password" id="passwd" name="passwd" placeholder="********" required></td>
            </tr>
            <tr>
                <td><label for="dni">DNI:</label></td>
                <td><input type="text" id="dni" name="dni" placeholder="11111111A" required></td>
            </tr>
            <tr>
                <td><label for="fecha_nacimiento">Fecha de Nacimiento:</label></td>
                <td><input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required></td>
            </tr>
            <tr>
                <td><label for="email">Correo Electrónico:</label></td>
                <td><input type="email" id="email" name="email" placeholder="user@mail.com" required></td>
            </tr>
            <tr>
                <td><label for="telefono">Teléfono:</label></td>
                <td><input type="tel" id="telefono" name="telefono" placeholder="123456789" required></td>
            </tr>
        </table>
        <br>
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button class="g-recaptcha" data-sitekey="6Lc-xQspAAAAAMNfCH3z01L4BvbxZD2fTyLvnE7r" id="btnEnviar" name="btnEnviar" type="button" onclick="registro()">Registrarse</button>
    </form>
</div>



