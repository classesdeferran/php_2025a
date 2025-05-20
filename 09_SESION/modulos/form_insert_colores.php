<!-- Formulario para la inserción de datos  -->
<h2>Dinos tu color preferido</h2>

<!-- <form action="insert.php" method="post"> -->
    <form name="formInsert">
    <fieldset>
        <!-- Token de sesión -->
<input type="hidden" name="session-token" value="<?= $_SESSION ['session-token'] ?>" >
<input type="hidden" name="id_usuario" value="<?= $_SESSION['id_usuario'] ?>" >
        <!-- HoneyPot -->
        <input type="text" name="web" style="display:none">
        <div>
            <label for="usuario">Tu nombre : </label>
            <input type="text" name="usuario" id="usuario">
            <p id="errorUsuario"></p>
        </div>
        <div>
            <label for="color">Tu color : </label>
            <input type="text" name="color" id="color">
            <p id="errorColor"></p>
        </div>

        <div>
            <button type="submit">Enviar datos</button>
            <button type="reset">Limpiar formulario</button>
        </div>

    </fieldset>


</form>