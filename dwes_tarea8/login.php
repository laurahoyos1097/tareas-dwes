<?php
session_start();
$error = '';
$usuarioRecordado = $_COOKIE['nombre_recordado'] ?? '';
$usuarioFormulario = $usuarioRecordado;
// Contraseña de demostración: "1234". En un proyecto real el hash estaría almacenado en una base de datos.
$hashDemo = password_hash('DWES2026!', PASSWORD_DEFAULT);
if (isset($_SESSION['usuario'])) {
    header('Location: panel.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $clave = $_POST['clave'] ?? '';
    $usuarioFormulario = $usuario;
    // COMPLETA A1: usa === y password_verify() para comprobar usuario admin y clave.
    // PISTA: ($usuario === 'admin' && password_verify($clave, $hashDemo))
    $accesoCorrecto = ($usuario === 'admin' && password_verify($clave, $hashDemo));
    if ($accesoCorrecto) {
        session_regenerate_id(true);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = 'Alumna DWES';
        setcookie('nombre_recordado', $usuario, time() + 86400 * 30, '/', '', false, true);
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
    <title>Acceso al sistema</title>
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

<body>
    <main class="card">
        <h1>Acceso al sistema</h1>
        <?php if ($usuarioRecordado !== ''): ?><p class="note">Bienvenida de nuevo, <?= htmlspecialchars($usuarioRecordado, ENT_QUOTES, 'UTF-8') ?>.</p><?php endif; ?>
        <?php if ($error !== ''): ?><p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
        <form action="login.php" method="post"><label>Usuario<input name="usuario" value="<?= htmlspecialchars($usuarioFormulario, ENT_QUOTES, 'UTF-8') ?>" required></label><label>Contraseña<input type="password" name="clave" required></label><button type="submit">Entrar</button></form>
        <p>Esta práctica utiliza credenciales de demostración, no cuentas reales.</p>
    </main>
</body>

</html>