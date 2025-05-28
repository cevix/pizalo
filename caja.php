<!DOCTYPE html>
<html lang="es">
<head>

    <!--      Introducir  BigDecimal en el proyecto       -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caja</title>
    <link rel="icon" type="image/png" href="favicon/favicon.png">
    <link rel="stylesheet" href="styleCaja.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <header class="header">
        <div class="container header-container">
            <h1 class="logo">Pizalo</h1>
            <div class="header-buttons">
                <a class="btn btn-white" href="index.php" >Volver a Pedidos</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container main-content">
        <form id="direccionForm" method="post" action="guardarPedido.php" class="direccion-form">
            <div class="caja-grid">
            <!-- Columna izquierda: Formulario y Productos -->
            <div class="caja-left">
                <!-- Formulario de dirección -->
                <div class="section-card">
                    <h2 class="section-title">Datos de entrega</h2>
                    
                        <div id="selectForm" class="form-row">
                            <div class="form-group">
                                <label for="tipoEntrega">Tipo de entrega</label>
                                <select id="tipoEntrega" name="tipoEntrega" class="form-control">
                                    <option value="domicilio">Entrega a domicilio</option>
                                    <option value="recoger">Recoger en tienda</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="number" id="telefono" name="telefono" class="form-control"  pattern="[0-9]{9}"title="Introduce un numero de telefono valido" placeholder="Ej: 612345678" required>
                            </div>
                        </div>

                        <div id="datosEntrega">
                            <div class="form-row">
                                <div class="form-group form-group-lg">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" id="direccion" name="direccion" maxlength="60" class="form-control" placeholder="Introduce av/dirreccion" >
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="numero">Número</label>
                                    <input type="text" id="numero" name="numero"  max="999" class="form-control" placeholder="Nº" >
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="bloque">Bloque/Portal</label>
                                    <input type="text" id="bloque" name="bloque" maxlength="10" class="form-control" placeholder="Bloque/Portal">
                                </div>
                                <div class="form-group">
                                    <label for="piso">Piso</label>
                                    <input type="text" id="piso" name="piso" maxlength="10" class="form-control" placeholder="Piso">
                                </div>
                                <div class="form-group">
                                    <label for="puerta">Puerta</label>
                                    <input type="text" id="puerta" name="puerta" maxlength="10" class="form-control" placeholder="Puerta">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Informacion">Informacion del pedido (opcional)</label>
                                <input type="text" id="informacion" name="informacion" maxlength="100" class="form-control" placeholder="Ej: Frente al parque">
                            </div>
                        </div>

                        <div id="clientName" class="form-group">
                            <label for="cliente">Nombre del cliente</label>
                            <input type="cliente" id="cliente" name="cliente" maxlength="80" class="form-control" placeholder="Ingrese el nombre del cliente" required>
                        </div>
                    
                </div>

                <!-- Catálogo de productos -->
                <div class="section-card">
                    <h2 class="section-title">Productos</h2>
                    
                    <div class="product-tabs">
                        <div class="product-tab active" data-tab="pizzas">Pizzas</div>
                        <div class="product-tab" data-tab="complementos">Complementos</div>
                        <div class="product-tab" data-tab="bebidas">Bebidas</div>
                        <div class="product-tab" data-tab="postres">Postres</div>
                    </div>
                    
                    <div class="product-content active" id="pizzas">
                        <div class="product-grid">
                            <div class="product-card" data-id="p1" data-name="Barbacoa" data-price="12.95">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>Barbacoa</h3>
                                    <p>Salsa barbacoa, carne, bacon, cebolla</p>
                                    <div class="product-price">12.95€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="p2" data-name="Carbonara" data-price="11.95">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>Carbonara</h3>
                                    <p>Nata, bacon, champiñones</p>
                                    <div class="product-price">11.95€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="p3" data-name="4 Quesos" data-price="12.50">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>4 Quesos</h3>
                                    <p>Mozzarella, gorgonzola, emmental, parmesano</p>
                                    <div class="product-price">12.50€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="p4" data-name="Hawaiana" data-price="11.50">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>Hawaiana</h3>
                                    <p>Jamón york, piña</p>
                                    <div class="product-price">11.50€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="p5" data-name="Pepperoni" data-price="11.95">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>Pepperoni</h3>
                                    <p>Pepperoni, mozzarella</p>
                                    <div class="product-price">11.95€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="p6" data-name="Vegetal" data-price="12.50">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>Vegetal</h3>
                                    <p>Pimiento, cebolla, champiñones, aceitunas</p>
                                    <div class="product-price">12.50€</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-content" id="complementos">
                        <div class="product-grid">
                            <div class="product-card" data-id="c1" data-name="Patatas Fritas" data-price="3.95">
                                <div class="product-img">🍟</div>
                                <div class="product-info">
                                    <h3>Patatas Fritas</h3>
                                    <p>Patatas fritas crujientes</p>
                                    <div class="product-price">3.95€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="c2" data-name="Alitas de Pollo" data-price="5.95">
                                <div class="product-img">🍗</div>
                                <div class="product-info">
                                    <h3>Alitas de Pollo</h3>
                                    <p>6 unidades con salsa barbacoa</p>
                                    <div class="product-price">5.95€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="c3" data-name="Pan de Ajo" data-price="2.95">
                                <div class="product-img">🥖</div>
                                <div class="product-info">
                                    <h3>Pan de Ajo</h3>
                                    <p>Con mantequilla de ajo y hierbas</p>
                                    <div class="product-price">2.95€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="c4" data-name="Nuggets" data-price="4.95">
                                <div class="product-img">🍗</div>
                                <div class="product-info">
                                    <h3>Nuggets</h3>
                                    <p>8 unidades de pollo empanado</p>
                                    <div class="product-price">4.95€</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-content" id="bebidas">
                        <div class="product-grid">
                            <div class="product-card" data-id="b1" data-name="Coca-Cola 2L" data-price="3.50">
                                <div class="product-img">🥤</div>
                                <div class="product-info">
                                    <h3>Coca-Cola 2L</h3>
                                    <p>Botella de 2 litros</p>
                                    <div class="product-price">3.50€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="b2" data-name="Fanta Naranja 2L" data-price="3.50">
                                <div class="product-img">🥤</div>
                                <div class="product-info">
                                    <h3>Fanta Naranja 2L</h3>
                                    <p>Botella de 2 litros</p>
                                    <div class="product-price">3.50€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="b3" data-name="Agua 1L" data-price="1.95">
                                <div class="product-img">💧</div>
                                <div class="product-info">
                                    <h3>Agua 1L</h3>
                                    <p>Botella de 1 litro</p>
                                    <div class="product-price">1.95€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="b4" data-name="Cerveza" data-price="2.50">
                                <div class="product-img">🍺</div>
                                <div class="product-info">
                                    <h3>Cerveza</h3>
                                    <p>Lata de 33cl</p>
                                    <div class="product-price">2.50€</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-content" id="postres">
                        <div class="product-grid">
                            <div class="product-card" data-id="d1" data-name="Helado Chocolate" data-price="3.95">
                                <div class="product-img">🍨</div>
                                <div class="product-info">
                                    <h3>Helado Chocolate</h3>
                                    <p>Tarrina individual</p>
                                    <div class="product-price">3.95€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="d2" data-name="Brownie" data-price="4.50">
                                <div class="product-img">🍫</div>
                                <div class="product-info">
                                    <h3>Brownie</h3>
                                    <p>Con nueces y chocolate caliente</p>
                                    <div class="product-price">4.50€</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Columna derecha: Resumen del pedido -->
            <div class="caja-right">
                <div class="section-card order-summary">
                    <h2 class="section-title">Resumen del pedido</h2>
                    
                    <div class="order-items" id="orderItems">
                        <div class="empty-cart">
                            <p>No hay productos en el pedido</p>
                            <p>Selecciona productos del catálogo</p>
                        </div>
                    </div>
                    
                    <div class="order-totals">
                        <div class="total-row">
                            <span>Subtotal:</span>
                            <span id="subtotal">0.00€</span>
                        </div>
                        <div class="total-row">
                            <span>Gastos de envío:</span>
                            <span id="envio">1.50€</span>
                        </div>
                        <div class="total-row total-final">
                            <span>TOTAL:</span>
                            <span id="total">1.50€</span>
                            <div style="display: none;">
                                <input type="text" id="precioTotal" name="precioTotal">
                            </div>
                        </div>
                    </div>
                    
                    <div class="payment-methods">
                        <h3>Método de pago</h3>
                        <div class="payment-options">
                            <label class="payment-option">
                                <input type="radio" name="paymentMethod" value="datafono" checked>
                                <span class="payment-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card-icon lucide-credit-card"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
                                    Datáfono
                                </span>
                            </label>
                            <label class="payment-option">
                                <input type="radio" name="paymentMethod" value="efectivo">
                                <span class="payment-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-banknote-icon lucide-banknote"><rect width="20" height="12" x="2" y="6" rx="2"/><circle cx="12" cy="12" r="2"/><path d="M6 12h.01M18 12h.01"/></svg>
                                    Efectivo
                                </span>
                            </label>
                        </div>
                        
                        <div id="cambioContainer" class="cambio-container" style="display: none;">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="importeEfectivo">Paga con</label>
                                    <input type="number" id="importeEfectivo" name="importeEfectivo" pattern="[0-9]{2}"  class="form-control" placeholder="0.00" min="0" step="0.01">
                                </div>
                                <div class="form-group">
                                    <label for="cambio">Cambio</label>
                                    <input type="text" id="cambio" name="cambio" class="form-control"  placeholder="0.00" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <input id="finalizarPedido" class="btn-finalizar" type="submit" value="Finalizar pedido">
                </div>
            </div>
            
        </div>
        </form>
    </main>

    <!-- Modal de confirmación -->
    
    <?php 
    if (isset($_GET['codigo'])) {
       $codigo=$_GET['codigo'];
       echo "<div id='confirmModal' class='modalInfo show'>
        <div class='contenedorInfo'>
            <button id='closeConfirmModalBtn' class='botonCerrarInfo'>X</button>
            
            <div class='contenedorMensaje'>
                <h2 class='modal-title'>Pedido completado</h2>
                
                <div class='confirm-content'>
                    <div class='confirm-icon'>✓</div>
                    <p>El pedido se ha registrado correctamente</p>
                    <p>Número de pedido: <strong id='orderNumber'>$codigo</strong></p>
                </div>
                
                <div class='confirm-actions'>
                    
                    <a href='index.php' id='newOrderBtn' class='btn-action'>
                        Volver a Pedidos
                    </a>
                </div>
            </div>
        </div>
    </div>";
    }



    ?>

    


    <script type="text/javascript" src="scriptCaja.js"></script>


    
</body>
</html>
