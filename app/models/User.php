<?php

namespace Newsfeed\Model\User;

class User {

	private $id;
	private $username;
	private $email;
	private $password;

	public function __construct($user_params) {
		this->update_user_params($user_params);
	}

	public static function createUser($username, $email, $password) {
		$query = Database::get_instance()->prepare("
			INSERT INTO users (username, email, password)
			VALUES (:username, :email, :password)
			");
		query->bindParam(':username', $username);
		query->bindParam(':email', $email);
		query->bindParam(':password', $password);

		query->execute();
	}

	public static function getUser($email, $password) {
		$query = Database::get_instance()->prepare("
			SELECT * FROM users WHERE email = :email AND password = :password
			");
		query->bindParam(':email', $email);
		query->bindParam(':password', $password);

		query->execute();

		$user_params = $query->fetch(PDO::FETCH_ASSOC);
		return new static($user_params);
	}

	public static function getUserByEmail($email) {
		$query = Database::get_instance()->prepare("
			SELECT * FROM users WHERE email = :email
			");
		query->bindParam(':email', $email);

		query->execute();

		$user_params = $query->fetch(PDO::FETCH_ASSOC);
		return new static($user_params);
	}

	private function update_user_params($user_params) {
		this->id = (int)$user_params['id'];
		this->username = $user_params['username'];
		this->email = $user_params['email'];
		this->password = $user_params['password'];
	}
}
?>