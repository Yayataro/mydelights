
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | My Delights</title>
    <link rel="stylesheet" href="estilo2.css">
</head>
<body>
    <div class="contenedor"> <!-- corregido -->
        <header class="header">
            <div class="logo">
                <p> My <span>Delights</span></p>
            </div>
            <div class="menu">
                <img src="/my_delights/assets/img/menu.png" alt="menu">
            </div>
            <nav class="menu1">
                <ul class="navegacion">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Platos a la carta</a></li>
                    <li><a href="#">Platos Ejecutivos</a></li>
                    <li><a href="#">Eventos</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Iniciar Sesión</a> <a href="#">Registrarse</a></li>
                </ul>
            </nav>
        </header>

        <aside class="presentacion">
            <div class="informacion">
                <form class="formulario-login" method="POST" action="validar_be.php">
                    <h2>Iniciar Sesión</h2>

                    <?php if(isset($_GET['error'])): ?>
                        <div class="mensaje-error">Credenciales incorrectas</div>
                    <?php endif; ?>

                    <div class="campo-formulario">
                        <label for="cedula">Número de Cédula:</label>
                        <input type="text" 
                               id="cedula" 
                               name="cedula" 
                               placeholder="Ingrese su cédula" 
                               pattern="[0-9]{6,12}" 
                               title="Solo números, 6 a 12 dígitos"
                               required>
                    </div>

                    <div class="campo-formulario">
                        <label for="password">Contraseña:</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="Ingrese su contraseña" 
                               minlength="8"
                               required>
                    </div>

                    <input type="hidden" name="csrf_token" value="<?php echo generarTokenCSRF(); ?>">
                    <button type="submit" class="boton-login">Ingresar</button>

                    <div class="enlace-registro">
                        ¿No tienes cuenta? <a href="registrar.php">Regístrate aquí</a>
                    </div>
                </form>
            </div>

            <div class="presentacion--imagen">
                <img src="logo.png" alt="Imagen presentación">
            </div>
        </aside>

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
    </div>
</body>
</html>
