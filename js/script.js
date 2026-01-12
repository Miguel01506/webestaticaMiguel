window.onload = function() {
  let boton = document.getElementById("horaBtn");
  let mensaje = document.getElementById("mensaje");
  let nombre = document.getElementById("nombre");

  boton.onclick = function() {
    const ahora = new Date();
    const hora = ahora.toLocaleTimeString();

    if (nombre.value.trim() === "") {
      mensaje.textContent = "Por favor, ingresa tu nombre.";
      return;
    }
    
    mensaje.textContent = "Hola " + nombre.value + ", la hora actual en tu ubicación es: " + hora;
    nombre.value = "";
  }
}
