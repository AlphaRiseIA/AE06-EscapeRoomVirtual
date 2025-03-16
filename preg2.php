<?php
session_start();

if (!isset($_SESSION['preg1']) || $_SESSION['preg1'] !== true) {
    header('Location: preg1.php');
    exit();
}

if (!isset($_SESSION['intentos_preg2'])) {
    $_SESSION['intentos_preg2'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['resp2']) && in_array('Akeebabackup', $_POST['resp2']) && isset($_POST['txt']) && strtolower(trim($_POST['txt'])) === 'no') {
        $_SESSION['preg2'] = true;
        header('Location: preg3.php');
        exit();
    } else {
        $_SESSION['preg2'] = false;
        $_SESSION['intentos_preg2']++;

        if ($_SESSION['intentos_preg2'] >= 3) {
            session_destroy();
            header('Location: index.php');
            exit();
        }

        $mensaje_error = "Respuesta incorrecta. Intentos restantes: " . (3 - $_SESSION['intentos_preg2']);
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

    <title>Pregunta 2</title>
</head>
<body>
    <h3>Que bonitos los arboles, sobretodo sus <bold>RAICES</bold></h3> <!-- Esto es una pista -->
    <h1 class="titulo1">Pregunta 2</h1>
    <h2 class="titulo1">¿Cuál es el programa para hacer backups en Joomla?</h2>

    <?php if (isset($mensaje_error)): ?>
        <p style="color:red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>

    <form method="post" action="preg2.php">
        <label for="resp2">Selecciona la respuesta correcta:</label><br><br>

        <div class="checkbox-container">
            <input type="checkbox" name="resp2[]" value="Akeebabackup" id="checkA">
            <label for="checkA">A - Akeebabackup</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp2[]" value="XCloner" id="checkB">
            <label for="checkB">B - XCloner</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp2[]" value="LazyDbBackup" id="checkC">
            <label for="checkC">C - LazyDbBackup</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp2[]" value="BackupMonkey" id="checkD">
            <label for="checkD">D - BackupMonkey</label>
        </div>

        <br><br>

        <label>¿Un backup de solo la base de datos es suficiente para restaurar completamente un sitio Joomla?</label><br>
        <input type="text" name="txt" placeholder="Pon si/no"><br><br>

        <button type="submit">Enviar</button>
        <button type="reset">Reiniciar</button>
    </form>
    <audio autoplay loop hidden>
        <source src="./img-sonido/lluvia.mp4" type="audio/mpeg">
    </audio>
</body>
</html>
