<?php
require 'vendor/autoload.php';

use Newsfeed\Model\HomeHandler;
use Newsfeed\Model\LoginHandler;
use Newsfeed\Model\RegisterHandler;

session_start();

ToroHook::add('404', function() {
	echo "Page Not Found";
});

Toro::serve(array(
	"/" => "HomeHandler",
	"login" => "LoginHandler",
	"register" => "RegisterHandler"
));
?>