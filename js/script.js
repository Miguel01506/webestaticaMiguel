document.addEventListener("DOMContentLoaded", () => {
  const boton = document.getElementById("horaBtn");
  const mensaje = document.getElementById("mensaje");

  boton.addEventListener("click", () => {
    const ahora = new Date();
    const hora = ahora.toLocaleTimeString();
    mensaje.textContent = `🕒 La hora actual es: ${hora}`;
  });
});
