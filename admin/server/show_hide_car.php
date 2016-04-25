<?php
define('PATH','../../');
require_once(PATH.'siempre.php');
require_once(PATH.'objects/admins.php');

$con = new DBConnector();
$user = new admins($con);

if($user->detectSession()) {

	if(isset($_GET['id'])) $id = $_GET['id']; 
		else header('Location: ../cars.php');
	if(isset($_GET['status']) && $_GET['status'] == 'active') $status = 'active';
		else $status = 'inactive';

    $car = $b->nuevo('cars',array('id'=>$_GET['id']));
    
    if(!$car->exists) {
    	echo 'Error, no encontramos ningun registro';
      die;
    } 


	$data = array(
		'id'=>$id,
		'status'=>$status
		);

	$update = $car->update($data);


	if($update) {
		if($status == 'active') {
			$flash = $b->create_flash('success' , $car->name. ': Activado');
		} else {
			$flash = $b->create_flash('warning' , $car->name. ': Desactivado');
		}
	}
	else
		$flash = $b->create_flash('danger' , 'No se pudo editar intente mas tarde');

	header('Location: ../cars.php');
} else {

	$flash = $b->create_flash('danger' , 'Vuelve a ingresar.');	
	die;
	
}; 

?>