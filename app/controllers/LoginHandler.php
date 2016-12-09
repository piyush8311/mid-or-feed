<?php

namespace Newsfeed\Controller\LoginHandler;

use Newsfeed\Lib\Session;
use Newsfeed\Model\User;

class LoginHandler {

	public function get() {
		$user = Session::getLoggedInUser();
		if($user) {
			include('views/login.php');
		} else {
			header("location: /");
		}
	}

	public function post() {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user = User::getUser($email, $password);

		if($user) {
			Session::login($email);
			include('views/login.php');
		} else {
			header("location: /");
		}			
	}
}
?>