<?php
session_start();

if (!isset($_SESSION['preg3']) || $_SESSION['preg3'] !== true) {
    header('Location: preg3.php');
    exit();
}

if (!isset($_SESSION['intentos_preg4'])) {
    $_SESSION['intentos_preg4'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['resp4']) && in_array('ext4', $_POST['resp4']) && isset($_POST['txt']) && strtolower(trim($_POST['txt'])) === 'si') {
        $_SESSION['preg4'] = true;
        header('Location: preg5.php');
        exit();
    } else {
        $_SESSION['preg4'] = false;
        $_SESSION['intentos_preg4']++;

        if ($_SESSION['intentos_preg4'] >= 3) {
            session_destroy();
            header('Location: index.php');
            exit();
        }

        $mensaje_error = "Respuesta incorrecta. Intentos restantes: " . (3 - $_SESSION['intentos_preg4']);
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

    <title>Pregunta 4</title>
</head>
<body>
    <h3>Hubo un obispo inglés... Hater de la evolución de Darwin... Seguro que las <b>iniciales</b> de su nombre nos ayudan, su padre se llamaba William no se que.</h3>
    <h1 class="titulo1">Pregunta 4</h1>
    <h2 class="titulo2">¿Cuál de los siguientes es un sistema de archivos utilizado en Linux?</h2>

    <?php if (isset($mensaje_error)): ?>
        <p style="color:red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>

    <form method="post" action="preg4.php">
        <label>Selecciona los sistemas de archivos utilizados en Linux:</label><br><br>
        
        <div class="checkbox-container">
            <input type="checkbox" name="resp4[]" value="NTFS" id="checkNTFS">
            <label for="checkNTFS">A- NTFS</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp4[]" value="ext4" id="checkext4">
            <label for="checkext4">B- ext4</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp4[]" value="FAT32" id="checkFAT32">
            <label for="checkFAT32">C- FAT32</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp4[]" value="APFS" id="checkAPFS">
            <label for="checkAPFS">D- APFS</label>
        </div>

        <br><br>

        <label>¿Linux puede correr en la primera CPU de Intel?</label><br>
        <input type="text" name="txt" placeholder="Pon si/no"><br><br>

        <button type="submit">Enviar</button>
        <button type="reset">Reiniciar</button>
    </form>
    <audio autoplay loop hidden>
        <source src="./img-sonido/lluvia.mp4" type="audio/mpeg">
    </audio>
</body>
</html>
