// Capturar el formulario
const formInsert = document.forms["formInsert"];

formInsert.addEventListener("submit", (e) => {
  e.preventDefault(); // Evitar el envío del formulario
  document.getElementById("errorUsuario").textContent = "";
  document.getElementById("errorColor").textContent = "";

  // Capturar los valores de los campos
  const color = formInsert["color"].value.trim();
  const usuario = formInsert["usuario"].value.trim();
  const web = formInsert["web"].value;
  const sessionToken = formInsert["session-token"].value;

  // Validar los campos
  if (usuario === "" && color === "") {
    document.getElementById("errorUsuario").textContent =
      "Hay que poner un texto válido";
    document.getElementById("errorColor").textContent =
      "No pongas sólo espacios en blanco";
    return;
  }
  if (usuario === "") {
    document.getElementById("errorUsuario").textContent =
      "No pongas sólo espacios en blanco";
    return;
  }
  if (color === "") {
    document.getElementById("errorColor").textContent =
      "No pongas sólo espacios en blanco";
    return;
  }

  const regex = /[a-zA-ZÇáéíóúàèìòùÁÉÍÓÚñç\s]+/;

  if (!regex.test(usuario)) {
    document.getElementById("errorUsuario").textContent =
      "Hay que poner un texto válido";
    return;
  }
  if (!regex.test(color)) {
    document.getElementById("errorColor").textContent =
      "Hay que poner un texto válido";
    return;
  }

  if (web != "") {
    alert("Bot detectado");
    return;
  }

  alert("Hoy es viernes");
});
