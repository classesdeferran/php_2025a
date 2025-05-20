 <!-- Formulario para la actualización  -->
                <h2>Modifica los datos</h2>

                <form action="update.php" method="post" id="form_update">
                    <fieldset>
                        <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden>
                        <div>
                        <label for="usuario">Tu nombre : </label>
                        <input type="text" name="usuario" id="usuario" value="<?= $_GET['user'] ?>" >
                        </div>
                        <div>
                            <label for="color">Tu color : </label>
                            <input type="text" name="color" id="color" value="<?= $_GET['color'] ?>" >
                        </div>

                        <div>
                            <button type="submit">Enviar datos</button>
                            <button type="reset">Borrar formulario</button>
                            <a href="index.php">Cancelar</a>                
                            

                        </div>

                    </fieldset>
                </form>