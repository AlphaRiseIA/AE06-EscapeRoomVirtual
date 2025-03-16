<?php
session_start();

if (!isset($_SESSION['preg4']) || $_SESSION['preg4'] !== true) {
    header('Location: preg4.php');
    exit();
}

if (!isset($_SESSION['intentos_preg5'])) {
    $_SESSION['intentos_preg5'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['resp5']) && in_array('D', $_POST['resp5']) && isset($_POST['txt']) && strtolower(trim($_POST['txt'])) === 'si') {
        $_SESSION['preg5'] = true;
        header('Location: preg6.php');
        exit();
    } else {
        $_SESSION['preg5'] = false;
        $_SESSION['intentos_preg5']++;

        if ($_SESSION['intentos_preg5'] >= 3) {
            session_destroy();
            header('Location: index.php');
            exit();
        }

        $mensaje_error = "Respuesta incorrecta. Intentos restantes: " . (3 - $_SESSION['intentos_preg5']);
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

    <title>Pregunta 5</title>
</head>
<body>
    <h3>El aire está compuesto por un 78% de nitrogeno y me acuerdo que habia un 1% de gases generales, como el helio, pero no me acuerdo de ese 21% que queda.Seguro que su inicial tambien nos es util</h3>
    <h1 class="titulo1">Pregunta 5</h1>
    <h2 class="titulo2">Que tipo de fichero es legible?</h2>

    <?php if (isset($mensaje_error)): ?>
        <p style="color:red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>

    <form method="post" action="preg5.php">
        <label>Que tipo de fichero se puede leer en texto plano?</label><br><br>
        
        <div class="checkbox-container">
            <input type="checkbox" name="resp5[]" value="A" id="checkWindows">
            <label for="checkWindows">A- Imagen</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp5[]" value="B" id="checkLinux">
            <label for="checkLinux">B- Video</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp5[]" value="C" id="checkMacOS">
            <label for="checkMacOS">C- Ejecutables de windows</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp5[]" value="D" id="checkAndroid">
            <label for="checkAndroid">D- Páginas Web</label>
        </div>

        <br><br>

        <label>¿La información es un conjunto de datos relevantes?</label><br>
        <input type="text" name="txt" placeholder="Pon si/no"><br><br>

        <button type="submit">Enviar</button>
        <button type="reset">Reiniciar</button>
    </form>
    <audio autoplay loop hidden>
        <source src="./img-sonido/lluvia.mp4" type="audio/mpeg">
    </audio>
</body>
</html>


