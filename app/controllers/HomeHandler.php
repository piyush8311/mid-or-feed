<?php

namespace Newsfeed\Controller;

use Newsfeed\Lib\Session;

class HomeHandler {
	public function get() {
		$user = Session::getLoggedInUser();
		if($user) {
			header("location: /login");
		} else {
			include("app/views/Home.php");
		}
	}
}

?>