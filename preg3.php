<?php
session_start();

if (!isset($_SESSION['preg2']) || $_SESSION['preg2'] !== true) {
    header('Location: preg2.php');
    exit();
}

if (!isset($_SESSION['intentos_preg3'])) {
    $_SESSION['intentos_preg3'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['resp3']) && in_array('E', $_POST['resp3']) && isset($_POST['txt']) && strtolower(trim($_POST['txt'])) === 'no') {
        $_SESSION['preg3'] = true;
        header('Location: preg4.php');
        exit();
    } else {
        $_SESSION['preg3'] = false;
        $_SESSION['intentos_preg3']++;

        if ($_SESSION['intentos_preg3'] >= 3) {
            session_destroy();
            header('Location: index.php');
            exit();
        }

        $mensaje_error = "Respuesta incorrecta. Intentos restantes: " . (3 - $_SESSION['intentos_preg3']);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles2.css" type="text/css"/>
    <script src="script.js"></script>

    <title>Pregunta 3</title>
</head>
<body>
    <h3><bold>Pa<bold>rece que este sitio no tiene ningun sentido... Podria volverme loco... Porque digo tantas veces Palabras con P?</h3>
    <h1 class="titulo1">Pregunta 3</h1>
    <h2 class="titulo2">¿Cuáles son las ventajas de la digitalización?</h2>

    <?php if (isset($mensaje_error)): ?>
        <p style="color:red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>

    <form method="post" action="preg3.php">
        <label>Selecciona las ventajas de la digitalización:</label><br><br>
        
        <div class="checkbox-container">
            <input type="checkbox" name="resp3[]" value="A" id="checkA">
            <label for="checkA">A- Incrementa la eficiencia</label>
        </div>
        
        <div class="checkbox-container">
            <input type="checkbox" name="resp3[]" value="B" id="checkB">
            <label for="checkB">B- Permite la comunicación inmediata</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp3[]" value="C" id="checkC">
            <label for="checkC">C- La información es accesible inmediatamente</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp3[]" value="D" id="checkD">
            <label for="checkD">D- Genera nuevas oportunidades de negocios</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp3[]" value="E" id="checkE">
            <label for="checkE">E- Todas son correctas</label>
        </div>
        
        <br><br>

        <label>¿Las empresas "de ahora" son como las "de antes"?</label><br>
        <input type="text" name="txt" placeholder="Pon si/no"><br><br>

        <button type="submit">Enviar</button>
        <button type="reset">Reiniciar</button>
    </form>
    <audio autoplay loop hidden>
        <source src="./img-sonido/lluvia.mp4" type="audio/mpeg">
    </audio>
</body>
</html>
