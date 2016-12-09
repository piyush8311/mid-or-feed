<?php

namespace Newsfeed\Model\Database;

class Database {
	private static $instance;

	public static function get_instance() {

		global $CONFIG;
		
		if(!self::$instance) {
			self::$instance = new PDO("mysql:host='localhost';dbname='newsfeed'", "root", "piyush123");
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		self::$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    		return self::$instance;
		}
	}
}
?>