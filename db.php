
<?php 

	$host = '';
	$dbname = '';
	$user = '';
	$pass = '';


	try{
		$pdo = new PDO("mysql:host= $host;dbname=$dbname;charset=utf8",$user,$pass)
	}catch(PDOException $e){
		die("Error de conexion:" . $e -> getMessage());
	}



 ?>