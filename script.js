//Fuccionalida para cambiar la informacion

document.addEventListener("DOMContentLoaded", () => {

    const tabButtons = document.querySelectorAll(".tab-btn")
    const tabContents = document.querySelectorAll(".tab-content")
  
    tabButtons.forEach((button) => {
      button.addEventListener("click", function () {
        // I remove the active class from the button and the content
        tabButtons.forEach((btn) => btn.classList.remove("active"))
        tabContents.forEach((content) => content.classList.remove("active"))
  
        // I add active class to clicked button
        this.classList.add("active")
  
        // I add the active class to display the content 
        const tabId = this.getAttribute("data-tab")
        document.getElementById(tabId).classList.add("active")
      })
    })
  })


//cerrar modales de mensajes
const cerrarInfo = document.getElementById("cerrarInfo")
  if (cerrarInfo) {
      cerrarInfo.addEventListener("click", () => {
        confirmModal.classList.remove("show")
        
      })
    }


  