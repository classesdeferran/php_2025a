<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari email</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <section>
    <h1>Enviar email</h1>
            <form action="envia_email.php" method="post">
                <div>                
                    <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required></div>
                <div>                
                    <label for="email">Email:</label>
                <input type="email" id="email" name="email" required></div>
                <div>                
                    <label for="assumpte">Assumpte</label>
                <input type="text" id="assumpte" name="assumpte" required>
            </div>
                <div>                
                    <label for="textMissatge">Text del missatge</label>
                <textarea id="textMissatge" name="textMissatge" rows="5" cols="50" required></textarea>
            </div>
                <div>                
                    <button type="submit">Enviar</button></div>





            </form>
        </section>
    </main>
</body>
</html>