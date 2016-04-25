<?php
define('PATH','../../');
require_once(PATH.'siempre.php');
require_once(PATH.'objects/admins.php');

$con = new DBConnector();
$user = new admins($con);

if($user->detectSession()) {

	$id = (isset($_POST['id'])) ? $_POST['id'] : false;

    $car = $b->nuevo('cars');

	$car_name = $_POST['name'];
	$cuota1 = $_POST['cuota1'];
	$cuota2 = $_POST['cuota2'];
	$plan1 = $_POST['plan1'];
	$plan2 = $_POST['plan2'];
	$description = $_POST['description'];
	$brands_id = $_POST['brands_id'];


	$data = array(
		//'thumbnail'=>$thumb,
		'name'=>$car_name,
		'cuota1'=>$cuota1,
		'cuota2'=>$cuota2,
		'plan1'=>$plan1,
		'plan2'=>$plan2,
		'brands_id'=>$brands_id,
		'description'=>$description,
		);

	if(isset($_SESSION['thumb'])) 
		$data['thumbnail'] = $_SESSION['thumb'];

	foreach($data as $i => $v) {
		if($v == '') { $data[$i] = false; }
	} 

	if($id) {
		$data['id'] = $id;
		$add = $car->update($data);
	} else {
		$add = $car->save($data);
	}

	if($add)
	{

		$flash = $b->create_flash('success' , 'Guardamos correctamente');

		//header('Location: ../car.php?id='.$add);
		header('Location: ../cars.php');
	}
	else {
		$flash = $b->create_flash('danger' , 'No se pudo guardar intente mas tarde');
		header('Location: /');
	}

} else {

	$flash = $b->create_flash('danger' , 'Vuelve a ingresar.');	
	die;
	
}; 

?>