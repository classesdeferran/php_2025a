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
  const id_usuario = formInsert["id_usuario"].value;

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

  // Expresión regular que se debe cumplir
  // Por tanto, si no lo hacen, es un error
  const regex = /[a-zA-ZÇáéíóúàèìòùÁÉÍÓÚÀÈÌÒÙüñç\s#]+/;

  // Expresiones que NO se deben cumplir:
  const regex1 = /\W+/; // El símbolo \W representa cualquier carácter que no sea una letra, un número o un guion bajo
  const regex2 = /\d+/;

  // Si se cumple lo siguiente es que hay un error en el contenido del input 
  reglaUsuario = (regex1.test(usuario) || regex2.test(usuario)) && (!regex.test(usuario))
  reglaColor = (regex1.test(color) || regex2.test(color)) && (!regex.test(color))
  

if ( reglaUsuario && reglaColor) {
    document.getElementById("errorUsuario").textContent =
      "Hay que poner un texto válido";
    document.getElementById("errorColor").textContent =
      "Hay que poner un texto válido";  
    return;
  }

  if (reglaUsuario) {
    document.getElementById("errorUsuario").textContent =
      "Hay que poner un texto válido";
    return;
  }
  if (reglaColor ) {
    document.getElementById("errorColor").textContent =
      "Hay que poner un texto válido";
    return;
  }

  if (web != "") {
    alert("Bot detectado");
    return;
  }

  // alert("Hoy es viernes");

const datos = new URLSearchParams()
datos.append("color", color);
datos.append("usuario", usuario);
datos.append("session-token", sessionToken);
datos.append("web", web);
datos.append("id_usuario", id_usuario);

fetch ("insert.php", { 
  method: "POST",
  body: datos.toString(),
  headers: {
    "Content-Type": "application/x-www-form-urlencoded",
  },
})
  .then((response) => response.text())
  .then((data) => {
    console.log(data);
    location.reload()
  })
  .catch((error) => {
    alert("Error en la petición");
    console.error("Error:", error);
  });
})

  

  




