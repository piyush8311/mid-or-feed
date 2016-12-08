<?php
class Database {
	private static $instance;

	public static function get_instance() {

		if(!$instance) {
			$instance = new PDO("mysql:host='localhost';dbname='newsfeed'", "root", "piyush123");
			$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    		return $instance;
		}
	}
}
?>