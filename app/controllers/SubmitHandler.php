<?php

namespace Newsfeed\Controller;

use Newsfeed\Lib\Session;
use Newsfeed\Model\Feed;

class SubmitHandler {
	public function post() {
		$news = $_POST['news'];
		$user = Session::getLoggedInUser();
		Feed::createFeed($user, $news);

		echo $news;
	}
}

?>