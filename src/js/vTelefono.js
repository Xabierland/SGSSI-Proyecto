function validarNumeroTelefono(telefono) {
    // Expresión regular para validar números de teléfono en formato de 9 dígitos
    var regex = /^[0-9]{9}$/;
  
    // Utiliza test() para verificar si el número cumple con la expresión regular
    return regex.test(telefono);
  }