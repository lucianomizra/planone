<?php
define('PATH','../../');
require_once(PATH.'siempre.php');
require_once(PATH.'objects/admins.php');

$con = new DBConnector();
$user = new admins($con);

if($user->detectSession()) {

	if(isset($_GET['id'])) $id = $_GET['id']; else { header('Location: ../brands.php'); }
    $brand = $b->nuevo('brands',array('id'=>$_GET['id']));
    
    if(!$brand->exists) {
    	echo 'Error, no encontramos ningun registro';
      die;
    } 


	$update = $brand->delete();
	if($update)
		$flash = $b->create_flash('success' , 'Borramos correctamente');
	else
		$flash = $b->create_flash('danger' , 'No se pudo eliminar intente mas tarde');

	header('Location: ../brands.php');
} else {

	$flash = $b->create_flash('danger' , 'Vuelve a ingresar.');	
	die;
	
}; 

?>