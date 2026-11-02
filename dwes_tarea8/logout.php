<?php
session_start();
$_SESSION = [];
// También borramos la cookie que transporta el identificador de sesión.
if (ini_get('session.use_cookies')) {
    $p = session_get_cookie_params();
    setcookie(session_name(), '', time() - 3600, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
}
session_destroy();
// No borramos nombre_recordado: solo recuerda el nombre, no da acceso.
header('Location: login.php');
exit();
