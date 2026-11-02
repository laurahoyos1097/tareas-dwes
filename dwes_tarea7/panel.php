<?php
session_start();

// Comprobamos que existe una sesión activa.
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// Recuperamos los datos de la sesión.
$nombreUsuario = $_SESSION['usuario'];
$rolUsuario = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel privado de aprendizaje</title>
</head>

<body style="
    font-family: Arial, sans-serif;
    background: #eee8f7;
    padding: 30px;
">

    <h1>Panel privado</h1>

    <p>
        Bienvenido/a,
        <strong><?= htmlspecialchars($nombreUsuario, ENT_QUOTES, 'UTF-8') ?></strong>.
    </p>

    <p>
        Esta es la zona privada de aprendizaje. Aquí puedes acceder a los recursos y contenidos exclusivos para usuarios registrados.
    </p>

    <p>
        Has accedido porque tu sesión está activa.
    </p>

    <p>
        <strong>Usuario:</strong>
        <?= htmlspecialchars($nombreUsuario, ENT_QUOTES, 'UTF-8') ?>
    </p>

    <p>
        <strong>Rol:</strong>
        <?= htmlspecialchars($rolUsuario, ENT_QUOTES, 'UTF-8') ?>
    </p>

    <a href="logout.php">Cerrar sesión</a>

</body>

</html>