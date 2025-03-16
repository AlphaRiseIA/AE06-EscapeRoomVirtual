<?php
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<?php
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./styles2.css" type="text/css"/>
        <script src="script.js"></script>

    <title>EscapeRoom</title>
</head>
<body>
    <canvas id="rainCanvas"></canvas>

    <?php if ($error): ?>
        <p id="error" style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <?php if ($mensaje): ?>
        <h3><p id="mensaje" style="color:black;"><?php echo htmlspecialchars($mensaje); ?></p></h3>
    <?php endif; ?>

    <h2>Estás atrapado en una mazmorra de el signo XIX</h2>
    <h2>Las credenciales para salir están a lo largo de la mazmorra...</h2>
    <h2>Mucha suerte...</h2>
    <form action="preg1.php" method="get">
        <button type="submit">Comenzar con las pruebas</button>
    </form>

    <form action="./final.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br><br>

        <label for="passwd">Contraseña:</label>
        <input type="password" name="passwd" id="passwd" required>
        <br><br>

        <input type="submit" name="but1" value="Entrar">
    </form>


    <audio autoplay loop hidden>
        <source src="./img-sonido/lluvia.mp4" type="audio/mpeg">
    </audio>
</body>

</html>
