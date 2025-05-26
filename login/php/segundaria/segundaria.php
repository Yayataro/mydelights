<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="segundaria.css">
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
                    <li><a href="logout.php">Cerrar sesion</a><a href="segundaria/logout.php">Comprar</a></li>
                </ul>
        
            </nav>
         
        </header>
        <span>Bienvenido, <?php echo $_SESSION['nombre']?></span>
        <aside class="presentacion">
            <div class="informacion">
                <h1>TU COMIDA FAVORITA MAS CERCA</h1>
                <div>
                    <p>Bienvenido a My Delights, para nosotros es un gusto</p>
                    <p>estar mas cerca de ti y llevar nuestra cocina a tu hogar</p>
                </div>
            </div>
            <div class="presentacion--imagen">
                <img src="logo.png" alt="Imagen presentacion">
            </div>
        </aside>
    </div>
    <table class="tabla-compras">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Valor Unitario</th>
                <th>Cantidad</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            <!-- Fila 1 -->
            <tr data-price="25300">
                <td>Pollo Gratinado</td>
                <td>$25,300</td>
                <td>
                    <select class="cantidad-select" onchange="calcularTotal(this)">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td class="valor-total">$0</td>
            </tr>

            <!-- Fila 2 -->
            <tr data-price="22000">
                <td>Arroz Atollado</td>
                <td>22,000</td>
                <td>
                    <select class="cantidad-select" onchange="calcularTotal(this)">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td class="valor-total">$0</td>
            </tr>

            <!-- Fila 3 -->
            <tr data-price="35000">
                <td>Cordon Bleu</td>
                <td>$35,000</td>
                <td>
                    <select class="cantidad-select" onchange="calcularTotal(this)">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td class="valor-total">$0</td>
            </tr>

            <!-- Fila 4 -->
            <tr data-price="13500">
                <td>Frijoles con Pechuga</td>
                <td>$13,500</td>
                <td>
                    <select class="cantidad-select" onchange="calcularTotal(this)">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td class="valor-total">$0</td>
            </tr>

            <!-- Fila 5 -->
            <tr data-price="13000">
                <td>Plato de carne con sopa de ahuyama</td>
                <td>$13,000</td>
                <td>
                    <select class="cantidad-select" onchange="calcularTotal(this)">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td class="valor-total">$0</td>
            </tr>

            <!-- Fila 6 -->
            <tr data-price="16000">
                <td>Chuleta con Frijoles</td>
                <td>$16,000</td>
                <td>
                    <select class="cantidad-select" onchange="calcularTotal(this)">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td class="valor-total">$0</td>
            </tr>

            <!-- Fila 7 -->
            <tr data-price="6000">
                <td>Juego del dia</td>
                <td>$6,000</td>
                <td>
                    <select class="cantidad-select" onchange="calcularTotal(this)">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td class="valor-total">$0</td>
            </tr>

            <!-- Fila Total -->
            <tr class="total-general">
                <td colspan="3">Subtotal</td>
                <td id="total-compra">$0</td>
            </tr>
        </tbody>
    </table>

    <script>
        function calcularTotal(selectElement) {
            const row = selectElement.closest('tr');
            const price = parseInt(row.getAttribute('data-price'));
            const quantity = parseInt(selectElement.value);
            const totalCell = row.querySelector('.valor-total');
            
            const total = price * quantity;
            totalCell.textContent = `$${total.toLocaleString()}`;
            
            actualizarTotalGeneral();
        }

        function actualizarTotalGeneral() {
            const totales = document.querySelectorAll('.valor-total');
            let sumaTotal = 0;
            
            totales.forEach(cell => {
                const valor = parseInt(cell.textContent.replace(/\D/g, '')) || 0;
                sumaTotal += valor;
            });
            
            document.getElementById('total-compra').textContent = `$${sumaTotal.toLocaleString()}`;
        }
    </script>
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

