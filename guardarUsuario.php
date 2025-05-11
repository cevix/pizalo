<?php 

include 'db.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$dni = $_POST['dni'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $pdo-> prepare("INSERT INTO repartidores (nombre, email, dni , password) VALUES (?,?,?,?))")
$stmt->execute([$nombre,$email,$dni,$password]);

echo "Repartidor registrado";

?>