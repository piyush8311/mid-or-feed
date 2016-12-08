<?php
require 'vendor/autoload.php'

session_start();

ToroHook::add('404', function() {
	echo "Page Not Found";
});

Toro::serve(array(
	"/" =>
));
?>