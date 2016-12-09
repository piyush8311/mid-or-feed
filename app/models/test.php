<?php


require '../../config/dbconfig.php'; 

global $CONFIG;


$email = "Asda";
$password =  "nbv";
$instance = new \PDO("mysql:host={$CONFIG['host']};dbname={$CONFIG['dbname']}", $CONFIG['username'], $CONFIG['password']);
$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
$instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

$query = $instance->prepare("
			SELECT * FROM users WHERE email = :email AND password = :password
			");
		$query->bindParam(':email', $email);
		$query->bindParam(':password', $password);

		$query->execute();

		$user_params = $query->fetch(\PDO::FETCH_ASSOC);
if($user_params)
	echo 123;
?>