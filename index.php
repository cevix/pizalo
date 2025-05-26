<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="">	
	<title>Pedidos Pendientes</title>
</head>
<body>
	
	<header class="header">
    <div class="container header-container">
      <div class="container-logo">
        <h1 class="logo">Pizzalo</h1>
      </div>
      
      <div class="header-buttons">
        <a href="#openModalTime" class="btn btn-secondary">Tiempos</a>
        <a href="#openModalFile" class="btn btn-secondary">Fichar</a>
        <a href="caja.php" class="btn btn-secondary">Caja</a>
        <a href="#openModalAddWorker" class="btn btn-white">Añadir Trabajador</a>
      </div>
    </div>
  </header>


  <main class="container main-content">
    <!-- Tabs          -->
    <div class="tabs">
      <div class="tab-buttons">
          <button class="tab-btn active" data-tab="pedidos">Pedidos</button>
          <button class="tab-btn" data-tab="repartidores">Repartidores</button>
      </div>

      <!--    Orders        -->
      <div class="tab-content active" id="pedidos">
        <div class="grid-columns">
        
	        <div class="column">
	            <div class="section-header">Pedidos</div>
	            <div class="cards">
                <!--        lista de pedidos     -->
	                <div class="card-content">
                    <div class="card-left">
                      <span class="order-number">505</span>
                      <div class="order-address">
                        <p>Calle de Leon felipe, 4 Portal B, piso 5A</p>
                      </div>
                    </div>
                    

                    <div class="card-rigth">
                      <div class="order-times">
                        <span class="time">20:58</span>
                        <span class="time time-red">20:47</span>
                      </div> 
                      <a href="ticket.php"><img width="28" height="28" src="https://img.icons8.com/material-sharp/28/receipt.png" alt="receipt"/></a>
                    </div>
	                </div>

	                <div class="card-content">
	                    <div class="order-address">31 Villalobos 129, 2B</div>
	                </div>
	            </div>
	        </div>

	        <!-- En Reparto          -->
	        <div class="column">
	            <div class="section-header">En reparto</div>
	            <div class="cards">
	                <div class="card-content">
	                    <div class="order-address">513 Maquinilla 13</div>
	                </div>
	                <div class="card-content">
	                    <div class="order-address">909 Avenida de Miguel Hernandez, 116</div>
	                </div>
	            </div>
	        </div>
        </div>
      </div>

      <!-- Repartidores -->
      





      <div class="tab-content" id="repartidores">
        <div class="section-header amber">Repartidores</div>
        <div class="repartidores-grid">
          <?php 

      require('db.php');

      try {
        //Realizo la conexion
      $conexion=mysqli_connect($hostname, $username, $password, $dbname);
        mysqli_query($conexion,"SET NAMES 'UTF8'");
        
        if (mysqli_select_db($conexion,$dbname)) {
            $consulta="SELECT * FROM `repartidor`";
            $resultado=mysqli_query($conexion,$consulta);

            while ($repartidor=mysqli_fetch_array($resultado)) {
                //creo cada uno de las targetas de cada repartidor
                echo "<div class='delivery-card'>
                        <h3 class='delivery-name'>$repartidor[nombre]</h3>
                          <p class='delivery-lastname'>$repartidor[apellido]</p>
            
                      </div>";
                
            }
            
        }
    } catch (mysqli_sql_exception $mse) {
        echo  "<p>Nº del error: ".$mse->getCode()."</p>";
        echo "<p>mesaje del error: ".$mse->getMessage()."</p>";
    }




       ?> 
        </div>
      </div>
    </div>
   </main>

    <script src="script.js"></script>

	


	

  <div id="openModalTime" class="modal-overlay">
        <div class="modal-container">
            <!-- Botón de cerrar -->
            <a href="#close" id="closeModalBtn" class="close-modal-btn">X</a>
            
            <!-- Contenido del modal -->
            <div class="modal-content">
                <h2 class="modal-title">Insertar Tiempos</h2>
                
                <form action="guardarTiempos.php" method="post" id="ficharForm" class="fichar-form">
                    <div class="form-group">
                        <label for="delivery">Domicilio</label>
                        <input type="number" id="delivery" name="delivery" placeholder="Introduce Los minutos" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="pickUp">Recoger</label>
                <input type="number" id="pickUp" name="pickUp" placeholder="Introduce los minutos" required>
                    </div>
                    
                    <button type="submit" class="submit-btn">Enviar</button>
                </form>
            </div>
        </div>
    </div>


	<div id="openModalAddWorker" class="modalDialog">
		<!-- Contenedor del modal -->
    <div class="modal-container">
        <!-- Botón de cerrar -->
        <a href="#close" id="closeModalBtn" class="close-modal-btn">X</a>
        
        <!-- Contenido del modal -->
        <div class="modal-content">
          <h2 class="modal-title">Añadir Trabajador</h2>
          
          <form action="GuardarUsuario.php" method="post" id="ficharForm" class="fichar-form">
              <div class="form-group row">
                <div class="item-form">
                  <label for="name">Nombre</label>
                  <input type="text" id="name" name="name" maxlength="100" placeholder="Introduce tu nombre" required>
                </div>
                 <div class="item-form">
                  <label for="lastName">Apellidos</label>
                  <input type="text" id="lastName" name="lastName" maxlength="100" placeholder="Introduce tus apellidos" required>
                </div>
                
              </div>

              <div class="form-group row">
                <div class="item-form">
                  <label for="email">Correo electronico</label>
                  <input type="email" id="email" name="email" placeholder="Introduce tu correo" required>
                </div>

                <div class="item-form">
                  <label for="telefono">telefono</label>
                  <input type="number" id="telefono" name="telefono" maxlength="9" placeholder="Introduce tu numero de telefono" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="item-form">
                  <label for="dni">DNI</label>
                  <input type="text" id="dni" name="dni" maxlength="9" placeholder="Introduce tu DNI" required>
                </div>
              
                <div class="item-form">
                  <label for="password">Contraseña</label>
                  <input type="password" id="password" name="password" maxlength="8" placeholder="Introduce tu contraseña" required>
                </div>
              </div>

              
              
              <button type="submit" class="submit-btn">Enviar</button>
          </form>
        </div>
    </div>
	</div>



	<div id="openModalFile" class="modal-overlay">
        <div class="modal-container">
            <!-- Botón de cerrar -->
            <a href="#close" id="closeModalBtn" class="close-modal-btn">X</a>
            
            <!-- Contenido del modal -->
            <div class="modal-content">
                <h2 class="modal-title">Fichar turno</h2>
                
                <form action="ficharTurno.php" method="post" id="ficharForm" class="fichar-form">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" id="dni" name="dni" placeholder="Introduce tu DNI" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" required>
                    </div>
                    
                    <button type="submit" class="submit-btn">Enviar</button>
                </form>
            </div>
        </div>
    </div>
	

