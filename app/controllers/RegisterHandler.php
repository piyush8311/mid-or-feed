<?php

namespace Newsfeed\Controller;

use Newsfeed\Model\User;
use Newsfeed\Lib\Session;

class RegisterHandler {
	public function get() {
		include("app/views/register.php");
	}

	public function post() {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user = User::getUserByEmail($email);
		if(null != $user) {
			header("location: /login");
		} else {
			User::createUser($username, $email, $password);
			
			Session::login($email);

			header("location: /login");
		}
	}
}
?>