<?php
$errores = [];
$datos = [
    'nombre' => '',
    'email' => '',
    'edad' => '',
    'perfil' => ''
];
$enviadoConExito = false;
// Elimina espacios sobrantes al principio y al final.
function limpiarEntrada($texto)
{
    return trim($texto);
}
// Convierte caracteres especiales al mostrar datos en HTML.
function escaparHTML($texto)
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}
// Solo procesamos los datos cuando se envía el formulario.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos['nombre'] = limpiarEntrada($_POST['nombre'] ?? '');
    $datos['email'] = limpiarEntrada($_POST['email'] ?? '');
    $datos['edad'] = limpiarEntrada($_POST['edad'] ?? '');
    $datos['perfil'] = limpiarEntrada($_POST['perfil'] ?? '');
    // Nombre obligatorio: al menos 3 caracteres.
    if ($datos['nombre'] === '') {
        $errores['nombre'] = 'El nombre es obligatorio.';
    } elseif (strlen($datos['nombre']) < 3) {
        $errores['nombre'] = 'Escribe al menos 3 caracteres.';
    }
    // Correo obligatorio y con formato válido.
    if ($datos['email'] === '') {
        $errores['email'] = 'El correo es obligatorio.';
    } elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'Introduce un correo válido.';
    }
    // Edad entera entre 16 y 99.
    $edadValidada = filter_var(
        $datos['edad'],
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 16, 'max_range' => 99]]
    );
    if ($datos['edad'] === '') {
        $errores['edad'] = 'La edad es obligatoria.';
    } elseif ($edadValidada === false) {
        $errores['edad'] = 'Introduce una edad entera de 16 a 99.';
    }
    // Solo se aceptan los perfiles definidos.
    $perfilesValidos = ['estudiante', 'profesional', 'empresa', 'docente'];
    if (!in_array($datos['perfil'], $perfilesValidos, true)) {
        $errores['perfil'] = 'Selecciona un perfil válido.';
    }
    if (empty($errores)) {
        $enviadoConExito = true;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de usuario - DWES</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 25px;
        }

        .card {
            max-width: 480px;
            margin: auto;
            background: white;
            padding: 24px;
            border-radius: 9px;
        }

        .campo {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 9px;
            box-sizing: border-box;
        }

        .input-error {
            border: 2px solid #c62828;
        }

        .texto-error {
            color: #c62828;
            font-size: 13px;
        }

        .exito {
            background: #e4f5e6;
            padding: 15px;
        }

        button {
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Registro de alumnos DWES</h2>
        <?php if ($enviadoConExito): ?>
            <div class="exito">
                <h3>¡Formulario validado correctamente!</h3>
                <p>Bienvenido/a,
                    <?= escaparHTML($datos['nombre']) ?>.</p>
                <p>Correo:
                    <?= escaparHTML($datos['email']) ?></p>
                <p>Esta actividad no guarda usuarios ni envía correos.</p>
            </div>
        <?php else: ?>
            <form action="registro.php" method="POST" novalidate>
                <div class="campo">
                    <label for="nombre">Nombre completo:</label>
                    <input type="text" id="nombre" name="nombre"
                        value="<?= escaparHTML($datos['nombre']) ?>"
                        class="<?= isset($errores['nombre']) ? 'input-error' : '' ?>">
                    <?php if (isset($errores['nombre'])): ?>
                        <div class="texto-error"><?= $errores['nombre'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="campo">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email"
                        value="<?= escaparHTML($datos['email']) ?>"
                        class="<?= isset($errores['email']) ? 'input-error' : '' ?>">
                    <?php if (isset($errores['email'])): ?>
                        <div class="texto-error"><?= $errores['email'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="campo">
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad"
                        value="<?= escaparHTML($datos['edad']) ?>"
                        class="<?= isset($errores['edad']) ? 'input-error' : '' ?>">
                    <?php if (isset($errores['edad'])): ?>
                        <div class="texto-error"><?= $errores['edad'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="campo">
                    <label for="perfil">Perfil profesional:</label>
                    <select id="perfil" name="perfil"
                        class="<?= isset($errores['perfil']) ? 'input-error' : '' ?>">
                        <option value="">-- Selecciona --</option>
                        <option value="estudiante"
                            <?= $datos['perfil'] === 'estudiante' ? 'selected' :
                                '' ?>>
                            Estudiante
                        </option>
                        <option value="profesional"
                            <?= $datos['perfil'] === 'profesional' ? 'selected' :
                                '' ?>>
                            Profesional
                        </option>
                        <option value="empresa"
                            <?= $datos['perfil'] === 'empresa' ? 'selected' : '' ?>>
                            Empresa
                        </option>
                        <option value="docente"
                            <?= $datos['perfil'] === 'docente' ? 'selected' : '' ?>>
                            Docente
                        </option>
                    </select>
                    <?php if (isset($errores['perfil'])): ?>
                        <div class="texto-error"><?= $errores['perfil'] ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit">Completar registro</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>