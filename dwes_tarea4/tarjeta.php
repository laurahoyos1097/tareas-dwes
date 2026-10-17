<?php
$nombreCompleto = "Laura Hoyos";
$puesto = "Estudiante";
$email = "lyncus3@digitechfp.com";
$experienciaAnos = 3;
$especialidad = "DAW/DAM";
const CENTRO = "Digitech FP";
$fechaActual = date("d/m/Y");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Perfil profesional</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            padding: 30px;
        }

        .card {
            max-width: 420px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, .12);
        }
    </style>
</head>

<body>
    <div class="card">
        <h1><?= $nombreCompleto ?></h1>
        <p><strong>Puesto:</strong> <?= $puesto ?></p>
        <p><strong>Correo:</strong> <?= $email ?></p>
        <p><strong>Experiencia:</strong> <?= $experienciaAnos ?> años</p>
        <p><strong>Centro:</strong> <?= CENTRO ?></p>
        <p><strong>Especialidad:</strong> <?= $especialidad ?></p>
        <hr>
        <small>Ficha generada el <?= $fechaActual ?></small>
        <br>
        <small><?php echo "Perfil generado con PHP"; ?></small>
    </div>
</body>

</html>