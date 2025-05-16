            <form action="reset_password.php" method="post">
                <fieldset>
                    <h2>Iniciar sesión</h2>
                    <div>
                        <label for="usuario">Introduce tu nombre de usuario o email:</label>
                        <input type="text" name="usuario" id="usuario" minlength="4" maxlength="15" >
                        <p class="condiciones-input">Mínimo 4 caracteres y máximo 50</p>
                        <p id="errorReset"></p>
                    </div>
                    
                    <div class="div-enlaces">
                        <a href="index.php?formulario=login">Ya he recordado la contraseña</a>
                        <a href="index.php?formulario=crear-cuenta">No tengo cuenta todavía</a>
                    
                    </div>

                    
                    
                    <div class="botones">
                        <button type="submit">Enviar</button>
                        <button type="reset">Borrar</button>
                    </div>


                </fieldset>
            </form>