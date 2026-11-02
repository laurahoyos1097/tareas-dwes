<?php
session_start();

$error = '';
$usuarioRecordado = $_COOKIE['nombre_recordado'] ?? '';

// Si ya hay una sesión activa, vamos directamente al panel.
if (isset($_SESSION['usuario'])) {
    header('Location: panel.php');
    exit();
}

// Procesamos el formulario cuando se envía mediante POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = trim($_POST['usuario'] ?? '');
    $clave = $_POST['clave'] ?? '';

    // Conservamos el usuario aunque el acceso sea incorrecto.
    $usuarioRecordado = $usuario;

    // Comprobamos las credenciales de demostración.
    if ($usuario === 'admin' && $clave === 'DWES2026!') {

        session_regenerate_id(true);

        // Guardamos los datos en la sesión.
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = 'estudiante';

        // Recordamos el nombre durante 30 días.
        setcookie('nombre_recordado', $usuario, time() + 86400 * 30, '/');

        header('Location: panel.php');
        exit();
    } else {
        $error = 'Usuario o contraseña incorrectos.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Acceso al aula virtual DWES</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

        .box {
            max-width: 390px;
            margin: auto;
            background: white;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 10px #ddd;
        }

        input {
            display: block;
            width: 100%;
            padding: 9px;
            margin: 6px 0 14px;
            box-sizing: border-box;
        }

        .error {
            color: #b00020;
        }

        button {
            padding: 10px 20px;
            background: #167447;
            color: white;
            border: 0;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="box">

        <h1>Acceso DWES</h1>

        <?php if ($usuarioRecordado !== ''): ?>
            <p>
                Hola de nuevo,
                <?= htmlspecialchars($usuarioRecordado, ENT_QUOTES, 'UTF-8') ?>.
            </p>
        <?php endif; ?>

        <?php if ($error !== ''): ?>
            <p class="error">
                <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
            </p>
        <?php endif; ?>

        <form action="login.php" method="POST">

            <label for="usuario">Usuario</label>
            <input
                id="usuario"
                name="usuario"
                type="text"
                value="<?= htmlspecialchars($usuarioRecordado, ENT_QUOTES, 'UTF-8') ?>"
                required>

            <label for="clave">Contraseña</label>
            <input
                id="clave"
                name="clave"
                type="password"
                required>

            <button type="submit">Entrar</button>

        </form>

    </div>

</body>

</html>