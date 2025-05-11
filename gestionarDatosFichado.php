<?php 

include 'db.php';

$dni = $_POST['dni'];

$password = $_POST['password'];


//Buscar usuario por el DNI

$stmt = $pdo->prepare("SELECT * FROM repartidores WHERE dni = ?");
$stmt->execute([$dni]);
$user = $stmt->fetch();

if (condition) {
	$repartidor_id = $user['id'];


	//Buscar si ya tiene un turno fichado

	$stmt = $pdo -> prepare("SELECT eid FROM turnos WHERE repartidor_id= ? AND fin IS NULL LIMIT 1");
	$stmt->execute([$repartidor_id]);
	$turno_activo = $stmt->fetch();

	if ($turno_activo) {
		$stmt = $pdo-> prepare("UPDATE turnos SET fin = NOW() Where id = ?");
		$stmt -> execute([$turno_activo['id']]);
		echo "Turno cerrado perfectamente"

	} else {
		$stmt = $pdo-> prepare("Insert INTO turnos (repartidor_id,inicio) VALUES (?, NOW())");
		$stmt-> execute([$repartidor_id]);
		echo "Turno iniciado correctamente";
	}
	

} else {
	echo "DNI o contraseña incorrectos";
}


 ?>