    <header>

    <div>
        <div class="header-left">
             <?php if (!isset($_SESSION['usuario'])) : ?>
            <img src="icons/paint_114370.png" alt="">
             <?php endif; ?>
             <h1>Nuestros colores preferidos</h1>
        </div>
        

        <div class="header-right">
            <?php if (isset($_COOKIE['usuario'])) : ?>
                <span>¡Hola <?= $_COOKIE['usuario'] ?>!</span>
            <?php else : ?>
                <span>Por favor, inicia sesión</span>
            <?php endif; ?>
            <form action="../logout.php" method="post">
                    <?php if (isset($_SESSION['usuario'])) : ?>                
                    <button id="btnLogout" type="submit"><i class="fa-solid fa-door-open"></i></button>
                </form>
            <?php endif; ?>
            <?php
                $rutaIdioma = "modulos/idioma.php";
                if (isset($_SESSION['usuario'])) {
                    $rutaIdioma = "../modulos/idioma.php";
                }
            ?>
            <form action="<?= $rutaIdioma ?>" name="form-idioma" method="post">
                <select name="select-idioma" id="select-idioma">
                    <option value="es">ESP</option>
                    <option value="ca">CAT</option>
                    <option value="en">ENG</option>
                </select>
            </form>
        </div>

       
    </div>
        


    </header>

    