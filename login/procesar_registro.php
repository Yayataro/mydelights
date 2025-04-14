
<?php
session_start();
require 'includes/conexion_be.php';

// Verificar token CSRF (si lo implementaste)
if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    header("Location: registro.php?error=token");
    exit;
}

// Sanitizar y validar datos
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
$cedula = filter_input(INPUT_POST, 'cedula', FILTER_SANITIZE_STRING);
$password = $_POST['password'];
$tipo_cliente = filter_input(INPUT_POST, 'tipo_cliente', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1, 'max_range' => 3]
]);

// Validar datos requeridos
if (!$nombre || !$cedula || !$password || !$tipo_cliente) {
    header("Location: registro.php?error=datos");
    exit;
}

// Hashear la contraseña
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

try {
    // Verificar si la cédula ya existe
    $stmt = $db->prepare("SELECT cedula FROM usuarios WHERE cedula = ?");
    $stmt->execute([$cedula]);
    
    if ($stmt->fetch()) {
        header("Location: registro.php?error=cedula_existe");
        exit;
    }

    // Insertar nuevo usuario
    $stmt = $db->prepare("INSERT INTO usuarios (nombre, cedula, password, tipo_cliente) 
                         VALUES (?, ?, ?, ?)");
    
    $stmt->execute([$nombre, $cedula, $passwordHash, $tipo_cliente]);
    
    // Registro exitoso
    header("Location: login.php?registro=exito");
    exit;

} catch(PDOException $e) {
    error_log("Error en registro: " . $e->getMessage());
    header("Location: registro.php?error=servidor");
    exit;
}
?>