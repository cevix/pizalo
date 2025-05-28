<?php 

try {
        
    require('db.php');

} catch (Throwable $t) {
    echo "<p> ---------------</p>";
    echo "<p>Mensaje:" . $t->getMessage()."</p>";
    echo "<p> ---------------</p>";
    exit();
}


$ubicacionLocal = "Av. de la Albufera, 268";
$delivery= $_POST['delivery'];
$pickUp = $_POST['pickUp'];


try {
    // Realizo la conexión
    $conexion = mysqli_connect($hostname, $username, $password, $dbname);
    mysqli_query($conexion, "SET NAMES 'UTF8'");

    if (mysqli_select_db($conexion, $dbname)) {

        $consulta = "UPDATE tiempos 
                     SET TDomicilio = $delivery, TRecoger = $pickUp 
                     WHERE UbicacionLocal = '$ubicacionLocal'";

        // Ejecutar la consulta
        if (mysqli_query($conexion, $consulta)) {
            $mensaje="Tiempo actualizado correctamente";
            $mensajeUrlencode=urlencode($mensaje);
            header("Location:index.php?mensaje=$mensajeUrlencode");
        } else {
            $mensaje="Tiempo actualizado correctamente";
            $mensajeUrlencode=urlencode($mensaje);
            header("Location:index.php?mensaje=$mensajeUrlencode");
        }

    } else {
        echo "No se pudo seleccionar la base de datos.";
        $mensaje="Ha habido un problema con la base de datos";
        $mensajeUrlencode=urlencode($mensaje);
        header("Location:index.php?mensaje=$mensajeUrlencode");
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}


?>







