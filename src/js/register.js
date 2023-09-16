import * as validaciones from './validar.js';

console.log('Register Script Loaded')

function enviarFormulario() {

    alert('Register Script Activated')

    var passwd = document.getElementById("passwd").value;
    var dni = document.getElementById("dni").value;
    var email = document.getElementById("email").value;
    var telefono = document.getElementById("telefono").value;

    // Realiza tus validaciones aquí
    var valid = false;

    if (!validaciones.validarContrasena(passwd)) {
        alert("Error en contraseña");
    } else if (!validaciones.validarCorreoElectronico(email)) {
        alert("Error en email");
    } else if (!validaciones.validarDNI(dni)) {
        alert("Error en DNI");
    } else if (!validaciones.validarNumeroTelefono(telefono)) {
        alert("Error en Telefono");
    } else {
        valid = true;
    }

    if (valid) {
        // Recopila los datos del formulario
        var formData = new FormData(document.getElementById("registro-form"));

        $.ajax({
            url: "../php/register.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                // Maneja la respuesta del servidor (puede ser una redirección, mensaje de éxito, etc.)
                console.log(data);
            },
            error: function () {
                alert("Error al enviar el formulario.");
            }
        });
    } else {
        alert('Existen datos incorrectos.');
    }
}