    <header>

    <div>
        <h1>Nuestros colores preferidos</h1>

                <?php if (isset($_SESSION['usuario'])) : ?>
            <span>¡Hola <?= $_SESSION['usuario'] ?>!</span>
            <form action="../logout.php" method="post">
                <button id="btnLogout" type="submit"><i class="fa-solid fa-door-open"></i></button>
            </form>
        <?php endif; ?>
    </div>
        


    </header>

    