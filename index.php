<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="favicon/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
	<title>Pedidos Pendientes</title>
</head>
<body>
	<?php 

  try {
        require('db.php');
    } catch (Throwable $t) {
        echo "<p> ---------------</p>";
        echo "<p>Mensaje:" . $t->getMessage()."</p>";
        echo "<p> ---------------</p>";
        exit();
    }

  ?>
	<header class="header">
    <div class="container header-container">
      <div class="container-logo">
        <h1 class="logo">Pizzalo</h1>
      </div>
      
      <div class="header-buttons">
        <a href="#openModalTime" class="btn estiloModales">Tiempos</a>
        <a href="#openModalFile" class="btn estiloModales">Fichar</a>
        <a href="#openModalAddWorker" class="btn estiloModales">Añadir Trabajador</a>
        <a href="caja.php" class="btn estiloRedireccion">Caja</a>
        
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
	                
                  <?php 

  try {

        //Realizo la conexion
      $conexion=mysqli_connect($hostname, $username, $password, $dbname);

      $diaActual=date("Y-m-d");

      if (!$conexion) {
        die("Error de conexión a MySQL: " . mysqli_connect_error());
        }

      if (!mysqli_select_db($conexion, $dbname)) {
        die("No se pudo seleccionar la base de datos: " . mysqli_error($conexion));
        }

        mysqli_query($conexion,"SET NAMES 'UTF8'");
        
        if (mysqli_select_db($conexion,$dbname)) {
            $consulta="SELECT * FROM `pedidos` WHERE fecha = '$diaActual' AND tipoPedido ='domicilio' AND estado='pendiente'";
            $resultado=mysqli_query($conexion,$consulta);

            while ($datosPedido=mysqli_fetch_array($resultado)) {
                //creo cada uno de las targetas de cada repartidor
                $id=$datosPedido['id'];
                $hora_entrega=substr($datosPedido['hora_entrega'], 0, 5);
                $salida_obligatoria=substr($datosPedido['salida_obligatoria'], 0, 5);
              echo "<div class='card-content'>
                    <div class='targetaParteIzquierda'>
                      <span class='codigoPedido'>$datosPedido[codigoDiario]</span>
                      <div class='pedidoDireccion'>
                        <p>$datosPedido[direccion]</p>
                      </div>
                    </div>
                    

                    <div class='targetaParteDerecha'>
                      <div class='order-times'>
                        <span class='time'>$hora_entrega</span>
                        <span class='time time-red'>$salida_obligatoria</span>
                      </div> 
                      <a href='ticket.php?id=$datosPedido[id]'><img width='28' height='28' src='https://img.icons8.com/material-sharp/28/receipt.png' alt='receipt'/></a>
                    </div>
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

	        <!-- En Reparto          -->
	        <div class="column">
	            <div class="section-header">En reparto</div>
                <div class="cards">

<?php 

  try {

        //Realizo la conexion
      $conexion=mysqli_connect($hostname, $username, $password, $dbname);

      $diaActual=date("Y-m-d");

      if (!$conexion) {
        die("Error de conexión a MySQL: " . mysqli_connect_error());
        }

      if (!mysqli_select_db($conexion, $dbname)) {
        die("No se pudo seleccionar la base de datos: " . mysqli_error($conexion));
        }

        mysqli_query($conexion,"SET NAMES 'UTF8'");
        
        if (mysqli_select_db($conexion,$dbname)) {
            $consulta="SELECT * FROM `pedidos` WHERE fecha = '$diaActual' AND tipoPedido ='domicilio' AND estado='en camino'";
            $resultado=mysqli_query($conexion,$consulta);

            while ($datosPedido=mysqli_fetch_array($resultado)) {
                //creo cada uno de las targetas de cada repartidor
                $id=$datosPedido['id'];
                $hora_entrega=substr($datosPedido['hora_entrega'], 0, 5);
                $salida_obligatoria=substr($datosPedido['salida_obligatoria'], 0, 5);
              
              echo "<div class='card-content'>
                      <div class='pedidoDireccion'>$datosPedido[codigoDiario] $datosPedido[direccion]</div>
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
      </div>

      <!-- Repartidores -->
      





      <div class="tab-content" id="repartidores">
        <div class="section-header amber">Repartidores</div>
        <div class="repartidores-grid">
          <?php 

      

      try {

        //Realizo la conexion
      $conexion=mysqli_connect($hostname, $username, $password, $dbname);

      if (!$conexion) {
        die("Error de conexión a MySQL: " . mysqli_connect_error());
        }

      if (!mysqli_select_db($conexion, $dbname)) {
        die("No se pudo seleccionar la base de datos: " . mysqli_error($conexion));
        }

        mysqli_query($conexion,"SET NAMES 'UTF8'");
        
        if (mysqli_select_db($conexion,$dbname)) {
            $consulta="SELECT * FROM `repartidores`";
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

    <?php 

       
    if (isset($_GET['mensaje'])) {
       $mensaje=$_GET['mensaje'];
       echo "<div id='confirmModal' class='modalInfo show'>
        <div class='contenedorInfo'>
            <button id='cerrarInfo' class='botonCerrarInfo'>X</button>
            <div class='contenedorMensaje'>
                <div class='confirm-content'>
                    <p>$mensaje</p>       
                </div>      
            </div>
        </div>
    </div>";
    }



    ?>
	

</body>


</html>