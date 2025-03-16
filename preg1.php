<?php
session_start();

if (!isset($_SESSION['intentos_preg1'])) {
    $_SESSION['intentos_preg1'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['resp1']) && in_array('C', $_POST['resp1']) && isset($_POST['txt']) && strtolower(trim($_POST['txt'])) === '@media(max-width:700px){}') {
        $_SESSION['preg1'] = true;
        header('Location: preg2.php');
        exit();
    } else {
        $_SESSION['preg1'] = false;
        $_SESSION['intentos_preg1']++;

        if ($_SESSION['intentos_preg1'] >= 3) {
            session_destroy();
            header('Location: index.php');
            exit();
        }

        $mensaje_error = "Respuesta incorrecta. Intentos restantes: " . (3 - $_SESSION['intentos_preg1']);
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
    <script src="script.js"></script>

    <link rel="stylesheet" href="./styles2.css" type="text/css"/>
    <title>Pregunta 1</title>
</head>
<body>
    <h1 class="titulo1">Pregunta 1</h1>
    <h2 class="titulo2">¿Qué son las media querys?</h2>

    <?php if (isset($mensaje_error)): ?>
        <p style="color:red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>

    <form method="post" action="preg1.php">
        <label for="resp1">Selecciona la respuesta correcta:</label><br><br>

        <div class="checkbox-container">
            <input type="checkbox" name="resp1[]" value="A" id="checkA">
            <label for="checkA">A - Para que el Alberto nos deje en paz</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp1[]" value="B" id="checkB">
            <label for="checkB">B - Para adaptar la web al móvil</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp1[]" value="C" id="checkC">
            <label for="checkC">C - Para adaptar la web a los pxs</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp1[]" value="D" id="checkD">
            <label for="checkD">D - Pasa palabra</label>
        </div>

        <br>
        <label>Vale, veo que sabes la teoría, pero ¿sabrías aplicarlo sin mirar ni nada? En este caso, haz en una sola línea una media query de 700px:</label><br><br>
        <textarea name="txt"></textarea><br><br>

        <button type="submit">Enviar</button>
        <button type="reset">Reiniciar</button>
    </form>
    <audio autoplay loop hidden>
        <source src="./img-sonido/lluvia.mp4" type="audio/mpeg">
    </audio>
</body>
</html>
