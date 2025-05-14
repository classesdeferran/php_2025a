    <header>
        <h1>Nuestros colores preferidos</h1>


        <?php if ($_SESSION['usuario']) : ?>
            <span>¡Hola <?= $_SESSION['usuario'] ?>!</span>
            <form action="../logout.php" method="post">
                <button id="btnLogout" type="submit"><i class="fa-solid fa-door-open"></i></button>
            </form>
        <?php else : ?>
            <form action="acceder.php" method="post">
                <button type="submit">Iniciar sesión</button>
            </form>
        <?php endif; ?>
    </header>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        header {
            background-color: rgb(20, 20, 20);
            color: white;
            margin-bottom: 2rem;

            div {
                display: flex;
                justify-content: space-between;
                align-items: center;
                max-width: 90%;
                margin: 0 auto;

                #btnLogout {
                    background-color: transparent;
                    border: 1px solid white;
                    border-radius: 5px;

                    font-size: 1.2rem;
                    cursor: pointer;
                }
            }
        }

        h1 {
            text-align: center;
            margin: 2rem 0;
        }
    </style>