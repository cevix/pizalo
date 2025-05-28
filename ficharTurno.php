
<?php 
try {
        
    require('db.php');

} catch (Throwable $t) {
    echo "<p> ---------------</p>";
    echo "<p>Mensaje:" . $t->getMessage()."</p>";
    echo "<p> ---------------</p>";
    exit();
}

phpinfo();



try {
    // Realizo la conexión
    $conexion = mysqli_connect($hostname, $username, $password, $dbname);
    mysqli_query($conexion, "SET NAMES 'UTF8'");

    if (mysqli_select_db($conexion, $dbname)) {
        // Obtener datos del formulario (usuario y contraseña)
        $dniInput = $_POST['dni'];
        $passwordInput = $_POST['password'];
        ;
        // Verificar si el usuario existe
        $consulta = "SELECT id, password_hash FROM repartidores WHERE dni='$dniInput'";
        $resultado = mysqli_query($conexion, $consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) {
            // Verificar la contraseña
            if (password_verify($passwordInput, $fila['password_hash'])) {
                $repartidor_id = $fila['id'];

                // Verificar si hay turno abierto
                $consultaTurno = "SELECT id FROM turnos WHERE repartidor_id='$repartidor_id' AND fin IS NULL";
                $resultadoTurno = mysqli_query($conexion, $consultaTurno);

                if ($turno = mysqli_fetch_assoc($resultadoTurno)) {
                    // Hay turno abierto, lo cerramos
                    $idTurno = $turno['id'];
                    $actualizar = "UPDATE turnos SET fin=NOW() WHERE id='$idTurno'";
                    if (mysqli_query($conexion, $actualizar)) {
                        echo "<p>Turno finalizado correctamente para el repartidor ID: $repartidor_id</p>";
                    } else {
                        echo "<p>Error al finalizar el turno.</p>";
                    }
                } else {
                    // No hay turno abierto, iniciamos uno
                    $insertar = "INSERT INTO turnos (repartidor_id, inicio) VALUES ('$repartidor_id', NOW())";
                    if (mysqli_query($conexion, $insertar)) {
                        echo "<p>Turno iniciado correctamente para el repartidor ID: $repartidor_id</p>";
                    } else {
                        echo "<p>Error al iniciar el turno.</p>";
                    }
                }
            } else {
                echo "<p>Contraseña incorrecta.</p>";
            }
        } else {
            echo "<p>Usuario no encontrado.</p>";
        }
    } else {
        echo "<p>No se pudo seleccionar la base de datos.</p>";
    }
}catch (Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
 ?>