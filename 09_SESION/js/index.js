var idioma = navigator.language || navigator.userLanguage || "es"; // Obtener el idioma del navegador

// Obtener el formulario
const formIdioma = document.forms["form-idioma"];

// Crear el listener
formIdioma.addEventListener("change", () => {
  idioma = formIdioma["select-idioma"].value;

    cambiarIdioma(idioma);
});

function cambiarIdioma(idioma) {
  jsonIdiomas = "";
  fetch("../data/idiomas.json")
    .then((respuesta) => respuesta.json())
    .then((data) => {
      jsonIdiomas = data;
      console.log(jsonIdiomas);
        document.querySelector("h1").textContent = jsonIdiomas[idioma]["title"];
        document.querySelector("html[lang]").setAttribute("lang", idioma);

    })
    .catch((error) => {
      console.error("Error al cargar el archivo JSON:", error);
    });
  
}
