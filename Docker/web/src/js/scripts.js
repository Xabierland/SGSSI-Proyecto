// validaciones.js
function cargarContenido(opcion, event) {
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

function validarNumeroTelefono(telefono) {
    // Expresión regular para validar números de teléfono en formato de 9 dígitos
    var regex = /^[0-9]{9}$/;
  
    // Utiliza test() para verificar si el número cumple con la expresión regular
    return regex.test(telefono);
}

function validarCorreoElectronico(correo) {
    // Expresión regular para validar direcciones de correo electrónico
    var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Utiliza test() para verificar si el correo cumple con la expresión regular
    return regex.test(correo);
}

function validarContrasena(contrasena) {
    // Expresión regular para validar contraseñas
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/

    // Utiliza test() para verificar si la contraseña cumple con la expresión regular
    return regex.test(contrasena);
}

function validarDNI(nif) {
    // Expresión regular para validar un NIF español
    var regex = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i;

    // Utiliza test() para verificar si el número cumple con la expresión regular
    if (!regex.test(nif)) {
        return false; // El formato del NIF es incorrecto
    }

    // Obtiene los números del NIF (los primeros 8 caracteres)
    var numerosNIF = nif.substr(0, 8);

    // Obtiene la letra proporcionada en el NIF (el último carácter)
    var letraProporcionada = nif.charAt(8).toUpperCase();

    // Array con las letras correspondientes a los números del NIF
    var letrasNIF = 'TRWAGMYFPDXBNJZSQVHLCKE';

    // Calcula la letra correcta para los números del NIF
    var letraCorrecta = letrasNIF[numerosNIF % 23];

    // Compara la letra proporcionada con la letra correcta
    return letraProporcionada === letraCorrecta;
}

function iniciarSesion() {

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

function registro() {

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
        // Genera el token de reCAPTCHA
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lc-xQspAAAAAMNfCH3z01L4BvbxZD2fTyLvnE7r', {action: 'registro'}).then(function(token) {
                // Agrega el token al formulario
                document.getElementById("g-recaptcha-response").value = token;
                // Envía el formulario
                tramitarRegistro();
            });
        });
    }
    else
    {
        logger("registro-form");
    }
}

function upload() {
    // Genera el token de reCAPTCHA
    grecaptcha.ready(function() {
        grecaptcha.execute('6Lc-xQspAAAAAMNfCH3z01L4BvbxZD2fTyLvnE7r', {action: 'registro'}).then(function(token) {
            // Agrega el token al formulario
            document.getElementById("g-recaptcha-response").value = token;
            // Envía el formulario
            tramitarUpload();
        });
    });
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

function tramitarRegistro() {
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

function tramitarUpload() {
    // Recopila los datos del formulario
    var formData = new FormData(document.getElementById("upload-form"));

    $.ajax({
        url: "../php/upload.php",
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

function logger(form) {
    // Recopila los datos del formulario
    var formData = new FormData(document.getElementById(form));

    $.ajax({
        url: "../php/log.php",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            // Maneja la respuesta del servidor (puede ser una redirección, mensaje de éxito, etc.)
            location.reload();
        },
        error: function () {
            alert("Error al escribir en el log.");
        }
    });
}

