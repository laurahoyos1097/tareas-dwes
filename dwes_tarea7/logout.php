
<?php
session_start();

// Vaciar las variables de sesión.
$_SESSION = [];

// Borrar la cookie que identifica la sesión.
// No eliminamos la cookie nombre_recordado.
if (ini_get('session.use_cookies')) {

    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 3600,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// Destruir la sesión.
session_destroy();

// Volver al formulario de acceso.
header('Location: login.php');
exit();
