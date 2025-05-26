

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | My Delights</title>
    <link rel="stylesheet" href="estilo3.css">
</head>
<body>
    <div class="contenedor">
        <header class="header">
            <div class="logo">
                <p>My <span>Delights</span></p>
            </div>
            <div class="menu">
                <img src="menu.png" alt="Menú">
            </div>
            <nav class="menu1">
                <ul class="navegacion">
                    <li><a href="http://localhost/my_delights/index.html">Inicio</a></li>
                    <li><a href="#">Platos a la carta</a></li>
                    <li><a href="#">Platos Ejecutivos</a></li>
                    <li><a href="#">Eventos</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Iniciar Sesión</a><a href="login.php">Registrarse</a></li>
                </ul>
            </nav>
        </header>

        <aside class="presentacion">
            <!-- Contenedor formulario -->
            <div class="informacion">
                <form class="formulario-login" method="POST" action="procesar_registro.php">
                    <h2>Registro de Usuario</h2>

                    <?php if(isset($_GET['error'])): ?>
                        <div class="mensaje-error">Error en el registro. Verifique los datos</div>
                    <?php endif; ?>

                    <div class="campo-formulario">
                        <label for="nombre">Nombre completo:</label>
                        <input type="text" 
                               id="nombre" 
                               name="nombre" 
                               placeholder="Ingrese su nombre completo" 
                               pattern="[A-Za-záéíóúñÑ ]+" 
                               title="Solo letras y espacios" 
                               required>
                    </div>

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
                               placeholder="Cree una contraseña" 
                               minlength="8"
                               required>
                    </div>

                    <div class="campo-formulario">
                        <label for="tipo_cliente">Tipo de cliente:</label>
                        <select id="tipo_cliente" name="tipo_cliente" required>
                            <option value="">Seleccione tipo</option>
                            <option value="1">Nuevo</option>
                            <option value="2">Casual</option>
                            <option value="3">Permanente</option>
                        </select>
                    </div>

                    <button type="submit" class="boton-login">Registrarse</button>

                    <div class="enlace-registro">
                        ¿Ya tienes cuenta? <a href="login.php" class="enlace-login">Inicia sesión aquí</a>
                    </div>
                </form>
            </div>

            <!-- Contenedor imagen -->
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
