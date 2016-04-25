<?php
define('PATH','../../');
require_once(PATH.'siempre.php');
require_once(PATH.'objects/admins.php');

$con = new DBConnector();
$admins = new admins($con);

$user = $_POST['user'];
$passwd = $_POST['passwd'];

$login = $admins->login($user,$passwd);


if($login){

	$_SESSION['usuario'] = $login;
	$_SESSION['login'] = true;
		
}else{
	$flash = $b->create_flash('danger' , 'Usuario o contrase&ntilde;a incorrecto');	
}; 

	header('Location: ../');
?>