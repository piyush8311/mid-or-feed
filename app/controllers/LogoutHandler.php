<?php

namespace Newsfeed\Controller;

use Newsfeed\Lib\Session;

class LogoutHandler {
	public function get() {
		Session::logout();
	}
}