        <form action="insert_temporal.php" method="post">
            <fieldset>
                <h1>Crear cuenta</h1>
                <div>
                    <label for="usuario">Nombre:</label>
                    <input type="text" name="usuario" id="usuario">
                </div>
                <div>
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <label for="password2">Repite la contraseña:</label>
                    <input type="password" name="password2" id="password2">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" id="telefono">
                </div>
                <div class="div-enlaces">
                    <a href="index.php?formulario=login">Ya tengo cuenta</a>

                </div>
                <div class="botones">
                    <button type="submit">Enviar</button>
                    <button type="reset">Borrar</button>
                </div>
              

            </fieldset>


        </form>