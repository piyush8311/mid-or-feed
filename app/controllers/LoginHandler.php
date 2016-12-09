<?php

namespace Newsfeed\Controller;

use Newsfeed\Lib\Session;
use Newsfeed\Model\User;

class LoginHandler {

	public function get() {
		$user = Session::getLoggedInUser();
		if(null!=$user) {
			include('app/views/login.php');
		} else {
			header("location: /");
		}
	}

	public function post() {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$user = User::getUser($email, $password);

		if(null!=$user) {
			Session::login($email);
			include('app/views/login.php');
		} else {
			header("location: /");
		}			
	}
}
?>