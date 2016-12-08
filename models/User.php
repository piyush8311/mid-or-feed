<?php
include('Database.php');

class User {

	public static function createUser($username, $email, $password) {
		$query = Database::get_instance()->prepare("
			INSERT INTO Users (username, email, password)
			VALUES (:username, :email, :password)
			");
		query->bindParam(':username', $username);
		query->bindParam(':email', $email);
		query->bindParam(':password', $password);

		query->execute();
	}

	public static function getUser($email, $password) {
		$query = Database::get_instance()->prepare("
			SELECT * FROM Users WHERE email = :email AND password = :password
			");
		query->bindParam(':email', $email);
		query->bindParam('password', $password);

		query->execute();

		return $query->fetch(PDO::FETCH_ASSOC);
	}
}
?>