<?php
define('PATH','../../');
require_once(PATH.'siempre.php');
require_once(PATH.'objects/admins.php');

$con = new DBConnector();
$user = new admins($con);

if($user->detectSession()) {



	if (is_array( $_POST['positons']) ) {
		$brands = $b->nuevo('brands');

		$brands->update_positions( $_POST['positons'] );
	} else {
		//exepcion
	}
	
	header('Location: ../brands.php');

} else {

	$flash = $b->create_flash('danger' , 'Vuelve a ingresar.');	
	header('Location: ../');
	die;
	
}; 

?>