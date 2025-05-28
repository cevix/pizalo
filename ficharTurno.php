
<?php 
try {
        
    require('db.php');

} catch (Throwable $t) {
    echo "<p> ---------------</p>";
    echo "<p>Mensaje:" . $t->getMessage()."</p>";
    echo "<p> ---------------</p>";
    exit();
}




try {
    // Realizo la conexión
    $conexion = mysqli_connect($hostname, $username, $password, $dbname);
    mysqli_query($conexion, "SET NAMES 'UTF8'");

    if (mysqli_select_db($conexion, $dbname)) {
        
        $dniInput = $_POST['dni'];
        $passwordInput = $_POST['password'];
        ;
        
        $consulta = "SELECT id, password_hash FROM repartidores WHERE dni='$dniInput'";
        $resultado = mysqli_query($conexion, $consulta);

        if ($fila = mysqli_fetch_assoc($resultado)) {
            
            if (password_verify($passwordInput, $fila['password_hash'])) {
                $repartidor_id = $fila['id'];

                // verifico si hay un turno abierto
                $consultaTurno = "SELECT id FROM turnos WHERE repartidor_id='$repartidor_id' AND fin IS NULL";
                $resultadoTurno = mysqli_query($conexion, $consultaTurno);

                if ($turno = mysqli_fetch_assoc($resultadoTurno)) {
                      // Hay turno abierto
                    $idTurno = $turno['id'];
                    $actualizar = "UPDATE turnos SET fin=NOW() WHERE id='$idTurno'";
                    if (mysqli_query($conexion, $actualizar)) {
                        $mensaje="Turno iniciado correctamente,adios";
                        $mensajeUrlencode=urlencode($mensaje);
                        header("Location:index.php?mensaje=$mensajeUrlencode");

                    } else {
                        $mensaje="Error al finalizar el turno.";
                        $mensajeUrlencode=urlencode($mensaje);
                        header("Location:index.php?mensaje=$mensajeUrlencode");
                    }
                } else {
                     // No hay turno abierto
                    $insertar = "INSERT INTO turnos (repartidor_id, inicio) VALUES ('$repartidor_id', NOW())";
                    if (mysqli_query($conexion, $insertar)) {
                        $mensaje="Turno iniciado correctamente,bienvenido";
                        $mensajeUrlencode=urlencode($mensaje);
                        header("Location:index.php?mensaje=$mensajeUrlencode");
                    } else {
                        $mensaje="Error al iniciar el turno";
                        $mensajeUrlencode=urlencode($mensaje);
                        header("Location:index.php?mensaje=$mensajeUrlencode");
                    }
                }
            } else {
                $mensaje="Contraseña incorrecta";
                $mensajeUrlencode=urlencode($mensaje);
                header("Location:index.php?mensaje=$mensajeUrlencode");

            }
        } else {
            $mensaje="Usuario no encontrado";
            $mensajeUrlencode=urlencode($mensaje);
            header("Location:index.php?mensaje=$mensajeUrlencode");
        }
    } else {
        
        $mensaje="No se pudo seleccionar la base de datos";
            $mensajeUrlencode=urlencode($mensaje);
            header("Location:index.php?mensaje=$mensajeUrlencode");
    }
}catch (Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
 ?>