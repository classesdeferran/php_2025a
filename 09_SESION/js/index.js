function getAllCookies() {
  return Object.fromEntries(
    document.cookie.split('; ').map(cookie => cookie.split('='))
  );
}
// Uso:

const cookies = getAllCookies();
console.log(cookies.language); // "en"

var idioma = cookies.language || navigator.language || "es"; // Obtener el idioma del navegador
 
jsonIdiomas = "";
  fetch("../data/idiomas.json")
    .then((respuesta) => respuesta.json())
    .then((data) => {
      jsonIdiomas = data;
      cambiarIdioma(idioma, jsonIdiomas);
      // console.log(jsonIdiomas);
    })
    .catch((error) => {
      console.error("Error al cargar el archivo JSON:", error);
    });  

// console.log(jsonIdiomas);  


  
// Obtener el formulario
const formIdioma = document.forms["form-idioma"];

// Crear el listener
formIdioma.addEventListener("change", () => {
  idioma = formIdioma["select-idioma"].value;

  // Guardar cookie por 30 días
  // document.cookie = `language=${lang}; max-age=${60 * 60 * 24 * 30}; path=/`;
// Guardar cookie por 1 minuto
  document.cookie = `language=${idioma}; max-age=${60}; path=/`;
  cambiarIdioma(idioma, jsonIdiomas);
});

function cambiarIdioma(idioma, jsonIdiomas) {
  document.querySelector("h1").textContent = jsonIdiomas[idioma]["title"];
  document.querySelector("html[lang]").setAttribute("lang", idioma);
  document.querySelector("#init-session").textContent = jsonIdiomas[idioma]["init-session"];
}
