<!DOCTYPE html>
<html lang="es">
<head>

    <!--      Introducir  BigDecimal en el proyecto para evitar errores al calcular el cambio de floats         -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caja</title>
    <link rel="stylesheet" href="styleCajero.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <header class="header">
        <div class="container header-container">
            <h1 class="logo">Telepizza</h1>
            <div class="header-buttons">
                <a class="btn btn-white" href="index.php" >Volver a Pedidos</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container main-content">
        <div class="caja-grid">
            <!-- Columna izquierda: Formulario y Productos -->
            <div class="caja-left">
                <!-- Formulario de dirección -->
                <div class="section-card">
                    <h2 class="section-title">Datos de entrega</h2>
                    <form id="direccionForm" class="direccion-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="tipoEntrega">Tipo de entrega</label>
                                <select id="tipoEntrega" class="form-control">
                                    <option value="domicilio">Entrega a domicilio</option>
                                    <option value="recoger">Recoger en tienda</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" id="telefono" class="form-control" placeholder="Ej: 612345678" required>
                            </div>
                        </div>

                        <div id="datosEntrega">
                            <div class="form-row">
                                <div class="form-group form-group-lg">
                                    <label for="calle">Calle</label>
                                    <input type="text" id="calle" class="form-control" placeholder="Nombre de la calle" required>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="numero">Número</label>
                                    <input type="text" id="numero" class="form-control" placeholder="Nº" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="bloque">Bloque/Portal</label>
                                    <input type="text" id="bloque" class="form-control" placeholder="Bloque/Portal">
                                </div>
                                <div class="form-group">
                                    <label for="piso">Piso</label>
                                    <input type="text" id="piso" class="form-control" placeholder="Piso">
                                </div>
                                <div class="form-group">
                                    <label for="puerta">Puerta</label>
                                    <input type="text" id="puerta" class="form-control" placeholder="Puerta">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="referencia">Punto de referencia (opcional)</label>
                                <input type="text" id="referencia" class="form-control" placeholder="Ej: Frente al parque">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre del cliente</label>
                            <input type="text" id="nombre" class="form-control" placeholder="Nombre completo" required>
                        </div>
                    </form>
                </div>

                <!-- Catálogo de productos -->
                <div class="section-card">
                    <h2 class="section-title">Productos</h2>
                    
                    <div class="product-tabs">
                        <button class="product-tab active" data-tab="pizzas">Pizzas</button>
                        <button class="product-tab" data-tab="complementos">Complementos</button>
                        <button class="product-tab" data-tab="bebidas">Bebidas</button>
                        <button class="product-tab" data-tab="postres">Postres</button>
                    </div>
                    
                    <div class="product-content active" id="pizzas">
                        <div class="product-grid">
                            <div class="product-card" data-id="p1" data-name="Pizza Barbacoa" data-price="12.95">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>Pizza Barbacoa</h3>
                                    <p>Salsa barbacoa, carne, bacon, cebolla</p>
                                    <div class="product-price">12.95€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="p2" data-name="Pizza Carbonara" data-price="11.95">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>Pizza Carbonara</h3>
                                    <p>Nata, bacon, champiñones</p>
                                    <div class="product-price">11.95€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="p3" data-name="Pizza 4 Quesos" data-price="12.50">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>Pizza 4 Quesos</h3>
                                    <p>Mozzarella, gorgonzola, emmental, parmesano</p>
                                    <div class="product-price">12.50€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="p4" data-name="Pizza Hawaiana" data-price="11.50">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>Pizza Hawaiana</h3>
                                    <p>Jamón york, piña</p>
                                    <div class="product-price">11.50€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="p5" data-name="Pizza Pepperoni" data-price="11.95">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>Pizza Pepperoni</h3>
                                    <p>Pepperoni, mozzarella</p>
                                    <div class="product-price">11.95€</div>
                                </div>
                            </div>
                            <div class="product-card" data-id="p6" data-name="Pizza Vegetal" data-price="12.50">
                                <div class="product-img">🍕</div>
                                <div class="product-info">
                                    <h3>Pizza Vegetal</h3>
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
                        </div>
                    </div>
                    
                    <div class="payment-methods">
                        <h3>Método de pago</h3>
                        <div class="payment-options">
                            <label class="payment-option">
                                <input type="radio" name="paymentMethod" value="datafono" checked>
                                <span class="payment-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                                        <line x1="2" y1="10" x2="22" y2="10"></line>
                                    </svg>
                                    Datáfono
                                </span>
                            </label>
                            <label class="payment-option">
                                <input type="radio" name="paymentMethod" value="efectivo">
                                <span class="payment-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <path d="M6 12h.01M18 12h.01"></path>
                                    </svg>
                                    Efectivo
                                </span>
                            </label>
                        </div>
                        
                        <div id="cambioContainer" class="cambio-container" style="display: none;">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="importeEfectivo">Paga con</label>
                                    <input type="number" id="importeEfectivo" class="form-control" placeholder="0.00" min="0" step="0.01">
                                </div>
                                <div class="form-group">
                                    <label for="cambio">Cambio</label>
                                    <input type="text" id="cambio" class="form-control" placeholder="0.00" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button id="finalizarPedido" class="btn-finalizar">
                        Finalizar pedido
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal de confirmación -->
    <div id="confirmModal" class="modal-overlay">
        <div class="modal-container">
            <button id="closeConfirmModalBtn" class="close-modal-btn">X</button>
            
            <div class="modal-content">
                <h2 class="modal-title">Pedido completado</h2>
                
                <div class="confirm-content">
                    <div class="confirm-icon">✓</div>
                    <p>El pedido se ha registrado correctamente</p>
                    <p>Número de pedido: <strong id="orderNumber">506</strong></p>
                </div>
                
                <div class="confirm-actions">
                    <button id="printOrderBtn" class="btn-action">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 6 2 18 2 18 9"></polyline>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                            <rect x="6" y="14" width="12" height="8"></rect>
                        </svg>
                        Imprimir ticket
                    </button>
                    <button id="newOrderBtn" class="btn-action">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Nuevo pedido
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="scriptCajero.js"></script>
</body>
</html>
