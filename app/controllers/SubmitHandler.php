<?php

namespace Newsfeed\Controller;

use Newsfeed\Lib\Session;
use Newsfeed\Model\Feed;

class SubmitHandler {
	public function get() {
		$news = $_GET['news'];
		$user = Session::getLoggedInUser();
		Feed::createFeed($user, $news);

		echo "<li>" . $news . "</li>";
	}
}

?>