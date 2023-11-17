<?php session_start();?>
<div class="form upload">
    <h2>Crear Película</h2>
    <form id="upload-form" action="../php/upload.php" method="POST">
        <table>
            <tr>
                <td><label for="titulo">Título:</label></td>
                <td><input type="text" id="titulo" name="titulo" placeholder="Título" required></td>
            </tr>
            <tr>
                <td><label for="calidad">Calidad:</label></td>
                <td><select id="calidad" name="calidad" required>
                    <option value="144">144</option>
                    <option value="240">240</option>
                    <option value="360">360</option>
                    <option value="480">480</option>
                    <option value="720">720</option>
                    <option value="1080">1080</option>
                    <option value="1440">1440</option>
                    <option value="2160">2160</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="duracion">Duración:</label></td>
                <td><input type="number" id="duracion" name="duracion" min="0" placeholder="120" required></td>
            </tr>
            <tr>
                <td><label for="autor">Autor:</label></td>
                <td><input type="text" id="autor" name="autor" placeholder="Autor" required></td>
            </tr>
            <tr>
                <td><label for="fechaSalida">Fecha de Salida:</label></td>
                <td><input type="date" id="fechaSalida" name="fechaSalida" required></td>
            </tr>
            <tr>
                <td><label for="resumen">Resumen:</label></td>
                <td><textarea id="resumen" name="resumen" rows="4" placeholder="Resumen..." required></textarea></td>
            </tr>
        </table>
        <br>
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button class="g-recaptcha" data-sitekey="6Lc-xQspAAAAAMNfCH3z01L4BvbxZD2fTyLvnE7r" id="btnEnviar" name="btnEnviar" type="button" onclick="upload()">Subir</button>
    </form>
</div>
