// validaciones.js
export function validarNumeroTelefono(telefono) {
    // Expresión regular para validar números de teléfono en formato de 9 dígitos
    var regex = /^[0-9]{9}$/;
  
    // Utiliza test() para verificar si el número cumple con la expresión regular
    return regex.test(telefono);
}

export function validarCorreoElectronico(correo) {
    // Expresión regular para validar direcciones de correo electrónico
    var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Utiliza test() para verificar si el correo cumple con la expresión regular
    return regex.test(correo);
}

export function validarContrasena(contrasena) {
    // Expresión regular para validar contraseñas
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Utiliza test() para verificar si la contraseña cumple con la expresión regular
    return regex.test(contrasena);
}

export function validarDNI(dni) {
    // Expresión regular para validar números de DNI Español
    var regex = /^\d{8}[A-Z]$/;

    // Utiliza test() para verificar si el número cumple con la expresión regular
    return regex.test(dni);
}
