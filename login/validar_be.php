

<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'includes/conexion_be.php';

$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "rootpass";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}



// Verificar token CSRF
if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    error_log("Intento de CSRF desde IP: " . $_SERVER['REMOTE_ADDR']);
    die("Acceso no autorizado");
}

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
    $stmt = $db->prepare("SELECT id, password FROM usuarios WHERE cedula = ?");
    $stmt->execute([$cedula]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['intentos'] = 0; // Resetear contador
        header('Location: segundaria/segundaria.php');
        exit();
    } else {
        $_SESSION['intentos']++;
        header('Location: login.php?error=credenciales');
        exit();
    }
} catch(PDOException $e) {
    error_log("Error de login: " . $e->getMessage());
    header('Location: login.php?error=sistema');
    exit();
}
?>
