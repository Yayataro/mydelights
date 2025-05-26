

<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'php/conexion_be.php';

// Verificar token CSRF


// Sanitizar inputs
$cedula = filter_input(INPUT_POST, 'cedula', FILTER_SANITIZE_STRING);
$password = $_POST['password'];

// Limitar intentos
if (!isset($_SESSION['intentos'])) $_SESSION['intentos'] = 0;
if ($_SESSION['intentos'] >= 3) {
    error_log("Bloqueo por intentos - Cédula: $cedula");
    die("Cuenta temporalmente bloqueada. Inténtalo más tarde.");
}



try {
    $stmt = $db->prepare("SELECT id, Nombre FROM usuarios WHERE cedula = ? AND password = ?");
    $stmt->execute([$cedula, $password]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    print_r($usuario);

    if ($usuario && $password) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['Nombre'];
        $_SESSION['intentos'] = 0; // Resetear contador
        header('Location: php/segundaria/segundaria.php');
        exit();
    } else {
        $_SESSION['intentos']++;
        header('Location: login.php?error=credenciales');
        exit();
    }
} catch(PDOException $e) {
    echo error_log("Error de login: " . $e->getMessage());
    //header('Location: login.php?error=sistema');
    exit();
}
?>
