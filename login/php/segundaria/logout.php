

<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión completamente
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

// Redireccionar a la página principal
header("Location: http://localhost/my_delights/login/login.php"); // Cambia index.php por tu página de inicio
exit();
?>