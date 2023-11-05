console.log('Register Script Loaded');

function enviarFormulario() {

    console.log('Register Script Activated');

    var passwd = document.getElementById("passwd").value;
    var dni = document.getElementById("dni").value;
    var email = document.getElementById("email").value;
    var telefono = document.getElementById("telefono").value;

    // Realiza tus validaciones aquí
    var valid = false;

    if (!validarContrasena(passwd)) {
        alert("Error en contraseña. \nLa contraseña debe contar con 8 caracteres entre los cuales debe de haber minusculas, mayusculas, numeros y signos especiales [!@#$%^&*].");
    } else if (!validarDNI(dni)) {
        alert("Error en DNI.");
    } else if (!validarCorreoElectronico(email)) {
        alert("Error en email, verifica el formato");
    } else if (!validarNumeroTelefono(telefono)) {
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
                alert(data);
                location.reload();
            },
            error: function () {
                alert("Error al enviar el formulario.");
            }
        });
    }
}