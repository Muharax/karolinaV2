<?php
	// error_reporting(E_ALL);

session_start();

defined('URL') or define('URL', 'http://'.$_SERVER['SERVER_NAME']. "/karolina/");

	if(!isset($_SESSION['zalogowany'])){
		// header('Location: '.URL.'index.php');';
	}else{
		$_SESSION['token'] = md5(microtime(true).mt_Rand());
	}

	
	
?>