            <form action="login.php" method="post">
                <fieldset>
                    <h1>Iniciar sesión</h1>
                    <div>
                        <label for="usuario">Nombre:</label>
                        <input type="text" name="usuario" id="usuario" minlength="4" maxlength="15" >
                        <p class="condiciones-input">Mínimo 4 caracteres y máximo 15</p>
                        <p id="errorUsuario"></p>
                    </div>
                    <div>
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password" minlength="4" maxlength="10">
                        <p class="condiciones-input">Mínimo 4 caracteres y máximo 10</p>
                        <p id="errorPassword"></p>
                    </div>
                    <div class="div-enlaces">
                        <a href="index.php?formulario=crear-cuenta">No tengo cuenta todavía</a>
                        <a href="index.php?formulario=reset">No recuerdo la contraseña</a>
                    </div>

                    
                    
                    <div class="botones">
                        <button type="submit">Enviar</button>
                        <button type="reset">Borrar</button>
                    </div>


                </fieldset>
            </form>