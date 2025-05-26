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
            echo "Datos actualizados correctamente.<br>";
        } else {
            echo "Error al actualizar los datos: " . mysqli_error($conexion) . "<br>";
        }

    } else {
        echo "No se pudo seleccionar la base de datos.";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}


?>







