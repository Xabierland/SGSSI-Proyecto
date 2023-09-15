function validarContrasena(contrasena) {
  // Expresión regular para validar contraseñas
  var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  // Utiliza test() para verificar si la contraseña cumple con la expresión regular
  return regex.test(contrasena);
}