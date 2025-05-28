<!DOCTYPE html>
<html lang="es">
<head>

    <!--      Introducir  BigDecimal en el proyecto       -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telepizza - Caja</title>
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

    

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
    // Variables para el carrito
    let cart = []
    const shippingCost = 1.5
  
    // Elementos DOM
    
    const totalOrder = document.getElementById("precioTotal")
    const orderItems = document.getElementById("orderItems")
    const subtotalElement = document.getElementById("subtotal")
    const envioElement = document.getElementById("envio")
    const totalElement = document.getElementById("total")
    const paymentMethods = document.querySelectorAll('input[name="paymentMethod"]')
    const cambioContainer = document.getElementById("cambioContainer")
    const importeEfectivo = document.getElementById("importeEfectivo")
    const cambioElement = document.getElementById("cambio")
    const finalizarPedidoBtn = document.getElementById("finalizarPedido")
    const confirmModal = document.getElementById("confirmModal")
    const closeConfirmModalBtn = document.getElementById("closeConfirmModalBtn")
    const orderNumberElement = document.getElementById("orderNumber")
  
    // Mostrar o ocultar el cambio 

    const tipoEntrega = document.getElementById("tipoEntrega")
    const datosEntrega = document.getElementById("datosEntrega")

    if (tipoEntrega) {
      tipoEntrega.addEventListener("change", () => {
        if (tipoEntrega.value === "domicilio") {
          datosEntrega.style.display = "block"
          envioElement.textContent = "1.50€"
          updateTotals()
        } else {
          datosEntrega.style.display = "none"
          envioElement.textContent = "0.00€"
          updateTotals()
        }
      })
    }
  
    // cambiar de pestaña productos


    const productTabs = document.querySelectorAll(".product-tab")
    const productContents = document.querySelectorAll(".product-content")

    productTabs.forEach((tab) => {
      tab.addEventListener("click", () => {

        productTabs.forEach((t) => t.classList.remove("active"))
        productContents.forEach((c) => c.classList.remove("active"))
  
        tab.classList.add("active")
        const tabId = tab.getAttribute("data-tab")
        document.getElementById(tabId).classList.add("active")
      })
    })
  
    // Añadir productos al carrito

    const productCards = document.querySelectorAll(".product-card")

    productCards.forEach((card) => {
      card.addEventListener("click", () => {
        const productId = card.getAttribute("data-id")
        const productName = card.getAttribute("data-name")
        //const productInfo = card.getAttribute("data-info")
        const productPrice = Number.parseFloat(card.getAttribute("data-price"))
  
        // Comprobar si el producto ya está en el carrito
        const existingItem = cart.find((item) => item.id === productId)
  
        if (existingItem) {
          existingItem.quantity += 1
          existingItem.total = existingItem.quantity * existingItem.price
        } else {
          cart.push({
            id: productId,
            name: productName,
            //info: productInfo,
            price: productPrice,
            quantity: 1,
            total: productPrice,
          })
        }
  
        updateCart()
      })
    })
  
    // Actualizar carrito
    function updateCart() {
      if (cart.length === 0) {
        orderItems.innerHTML = `
          <div class="empty-cart">
            <p>No hay productos en el pedido</p>
            <p>Selecciona productos del catálogo</p>
          </div>
        `
      } else {
        let cartHTML = ""
  
        cart.forEach((item) => {
          cartHTML += `
            <div class="order-item" data-id="${item.id}">
              <div class="order-item-info">
                <div class="order-item-name">${item.name}</div>
                <div class="order-item-price">${item.price.toFixed(2)}€</div>
              </div>
              <div class="order-item-quantity">
                <button class="quantity-btn decrease">-</button>
                <span class="quantity-value">${item.quantity}</span>
                <button class="quantity-btn increase">+</button>
              </div>
              <div class="order-item-total">${item.total.toFixed(2)}€</div>
              <div class="order-item-remove">×</div>
              
              <div style="display: none;">
              <input type="text" id="${item.id}" name="items[${item.id}][name]" value="${item.name}">
              <input type="text" id="${item.id}" name="items[${item.id}][precio]" value="${item.price.toFixed(2)}">
              <input type="text" id="${item.id}" name="items[${item.id}][cantidad]" value="${item.quantity}">
              </div>

            </div>
          `
        })
  
        orderItems.innerHTML = cartHTML
        //orderItems.insertAdjacentHTML('beforeend', innerHTML)
        // Eventos de los botones de las cantidades
        document.querySelectorAll(".quantity-btn.decrease").forEach((btn) => {
          btn.addEventListener("click", (e) => {
            
            const itemElement = btn.closest(".order-item")
            const itemId = itemElement.getAttribute("data-id")
            decreaseQuantity(itemId)
          })
        })
  
        document.querySelectorAll(".quantity-btn.increase").forEach((btn) => {
          btn.addEventListener("click", (e) => {
            //e.stopPropagation()
            const itemElement = btn.closest(".order-item")
            const itemId = itemElement.getAttribute("data-id")
            increaseQuantity(itemId)
          })
        })
  
        // Eventos al boton de borrar producto
        document.querySelectorAll(".order-item-remove").forEach((btn) => {
          btn.addEventListener("click", (e) => {
            e.stopPropagation()
            const itemElement = btn.closest(".order-item")
            const itemId = itemElement.getAttribute("data-id")
            removeItem(itemId)
          })
        })
      }
  
      updateTotals()
    }
  
    // Aumentar cantidad
    function increaseQuantity(itemId) {
      const item = cart.find((item) => item.id === itemId)
      if (item) {
        item.quantity += 1
        item.total = item.quantity * item.price
        updateCart()
      }
    }
  
    // Disminuir cantidad
    function decreaseQuantity(itemId) {
      const item = cart.find((item) => item.id === itemId)
      if (item && item.quantity > 1) {
        item.quantity -= 1
        item.total = item.quantity * item.price
        updateCart()
      } else if (item && item.quantity === 1) {
        removeItem(itemId)
      }
    }
  
    // Eliminar producto
    function removeItem(itemId) {
      cart = cart.filter((item) => item.id !== itemId)
      updateCart()
    }
  
    // Actualizar totales
    function updateTotals() {
      const subtotal = cart.reduce((total, item) => total + item.total, 0)
      const shipping = tipoEntrega && tipoEntrega.value === "domicilio" ? shippingCost : 0
      const total = subtotal + shipping
  
      subtotalElement.textContent = subtotal.toFixed(2) + "€"
      envioElement.textContent = shipping.toFixed(2) + "€"
      totalElement.textContent = total.toFixed(2) + "€"
      totalOrder.value = total.toFixed(2)
      // Actualizar cambio si se introduce un importe
      if (importeEfectivo && importeEfectivo.value) {
        updateCambio()
      }
    }
  
    // Mostrar o ocultar sección de cambio según método de pago
    paymentMethods.forEach((method) => {
      method.addEventListener("change", () => {
        if (method.value === "efectivo") {
          cambioContainer.style.display = "block"
        } else {
          cambioContainer.style.display = "none"
        }
      })
    })
  
    // Calcular cambio
    if (importeEfectivo) {
      importeEfectivo.addEventListener("input", updateCambio)
    }
  
    function updateCambio() {
      const importe = Number.parseFloat(importeEfectivo.value) || 0
      const total = Number.parseFloat(totalElement.textContent)
  
      if (importe >= total) {
        const cambio = importe - total
        cambioElement.value = cambio.toFixed(2) + "€"
        cambioElement.classList.remove("input-error")
      } else {
        cambioElement.value = "Importe insuficiente"
        cambioElement.classList.add("input-error")
      }
    }
  
    // Finalizar pedido
    
    
  
    // Cerrar modal
    if (closeConfirmModalBtn) {
      closeConfirmModalBtn.addEventListener("click", () => {
        document.getElementById("direccionForm").reset()
        cart = []
        updateCart()
        document.getElementById("direccionForm").reset()
        confirmModal.classList.remove("show")
        
      })
    }

    // Agarramos el formulario
    const form = document.getElementById('direccionForm');

    form.addEventListener('submit', function(e) {
        if (cart.length === 0) {
            alert("Añade productos al pedido antes de finalizar");
            e.preventDefault();  // Detiene el envío del formulario
            return;
        }
        
        // verificar si el importe es suficiente
        const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value
        if (paymentMethod === "efectivo") {
          const importe = Number.parseFloat(importeEfectivo.value) || 0
          const total = Number.parseFloat(totalElement.textContent)
  
          if (importe < total) {
            alert("El importe en efectivo es insuficiente")
            e.preventDefault();  // Detiene el envío del formulario
            return;
          }
        }
    });

  
  
    
    updateCart()
  })
  
    </script>


    <style type="text/css">
        
        /* Reset and Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  a{
    text-decoration: none;
  }

  body {
    font-family: "Inter", sans-serif;
    background-color: #f9fafb;
    color: #1f2937;
    line-height: 1.5;
    min-height: 100vh;
  }
  
  .container {
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 1rem;
  }
  
  /* Header Styles */
  .header {
    background: linear-gradient(to right, #dc2626, #b91c1c);
    color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 0.75rem 0;
  }
  
  .header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .logo {
    font-size: 1.5rem;
    font-weight: 700;
    letter-spacing: -0.025em;
  }
  
  .header-buttons {
    display: flex;
    gap: 0.5rem;
  }
  
  /* Button Styles */
  .btn {
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    font-weight: 500;
    font-size: 0.875rem;
    cursor: pointer;
    border: none;
    transition: all 0.2s ease;
  }
  
  .btn-secondary {
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
  }
  
  .btn-secondary:hover {
    background-color: rgba(255, 255, 255, 0.3);
  }
  
  .btn-secondary.active {
    background-color: rgba(255, 255, 255, 0.4);
    font-weight: 600;
  }
  
  .btn-white {
    background-color: white;
    color: #dc2626;
  }
  
  .btn-white:hover {
    background-color: #f3f4f6;
  }
  
  /* Main Content Styles */
  .main-content {
    padding: 1.5rem 0;
  }
  
  /* Caja Grid Layout */
  .caja-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
  
  @media (min-width: 1024px) {
    .caja-grid {
      grid-template-columns: 3fr 2fr;
    }
  }
  
  /* Section Card Styles */
  .section-card {
    background-color: white;
    border-radius: 0.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
    margin-bottom: 1.5rem;
  }
  
  .section-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1.25rem;
    color: #111827;
  }
  
  /* Form Styles */
  .direccion-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }
  
  .form-row {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
  }
  
  .form-group {
    flex: 1;
    min-width: 200px;
  }
  
  .form-group-lg {
    flex: 3;
  }
  
  .form-group-sm {
    flex: 1;
    min-width: 80px;
  }
  
  .form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    font-size: 0.875rem;
    color: #4b5563;
  }
  
  .form-control {
    width: 100%;
    padding: 0.625rem 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    font-size: 0.875rem;
    transition: border-color 0.2s;
  }
  
  .form-control:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1);
  }
  
  select.form-control {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.25rem;
    padding-right: 2.5rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
  }
  
  /* Product Tabs */
  .product-tabs {
    display: flex;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 1rem;
    overflow-x: auto;
    scrollbar-width: none; /* Firefox */
  }
  
  .product-tabs::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Edge */
  }
  
  .product-tab {
    padding: 0.75rem 1rem;
    background: none;
    border: none;
    border-bottom: 2px solid transparent;
    font-weight: 500;
    color: #6b7280;
    cursor: pointer;
    white-space: nowrap;
  }
  
  .product-tab:hover {
    color: #111827;
  }
  
  .product-tab.active {
    color: #2563eb;
    border-bottom-color: #2563eb;
  }
  
  /* Product Content */
  .product-content {
    display: none;
  }
  
  .product-content.active {
    display: block;
  }
  
  /* Product Grid */
  .product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1rem;
  }
  
  /* Product Card */
  .product-card {
    border: 1px solid #e5e7eb;
    border-radius: 0.5rem;
    overflow: hidden;
    transition: all 0.2s;
    cursor: pointer;
  }
  
  .product-card:hover {
    border-color: #2563eb;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    transform: translateY(-2px);
  }
  
  .product-img {
    height: 80px;
    background-color: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
  }
  
  .product-info {
    padding: 0.75rem;
  }
  
  .product-info h3 {
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
  }
  
  .product-info p {
    font-size: 0.75rem;
    color: #6b7280;
    margin-bottom: 0.5rem;
    height: 32px;
    overflow: hidden;
  }
  
  .product-price {
    font-weight: 600;
    color: #2563eb;
  }
  
  /* Order Summary */
  .order-summary {
    height: calc(100% - 1.5rem);
    display: flex;
    flex-direction: column;
  }
  
  .order-items {
    flex: 1;
    overflow-y: auto;
    margin-bottom: 1rem;
    max-height: 400px;
  }
  
  .empty-cart {
    text-align: center;
    padding: 2rem 0;
    color: #6b7280;
  }
  
  .empty-cart p:first-child {
    font-weight: 500;
    margin-bottom: 0.5rem;
  }
  
  .order-item {
    display: flex;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid #e5e7eb;
  }
  
  .order-item-info {
    flex: 1;
  }
  
  .order-item-name {
    font-weight: 500;
    margin-bottom: 0.25rem;
  }
  
  .order-item-price {
    font-size: 0.875rem;
    color: #6b7280;
  }
  
  .order-item-quantity {
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .quantity-btn {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border: 1px solid #d1d5db;
    background-color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 0.875rem;
    line-height: 1;
  }
  
  .quantity-btn:hover {
    background-color: #f3f4f6;
  }
  
  .quantity-value {
    font-weight: 500;
    width: 24px;
    text-align: center;
  }
  
  .order-item-total {
    font-weight: 600;
    min-width: 60px;
    text-align: right;
  }
  
  .order-item-remove {
    margin-left: 0.75rem;
    color: #ef4444;
    cursor: pointer;
    font-size: 1.25rem;
    line-height: 1;
  }

  .hide-item{
    display: none;
  }
  
  /* Order Totals */
  .order-totals {
    margin-top: auto;
    border-top: 1px solid #e5e7eb;
    padding-top: 1rem;
  }
  
  .total-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
  }
  
  .total-final {
    font-weight: 700;
    font-size: 1.125rem;
    margin-top: 0.5rem;
    padding-top: 0.5rem;
    border-top: 1px dashed #e5e7eb;
  }
  
  /* Payment Methods */
  .payment-methods {
    margin-top: 1.5rem;
  }
  
  .payment-methods h3 {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.75rem;
  }
  
  .payment-options {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
  }
  
  .payment-option {
    flex: 1;
    display: flex;
    cursor: pointer;
  }
  
  .payment-option input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }
  
  .payment-label {
    flex: 1;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    transition: all 0.2s;
  }
  
  .payment-option input:checked + .payment-label {
    border-color: #2563eb;
    background-color: #eff6ff;
  }
  
  .cambio-container {
    margin-top: 1rem;
    padding: 1rem;
    background-color: #f9fafb;
    border-radius: 0.375rem;
  }
  
  /* Finalizar Button */
  .btn-finalizar {
    width: 100%;
    padding: 0.875rem;
    background-color: #2563eb;
    color: white;
    border: none;
    border-radius: 0.375rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s;
    margin-top: 1.5rem;
  }
  
  .btn-finalizar:hover {
    background-color: #1d4ed8;
  }
  
  /* Modal Styles */
  .modalInfo {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s, visibility 0.3s;
  }
  
  .modalInfo.show {
    opacity: 1;
    visibility: visible;
  }
  
  .contenedorInfo {
    background-color: white;
    border-radius: 8px;
    width: 90%;
    max-width: 500px;
    position: relative;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transform: scale(0.9);
    transition: transform 0.3s;
  }
  
  .modalInfo.show .contenedorInfo {
    transform: scale(1);
  }
  
  .botonCerrarInfo {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    color: #333;
  }
  
  .contenedorMensaje {
    padding: 30px;
  }
  
  .modal-title {
    text-align: center;
    margin-bottom: 20px;
    color: #111;
    font-weight: 600;
    font-size: 22px;
  }
  
  /* Confirm Modal */
  .confirm-content {
    text-align: center;
    margin-bottom: 2rem;
  }
  
  .confirm-icon {
    width: 60px;
    height: 60px;
    background-color: #10b981;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    margin: 0 auto 1.5rem;
  }
  
  .confirm-content p {
    margin-bottom: 0.5rem;
  }
  
  .confirm-actions {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  
  .btn-action {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.75rem;
    background-color: #f3f4f6;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
  }
  
  .btn-action:hover {
    background-color: #e5e7eb;
  }
  
    </style>
</body>
</html>
