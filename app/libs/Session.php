<?php
namespace Newsfeed\Lib;

use Newsfeed\Model;

class Session {

	public static function login($email) {
		session_start();
		$_SESSION['login_user'] = $email;
	}

	public static function logout() {
		if(getLoggedInUser()) {
			session_start();
			session_unset();
			session_destroy();
			header("location: index.html");
			exit();
		}
	}

	public static function getLoggedInUser() {
		if(!isset($_SESSION['login_user'])) {
			return null;
		} else {
			return User::getUserByEmail($_SESSION['login_user']);
		}
	}
	
}
?>
