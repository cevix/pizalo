document.addEventListener("DOMContentLoaded", () => {
    // Variables para el carrito
    let cart = []
    const shippingCost = 1.5
  
    // Elementos DOM
    const tipoEntrega = document.getElementById("tipoEntrega")
    const datosEntrega = document.getElementById("datosEntrega")
    const productTabs = document.querySelectorAll(".product-tab")
    const productContents = document.querySelectorAll(".product-content")
    const productCards = document.querySelectorAll(".product-card")
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
    const printOrderBtn = document.getElementById("printOrderBtn")
    const newOrderBtn = document.getElementById("newOrderBtn")
  
    // Mostrar/ocultar datos de entrega según tipo
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
  
    // Cambiar entre pestañas de productos
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
    productCards.forEach((card) => {
      card.addEventListener("click", () => {
        const productId = card.getAttribute("data-id")
        const productName = card.getAttribute("data-name")
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
            </div>
          `
        })
  
        orderItems.innerHTML = cartHTML
  
        // Eventos de los botones de las cantidades
        document.querySelectorAll(".quantity-btn.decrease").forEach((btn) => {
          btn.addEventListener("click", (e) => {
            e.stopPropagation()
            const itemElement = btn.closest(".order-item")
            const itemId = itemElement.getAttribute("data-id")
            decreaseQuantity(itemId)
          })
        })
  
        document.querySelectorAll(".quantity-btn.increase").forEach((btn) => {
          btn.addEventListener("click", (e) => {
            e.stopPropagation()
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
  
      // Actualizar cambio si se introduce un importe
      if (importeEfectivo && importeEfectivo.value) {
        updateCambio()
      }
    }
  
    // Mostrar/ocultar sección de cambio según método de pago
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
    if (finalizarPedidoBtn) {
      finalizarPedidoBtn.addEventListener("click", () => {
        // Validar que hay productos en el carrito
        if (cart.length === 0) {
          alert("Añade productos al pedido antes de finalizar")
          return
        }
  
        // Validar formulario
        const form = document.getElementById("direccionForm")
        if (!form.checkValidity()) {
          form.reportValidity()
          return
        }
  
        // Validar método de pago
        const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value
        if (paymentMethod === "efectivo") {
          const importe = Number.parseFloat(importeEfectivo.value) || 0
          const total = Number.parseFloat(totalElement.textContent)
  
          if (importe < total) {
            alert("El importe en efectivo es insuficiente")
            return
          }
        }
  
        // Generar número de pedido (simulado)
        const orderNumber = Math.floor(Math.random() * 100) + 500
        orderNumberElement.textContent = orderNumber
  
        // Mostrar modal de confirmación
        confirmModal.classList.add("active")
      })
    }
  
    // Cerrar modal de confirmación
    if (closeConfirmModalBtn) {
      closeConfirmModalBtn.addEventListener("click", () => {
        confirmModal.classList.remove("active")
      })
    }
  
    // Cerrar modal haciendo clic fuera
    if (confirmModal) {
      confirmModal.addEventListener("click", (e) => {
        if (e.target === confirmModal) {
          confirmModal.classList.remove("active")
        }
      })
    }
  
    // simular que se imprime el ticket
    if (printOrderBtn) {
      printOrderBtn.addEventListener("click", () => {
        // Simulación de impresión
        alert("Imprimiendo ticket...")
      })
    }
  
    // reiniciar todo para relaizar un nuevo pedido
    if (newOrderBtn) {
      newOrderBtn.addEventListener("click", () => {
        // Reiniciar formulario y carrito
        document.getElementById("direccionForm").reset()
        cart = []
        updateCart()
        confirmModal.classList.remove("active")
      })
    }
  
    // Inicializar carrito
    updateCart()
  })
  