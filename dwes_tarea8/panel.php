<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'] ?? 'Sin rol';
$color = $_COOKIE['color_fondo'] ?? '#f3e8ff';
$coloresPermitidos = ['#f3e8ff', '#d1ecf1'];
if (!in_array($color, $coloresPermitidos, true)) {
    $color = '#e9ecef';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi espacio de aprendizaje</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
            color: #243047
        }

        .card {
            max-width: 480px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 9px #0002
        }

        input,
        select {
            width: 100%;
            box-sizing: border-box;
            padding: 9px;
            margin: 8px 0 16px
        }

        button,
        .btn {
            background: #2369a8;
            color: white;
            border: 0;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer
        }

        .error {
            color: #b00020
        }

        .note {
            color: #2862a3
        }
    </style>
</head>

<body style="background: <?= htmlspecialchars($color, ENT_QUOTES, 'UTF-8') ?>">
    <main class="card">
        <h1>Mi espacio de aprendizaje</h1>
        <p>Bienvenida de nuevo, <strong><?= htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8') ?></strong>.</p>
        <p>Rol: <strong><?= htmlspecialchars($rol, ENT_QUOTES, 'UTF-8') ?></strong></p>
        <!-- BLOQUE B: COLOR (opción B): coloca aquí el formulario de preferencia si corresponde -->
        <p><a class="btn" href="logout.php">Cerrar sesión</a></p>
    </main>
</body>

</html>