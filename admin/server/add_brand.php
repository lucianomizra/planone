<?php
define('PATH','../../');
require_once(PATH.'siempre.php');
require_once(PATH.'objects/admins.php');

$con = new DBConnector();
$user = new admins($con);

if($user->detectSession()) {

	$id = (isset($_POST['id'])) ? $_POST['id'] : false;

    $brand = $b->nuevo('brands');

	$brand_name = $_POST['brand'];
	$description = $_POST['description'];
	$link = strtolower(str_replace(' ', '-', $b->sanear_string($_POST['brand'])));
	$thumb = (isset($_SESSION['thumb'])) ? $_SESSION['thumb'] : null;

	$data = array(
		//'thumbnail'=>$thumb,
		'link'=>$link,
		'brand'=>$brand_name,
		'description'=>$description,
		);



	if($id) {
		$data['id'] = $id;
		$add = $brand->update($data);
	} else {
		$add = $brand->save($data);
	}

	if($add)
	{

		$flash = $b->create_flash('success' , 'Guardamos correctamente');

		//header('Location: ../brand.php?id='.$add);
		header('Location: ../brands.php');
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