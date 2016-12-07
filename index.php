<?php
include('Toro.php');

ToroHook::add('404', function() {
	echo "Page Not Found";
});

Toro::serve(array(
	"/" =>
));
?>