<?php

namespace Newsfeed\Controller\HomeHandler;

use Newsfeed\Lib\Session;

class HomeHandler {
	public function get() {
		$user = Session::getLoggedInUser();
		if($user) {
			header("location: /login");
		} else {
			include('views/Home.php');
		}
	}
}

?>