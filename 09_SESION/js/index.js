// Obtener el formulario
const formIdioma = document.forms["form-idioma"];

jsonIdiomas = "";
fetch("../data/idiomas.json")
  .then((respuesta) => respuesta.json())
  .then((data) => {
    jsonIdiomas = data;})
  .catch((error) => {
    console.error("Error al cargar el archivo JSON:", error);
  });

// Crear el listener
formIdioma.addEventListener("change", () => {
  const idioma = formIdioma["select-idioma"].value;
  // alert(idioma);
  console.log(jsonIdiomas[idioma]["title"]);

  document.querySelector("h1").textContent = jsonIdiomas[idioma]["title"];
  document.querySelector("html[lang]").setAttribute("lang", idioma);



});
