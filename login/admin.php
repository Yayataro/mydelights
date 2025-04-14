

<!DOCTYPE html>
<html lang="es">
<?php
require 'php/conexion_be.php';
$stmt = $db->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estiloadmin.css">
</head>
<body>
    <div class="cotendeor">
        <header class="header">
            <div class="logo">
                <p> My <span> Delights</span></p>
            </div>
            <div class="menu">
                <img src="menu.png" alt="menu">
            </div>
            <nav class="menu1">
                <ul class="navegacion">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Platos a la carta</a></li>
                    <li><a href="#">Platos Ejecutivos</a></li>
                    <li><a href="#">Eventos</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Iniciar Sesión</a><a href="segundaria/">Comprar</a></li>
                </ul>
            </nav>
        </header>
        <aside class="presentacion">
            <div class="informacion">
                <h1>Vista de Adiministrador</h1>
                <div>
                    <p>Bienvenido </p>
                    <p>puedes gestionar la base de datos de clientes</p>
                </div>
            </div>
            <div class="presentacion--imagen">
                <img src="logo.png" alt="Imagen presentacion">
            </div>
        </aside>
        
    </div>
    <!-- TABLA CRUD -->
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Contraseña</th>
                <th>Tipo de Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                <td><?= htmlspecialchars($usuario['cedula']) ?></td>
                <td><?= htmlspecialchars($usuario['password']) ?></td>
                <td><?= htmlspecialchars($usuario['tipo_cliente']) ?></td>
                <td>
                    <button>Editar</button>
                    <button>Eliminar</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- BOTONES CRUD GENERALES -->
    <div style="margin-top: 20px; display: flex; gap: 15px;">
        <button class="editar">Agregar Cliente</button>
        <button class="editar">Editar Cliente</button>
        <button class="eliminar">Eliminar Cliente</button>
    </div>

    <footer class="footer">
        <div class="footer-contenido">
            <div class="footer-seccion">
                <h3>Dirección</h3>
                <address>
                    Calle 123 #45-67<br>
                    Norte de Bogotá<br>
                    Colombia
                </address>
            </div>
            <div class="footer-seccion">
                <h3>Teléfono</h3>
                <p><a href="tel:+573001234567">+57 300 123 4567</a></p>
            </div>
        </div>
        <div class="footer-copyright">
            <p>&copy; 2025 My Delights. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>