<?php 

	if (!isset($_POST['province'])) die; 

	define('PATH', '../');
	require_once(PATH.'siempre.php');
	

	$location->setLocation('province', $_POST['province']);

	echo json_encode(array('success'=>true));
