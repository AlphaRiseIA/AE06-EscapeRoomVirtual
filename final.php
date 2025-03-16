<?php
session_start();

if (isset($_POST["usuario"]) && isset($_POST["passwd"])) {
    $usuario = $_POST["usuario"];
    $passwd = $_POST["passwd"];

    if ($usuario === 'root' && strtolower(trim($passwd)) === 'password') {
        $_SESSION['passwd'] = 'check';
        header('Location: ./final.php');
        exit(); 
    } else {
        header('Location: index.php?error=' . urlencode("Usuario o contraseña incorrectos"));
        exit(); 
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./styles2.css" type="text/css"/>
    <title>Final</title>
</head>
<body>
    <h1 class="titulof">¡Felicidades jugador@! Has conseguido escapar de nuestro juego jejeje</h1>
    <h3 class="tituloff">Para compensarte, tendrás un diploma oficial de que has completado nuestro juego</h3>
    
    <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0">
        <button>Descargar</button>
    </a>

    <audio autoplay loop hidden>
        <source src="./img-sonido/cancion.mp4" type="audio/mpeg">
    </audio>
</body>
</html>
