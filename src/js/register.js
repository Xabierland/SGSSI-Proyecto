document.addEventListener("DOMContentLoaded", function () {
    var btnEnviar = document.getElementById("btnEnviar");

    btnEnviar.addEventListener("click", function () {
        // Realiza la validación de los campos aquí
        var nombre = document.getElementById("nombre").value;
        var apellidos = document.getElementById("apellidos").value;
        var passwd = document.getElementById("passwd").value;
        var dni = document.getElementById("dni").value;
        var fechaNacimiento = document.getElementById("fecha_nacimiento").value;
        var email = document.getElementById("email").value;
        var telefono = document.getElementById("telefono").value;

        // Puedes agregar tu lógica de validación aquí
        // Por ejemplo, verifica si los campos están llenos y si el formato es correcto

        // Si la validación es exitosa, puedes enviar el formulario
        if (nombre && apellidos && passwd && dni && fechaNacimiento && email && telefono) {
            document.getElementById("registro-form").submit();
        } else {
            // Muestra un mensaje de error o realiza otras acciones de validación
            alert("Por favor, complete todos los campos correctamente.");
        }
    });
});
