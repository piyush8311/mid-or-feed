<?php

namespace Newsfeed\Model;

class Database {
	private static $instance;

	public static function get_instance() {

		global $CONFIG;
		try {
			if(!self::$instance) {
				self::$instance = new \PDO("mysql:host={$CONFIG['host']};dbname={$CONFIG['dbname']}", $CONFIG['username'], $CONFIG['password']);
				self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	    		self::$instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
			}
		} catch(PDOException $e) {
			echo "Error ";
		}
   		return self::$instance;
	}
}
?>