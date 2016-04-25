<?php
define('PATH','../../');
require_once(PATH.'siempre.php');
require_once(PATH.'objects/admins.php');

$con = new DBConnector();
$user = new admins($con);

if($user->detectSession()) {



	if (is_array( $_POST['positons']) ) {
		$cars = $b->nuevo('cars');

		$cars->update_positions( $_POST['positons'] );
	} else {
		//exepcion
	}
	
	header('Location: ../cars.php');

} else {

	$flash = $b->create_flash('danger' , 'Vuelve a ingresar.');	
	header('Location: ../');
	die;
	
}; 

?>