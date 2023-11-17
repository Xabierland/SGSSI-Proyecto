<?php session_start();?>
<div class="form login">
    <h2>Formulario de Inicio de Sesión</h2>
    <form id="login-form" action="../php/login.php" method="post">
        <table>
            <tr>
                <td><label for="email">Correo Electrónico:</label></td>
                <td><input type="email" id="email" name="email" placeholder="user@mail.com" required></td>
            </tr>
            <tr>
                <td><label for="passwd">Contraseña:</label></td>
                <td><input type="password" id="passwd" name="passwd" placeholder="********" required></td>
            </tr>
        </table>
        <br>
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button class="g-recaptcha" data-sitekey="6Lc-xQspAAAAAMNfCH3z01L4BvbxZD2fTyLvnE7r" id="btnEnviar" name="btnEnviar" type="button" onclick="iniciarSesion()">Iniciar Sesión</button>
    </form>
</div>
