<?php
require 'vendor/autoload.php';
require 'config/dbconfig.php';

/*use Newsfeed\Controller\HomeHandler;
use Newsfeed\Controller\LoginHandler;
use Newsfeed\Controller\RegisterHandler;
use Newsfeed\Controller\LogoutHandler;
*/

session_start();

ToroHook::add('404', function() {
	echo "Page Not Found";
});

Toro::serve(array(
	"/" => "Newsfeed\Controller\HomeHandler",
	"login" => "Newsfeed\Controller\LoginHandler",
	"logout" => "Newsfeed\Controller\LogoutHandler",
	"register" => "Newsfeed\Controller\RegisterHandler",
	"submit" => "Newsfeed\Controller\SubmitHandler"
));
?>