<?php

namespace Newsfeed\Model;

class Feed {
	protected $id;
	protected $user_id;
	protected $news;
	protected $created_at;

	public function __construct($feed) {
		$this->id = $feed['id'];
		$this->user_id = $feed['user_id'];
		$this->news = $feed['news'];
		$this->created_at = $feed['created_at'];
	}

	public static function createFeed($user, $news) {
		global $CONFIG;
		$instance = new \PDO("mysql:host={$CONFIG['host']};dbname={$CONFIG['dbname']}", $CONFIG['username'], $CONFIG['password']);
		$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	    $instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
		$query = $instance->prepare("
			INSERT INTO feeds (user_id, news)
			VALUES (:user_id, :news)
		");

		$query->bindParam(":user_id", $user->getId());
		$query->bindParam(":news", $news);

		$query->execute();
	}

	public static function getFeeds() {
		global $CONFIG;
		$instance = new \PDO("mysql:host={$CONFIG['host']};dbname={$CONFIG['dbname']}", $CONFIG['username'], $CONFIG['password']);
		$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	    $instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
		$query = $instance->prepare("
			SELECT * FROM feeds ORDER BY created_at DESC;
		");

		$query->execute();

		$feeds = $query->fetchAll();
		
		//return $feeds;
		$result = array();
		foreach($feeds as $feed) {
			$result[] = new static($feed);
		}

		return $result;
	}

	public function getNews() {
		return $this->news;
	}

	public function getUserId() {
		return $this->user_id;
	}
}