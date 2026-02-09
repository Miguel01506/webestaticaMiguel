window.onload = function() {
  let boton = document.getElementById("horaBtn");
  let mensaje = document.getElementById("mensaje");
  let nombre = document.getElementById("nombre");

  boton.onclick = function() {
    if (nombre.value.trim() === "") {
      mensaje.textContent = "Por favor, ingresa tu nombre.";
      return;
    }

    const nombreUsuario = nombre.value;
    const url = `http://localhost:8080/api/saludos?nombre=${encodeURIComponent(nombreUsuario)}`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
        if (data.estado === "success") {
          mensaje.textContent = data.mensaje;
        } else {
          mensaje.textContent = "Error: No se pudo obtener el saludo.";
        }
        nombre.value = "";
      })
      .catch(error => {
        console.error("Error en la solicitud:", error);
        mensaje.textContent = "Error al conectar con el servidor.";
      });
  }
}
