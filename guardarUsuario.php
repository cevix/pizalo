<?php 

include 'db.php';



$nombre = $_POST['name'];
$apellidos= $_POST['lastName'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$dni = $_POST['dni'];


$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
$idUnico = bin2hex(random_bytes(8));


$conexion = mysqli_connect($hostname, $username, $password, $dbname);


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$consulta = "INSERT INTO repartidores (id,nombre,apellido, email, telefono, dni , password_hash) VALUES ('$idUnico','$nombre','$apellidos','$email','$telefono','$dni' ,'$password_hash')";

$resultado=mysqli_query($conexion, $consulta);
if ($resultado) {
    echo "Registro insertado correctamente.";
} else {
    echo "Error: " . mysqli_error($conexion);
}

?>