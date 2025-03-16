<?php
session_start();

if (!isset($_SESSION['intentos_preg6'])) {
    $_SESSION['intentos_preg6'] = 0; 
}

if (!isset($_SESSION['preg5']) || $_SESSION['preg5'] !== true) {
    header('Location: preg5.php'); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['resp6']) && in_array('count()', $_POST['resp6']) && isset($_POST['txt']) && strtolower(trim($_POST['txt'])) === 'no'
    ) {
        $_SESSION['preg6'] = true; 
        session_destroy(); 
        header('Location: index.php?mensaje=' . urlencode('Veo que has acertado las 6 preguntas. Espero que hayas prestado mucha atención a las salas... Si no siempre puedes volver desde el principio :)'));
        exit();
    } else {
        $_SESSION['preg6'] = false; 
        $_SESSION['intentos_preg6']++;

        if ($_SESSION['intentos_preg6'] >= 3) {
            session_destroy(); 
            header('Location: index.php');
            exit();
        }

        $mensaje_error = "Respuesta incorrecta. Intentos restantes: " . (3 - $_SESSION['intentos_preg6']);
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

    <title>Pregunta 6</title>
</head>
<body>
    <h3>Un pajarito me ha chivado que la contraseña acaba con "rd", no se si te será util, pero yo me voy a quedar por aqui...</h3>
    <h1 class="titulo1">Pregunta 6</h1>
    <h2 class="titulo2">¿Qué función se usa para contar los elementos de un array en PHP?</h2>

    <?php if (isset($mensaje_error)): ?>
        <p style="color:red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>

    <form method="post" action="preg6.php">
        <label>Selecciona las funciones que se usan para contar elementos en un array:</label><br><br>

        <div class="checkbox-container">
            <input type="checkbox" name="resp6[]" value="array_count()" id="checkArrayCount">
            <label for="checkArrayCount">A- array_count()</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp6[]" value="sizeOf()" id="checkSizeOf">
            <label for="checkSizeOf">B- sizeOf()</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp6[]" value="count()" id="checkCount">
            <label for="checkCount">C- count()</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" name="resp6[]" value="length()" id="checkLength">
            <label for="checkLength">D- length()</label>
        </div>

        <br><br>

        <label>¿Esta línea de código está bien?<br><br>
          <p>echo "Hola mundo";</p>
          <p>$numero = 10;</p>
          <p>if ($numero = 10) {</p>
          <p>echo "El número es 10";</p<br>     
            } else {  
                echo "Otro número";
            }
        </label><br><br>

        <input type="text" name="txt" placeholder="Pon si/no"><br><br>

        <button type="submit">Enviar</button>
        <button type="reset">Reiniciar</button>
    </form>
    <audio autoplay loop hidden>
        <source src="./img-sonido/lluvia.mp4" type="audio/mpeg">
    </audio>
</body>
</html>