</body>

<style type="text/css">
	*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
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
    max-width: 1200px;
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
  
  .btn-white {
    background-color: white;
    color: #dc2626;
  }
  
  .btn-white:hover {
    background-color: #f3f4f6;
  }

a{
	text-decoration: none;
}



.main-content {
    padding: 1.5rem 0;
  }
  
  /* Tabs Styles */
  .tabs {
    width: 100%;
  }
  
  .tab-buttons {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
  }
  
  .tab-btn {
    padding: 0.75rem;
    background-color: #f3f4f6;
    border: 1px solid #e5e7eb;
    border-radius: 0.375rem;
    font-size: 1.125rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  
  .tab-btn.active {
    background-color: #e5e7eb;
    border-color: #d1d5db;
  }
  
  .tab-content {
    display: none;
  }
  
  .active {
    display: block;
  }
  
  /* Grid Layout */
  .grid-columns {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
  }
  
  @media (min-width: 768px) {
    .grid-columns {
      grid-template-columns: 1fr 1fr;
    }
  }
  
  .column {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }
  
  /* Section Headers */
  .section-header {
    background-color: #e5e7eb;
    padding: 0.5rem;
    border-radius: 0.5rem;
    text-align: center;
    font-weight: 600;
  }
  
  .amber {
    background-color: #fde68a;
    color: #78350f;
  }
  
  /* Card Styles */
  .cards {
    border-radius: 0.5rem;
    overflow: hidden;
    
  }
  
  .card-content {
    padding: 1rem;
    display: flex;
    align-items: ;
    justify-content: space-between;
    margin-bottom: 0.4rem;
    background-color: #e0f2fe;
    border-radius: 0.5rem;
  }

  .card-rigth{
    width: 25%;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .card-left{
    display: flex;
    flex-direction: row;
    align-items: center;
    
  }
  
  
  /* Order Styles */
  .order-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .order-number {
    font-size: 1.25rem;
    font-weight: 700;
  }
  
  .order-times {
    display: flex;
    gap: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
  }
  
  .time-red {
    color: #dc2626;
  }
  
  .order-address {
    margin-left: 0.4rem;
    margin-top: 0.1rem;
    font-size: 0.875rem;
  }
  
  /* Repartidores Styles */
  .repartidores-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
    margin-top: 1rem;
  }
  
  @media (min-width: 640px) {
    .repartidores-grid {
      grid-template-columns: 1fr 1fr;
    }
  }
  
  @media (min-width: 1024px) {
    .repartidores-grid {
      grid-template-columns: repeat(4, 1fr);
    }
  }
  
  .delivery-card {
    background-color: #e0f2fe;
    padding: 1rem;
    border-radius: 0.5rem;
    transition: background-color 0.2s ease;
  }
  
  .delivery-card:hover {
    background-color: #bae6fd;
  }
  
  .delivery-name {
    font-weight: 600;
  }
  
  .delivery-lastname {
    font-size: 0.875rem;
    color: #4b5563;
  }
  
  .delivery-hours {
    margin-top: 0.5rem;
    font-size: 0.75rem;
    font-weight: 500;
  }




/*  Modal style */

.modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	opacity:0;
	transition: opacity 400ms ease-in;
	pointer-events: none;
}
.modalDialog:target {
	opacity:1;
	pointer-events: auto;
}
.modalDialog > div {
	width: 700px;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
}
.close {
	color: black;
	line-height: 25px;
	text-align: center;
	
	text-decoration: none;
	font-weight: bold;
}
.close:hover { background: #00d9ff; }




/*             Modal v0     */

.modal-overlay{
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
  transition: opacity 400ms ease-in;
	pointer-events: none;
}
.modal-overlay:target {
	opacity:1;
	pointer-events: auto;
}
.modal-overlay > div {
	width: 400px;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
}
/* Contenedor del modal */
.modal-container {
  background-color: white;
  border-radius: 8px;
  width: 90%;
  max-width: 800px;
  position: relative;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transform: scale(0.9);
  transition: transform 0.3s;
}

.modal-overlay.active .modal-container {
  transform: scale(1);
}

/* Botón de cerrar */
.close-modal-btn {
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

/* Contenido del modal */
.modal-content {
  padding: 30px;
}

.modal-title {
  text-align: center;
  margin-bottom: 20px;
  color: #111;
  font-weight: 600;
  font-size: 22px;
}

/* Formulario */
.fichar-form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 1px;
}

.row {
  flex-direction: row;
  justify-content: space-between;
}

.item-form{
  width: 45%;
}

.form-group label {
  font-weight: 500;
  color: #111;
}

.form-group input {
  padding: 12px 16px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 14px;
  transition: border-color 0.2s;
}

.form-group input:focus {
  outline: none;
  border-color: #2563eb;
}

.submit-btn {
  background-color: #2563eb;
  color: white;
  border: none;
  border-radius: 4px;
  padding: 12px;
  font-weight: 500;
  cursor: pointer;
  transition: background-color 0.2s;
  margin-top: 10px;
}

.submit-btn:hover {
  background-color: #1d4ed8;
}

/*             Formulario style            */

form {
	width: 100%;
	padding: 20px;
}

form p {
	text-transform: uppercase;
	text-decoration: bold;
	font-size: 20px;
}

label {
	
	padding-bottom: 0.6rem;
	font-size: 20px;
	display: block;
	width: 100%;
}

textarea {
	resize: vertical;
	max-height: 300px;
	min-height: 100px;
}

input{
	margin-bottom: 20px;
	width: 100%;
	padding: 20px;
	box-sizing: border-box;
	border: 1px solid grey;
}

input:focus,textarea:focus {
	border: 1px solid orange;
}

input[type="submit"] {
	margin-bottom: 0px;
	background: #1E7CF7;
	color: white;
	text-decoration: bold;
	border: none;
}

input[type="submit"]:hover {
	background: #7EB6FF;
	cursor: pointer;
}

.close{
	display: flex;
	justify-content: end;
}
.closeAlign{
	display: flex;
	justify-content: end;
}
.titleCenter{
	display: flex;
	justify-content: center;
}
</style>
</html>