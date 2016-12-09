<?php
namespace Newsfeed\Lib;

use Newsfeed\Model\User;

class Session {

	public static function login($email) {
		$_SESSION['login_user'] = $email;
	}

	public static function logout() {
		if(null!=Session::getLoggedInUser()) {
			session_unset();
			session_destroy();
			header("location: /");
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
