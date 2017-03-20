<?php 
	session_start();
	session_destroy();
	$loc = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/pangitaa';
	header("Location: $loc");
	die;
?>