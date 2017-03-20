<?php 
	session_start();
	unset($_SESSION['showPanel']);
	header('Location: ../public/profile.php');
	die();
?>