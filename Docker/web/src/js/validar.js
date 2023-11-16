// validaciones.js
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

