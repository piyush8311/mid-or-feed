<?php


require '../../config/dbconfig.php'; 
require 'Database.php';

use Newsfeed\Model\Database;

global $CONFIG;

$username = "sss";
$email = "test@123.com";
$password =  "piyushasd";
$user_id = 3;
$news = "Asdadad";

$query = Database::get_instance()->prepare("
			INSERT INTO feeds (user_id, news)
			VALUES (:user_id, :news)
			");
		$query->bindParam(':user_id', $user_id);
		$query->bindParam(':news', $news);
		//$query->bindParam(':password', $password);

		$query->execute();

//$user_params = $query->fetch(\PDO::FETCH_ASSOC);
//echo $user_params['id'];
?>