function validarCorreoElectronico(correo) {
    // Expresión regular para validar direcciones de correo electrónico
    var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  
    // Utiliza test() para verificar si el correo cumple con la expresión regular
    return regex.test(correo);
  }