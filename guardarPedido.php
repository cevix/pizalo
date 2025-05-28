<?php 
try {
        require('db.php');
    } catch (Throwable $t) {
        echo "<p> ---------------</p>";
        echo "<p>Mensaje:" . $t->getMessage()."</p>";
        echo "<p> ---------------</p>";
        exit();
    }



//datos enviador por el formualrio
$timepoEstimado = "";
$tipoEntrega=$_POST['tipoEntrega'];
$informacion=$_POST['informacion'];
$direccion=$_POST['direccion'];
$bloque=$_POST['bloque'];
$numero = $_POST['numero'];
$piso = $_POST['piso'];
$puerta = $_POST['puerta'];
$paymentMethod = $_POST['paymentMethod'];
$precioTotal=$_POST['precioTotal'];
$importeEfectivo = $_POST['importeEfectivo'];
$cambio = $_POST['cambio'];
//Los productos escogidos
$productosPedido=$_POST['items'];


//Guardo bien la dirreccion del pedido
$direccionCompleta = "";
$direccionCompleta .= $direccion;
$direccionCompleta .= ",".$numero;
if (strlen($bloque)>0) {
	$direccionCompleta.= ",".$bloque;
}
$direccionCompleta .= ",".$piso;
$direccionCompleta .= " ".$puerta;
//genero el id del pedido
$idPedido = bin2hex(random_bytes(14));

try {
        //Realizo la conexion
    	$conexion=mysqli_connect($hostname,$username,$password,$dbname);
        mysqli_query($conexion,"SET NAMES 'UTF8'");
        
        if (mysqli_select_db($conexion,$dbname)) {
            $consulta="SELECT * FROM `tiempos`";
            $resultado=mysqli_query($conexion,$consulta);

            while ($fila=mysqli_fetch_array($resultado)) {
                
                
                
                if ($tipoEntrega = "domicilio") {
                	$tiempoEstimado=$fila["TDomicilio"];
                } else {
                	$tiempoEstimado=$fila["TRecoger"];
                }
                

            }
            
        }
    } catch (mysqli_sql_exception $mse) {
        echo  "<p>Nº del error: ".$mse->getCode()."</p>";
        echo "<p>mesaje del error: ".$mse->getMessage()."</p>";
    }


 

//calulos de las horas y fecha

$fechaPedido=date("Y-m-d");
$horaActual = date("H");  
$minutoActual= date("i");
$entregaCalculado=mktime($horaActual,$minutoActual + $tiempoEstimado);
//hora de entrega
$horaEntrega = date("H:i",$entregaCalculado);

$tiempoReducido= $tiempoEstimado - 10;

$salidaCalculada= mktime($horaActual,$minutoActual + $tiempoReducido);
//Hora de salida obligatoria
$horaSalidaObligatoria=date("H:i",$salidaCalculada);



//genro el codigo del pedido

 try {
        //Realizo la conexion
    	$conexion=mysqli_connect($hostname,$username,$password,$dbname);
        mysqli_query($conexion,"SET NAMES 'UTF8'");
        
        if (mysqli_select_db($conexion,$dbname)) {
            $consulta="SELECT MAX(codigoDiario) AS max_codigo FROM pedidos WHERE fecha = '$fechaPedido'";
            $resultado=mysqli_query($conexion,$consulta);

         
            if ($fila=mysqli_fetch_assoc($resultado)) {
            	$maxcodigo=$fila["max_codigo"];
            	if (is_null($maxcodigo)) {
            		$codigoDiario=1;
            	} else {
            		$codigoDiario=$maxcodigo+1;
            	}
            	
            }else{
            	$codigoPedido=1;
            }

        }
    } catch (mysqli_sql_exception $mse) {
        echo  "<p>Nº del error: ".$mse->getCode()."</p>";
        echo "<p>mesaje del error: ".$mse->getMessage()."</p>";
    }

//$conexion = mysqli_connect($hostname, $username, $password, $dbname);

$consulta="INSERT INTO `pedidos`(codigo_pedido, codigoDiario, fecha ,hora_entrega, salida_obligatoria, Estado, direccion, comentarios, precio_total, metodo_Pago, importe_efectivo, cambio) VALUES ('$idPedido','$codigoDiario','$fechaPedido','$horaEntrega','$horaSalidaObligatoria','pendiente','$direccionCompleta','$informacion','$precioTotal','$paymentMethod','$importeEfectivo','$cambio')";

$resultado=mysqli_query($conexion, $consulta);
if ($resultado) {
    echo "Se ha guardado el pedido correctamente <br>";
    echo "<br>";
} else {
    echo "Error: " . mysqli_error($conexion);
}


foreach ($productosPedido as $idProducto => $producto) {
	$conexion = mysqli_connect($hostname, $username, $password, $dbname);
	$nombreProducto=$producto["name"];
	$cantidadProducto=$producto["cantidad"];

	$consulta="INSERT INTO `pedido_detalle`( codigo_pedido, producto, cantidad) VALUES ('$idPedido','$nombreProducto','$cantidadProducto')";
	$resultado=mysqli_query($conexion, $consulta);
	
	if ($resultado) {
	    echo "Se  guardado el producto correctamente <br>";
	    echo "<br>";
	} else {
	    echo "Error: " . mysqli_error($conexion);
	}


}

header("Location:caja.php?codigo=$codigoDiario");


 ?>