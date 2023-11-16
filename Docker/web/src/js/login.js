console.log('Login Script Loaded');

function iniciarSesion() {
    console.log('Login Script Activated');

    var passwd = document.getElementById("passwd").value;
    var email = document.getElementById("email").value;

    // Realiza tus validaciones aquí
    var valid = false;

    if (!validarContrasena(passwd)) {
        alert("Error en contraseña. \nLa contraseña debe contar con 8 caracteres entre los cuales debe de haber minúsculas, mayúsculas, números y signos especiales [!@#$%^&*].");
    } else if (!validarCorreoElectronico(email)) {
        alert("Error en el formato del email.");
    } else {
        valid = true;
    }

    if (valid) {
        // Genera el token de reCAPTCHA
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lc-xQspAAAAAMNfCH3z01L4BvbxZD2fTyLvnE7r', {action: 'login'}).then(function(token) {
                // Agrega el token al formulario
                document.getElementById("g-recaptcha-response").value = token;
                // Envía el formulario
                tramitarInicio();
            });
        });
    }
    else
    {
        logger("login-form");
    }
}

function tramitarInicio() {
    // Recopila los datos del formulario
    var formData = new FormData(document.getElementById("login-form"));

    $.ajax({
        url: "../php/login.php",
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
