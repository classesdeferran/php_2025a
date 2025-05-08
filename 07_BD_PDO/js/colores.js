function resetFormUpdate() {
    // Obtiene el formulario y resetea sus campos
    alert('OK')
    document.getElementById("form_update").reset();
}

document.getElementById('resetButton').addEventListener('click', function() {
    // Obtiene el formulario por su ID y resetea los campos
    document.getElementById('form_update').reset();
});