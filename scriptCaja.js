document.addEventListener("DOMContentLoaded", () => {
    // 
    let cart = []
    const shippingCost = 1.5
  
    // Elementos DOM
    
    
    //total de elementos
    

    
    
    
   
    
  
    // Mostrar o ocultar el cambio 

    const tipoEntrega = document.getElementById("tipoEntrega")
    const datosEntrega = document.getElementById("datosEntrega")
    const envioElement = document.getElementById("envio")

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

    const orderItems = document.getElementById("orderItems")
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

    const totalOrder = document.getElementById("precioTotal")
    const subtotalElement = document.getElementById("subtotal")
    const totalElement = document.getElementById("total")

    const importeEfectivo = document.getElementById("importeEfectivo")

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
    
    const paymentMethods = document.querySelectorAll('input[name="paymentMethod"]')
    const cambioContainer = document.getElementById("cambioContainer")
    const cambioElement = document.getElementById("cambio")

    
    // Mostrar o ocultar sección de cambio según el modo pago
    paymentMethods.forEach((method) => {
      method.addEventListener("change", () => {
        if (method.value === "efectivo") {
          cambioContainer.style.display = "block"
        } else {
          cambioContainer.style.display = "none"
        }
      })
    })
  
   
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
    
    
   const closeConfirmModalBtn = document.getElementById("closeConfirmModalBtn")
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
            
            // verificar el importe
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
  