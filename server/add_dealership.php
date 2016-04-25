<?php
define('PATH','../');
require_once(PATH.'siempre.php');
require_once(PATH.'objects/admins.php');

$con = new DBConnector();
$user = new admins($con);

$id = (isset($_POST['id'])) ? $_POST['id'] : false;

$dealership = $b->nuevo('dealerships');

$status = 'inactive';
$redirect_to = PATH.'concesionaria/nueva/';
if($user->detectSession() && isset($_POST['is_panel_admin']) ) {
	$status = 'active';
	$redirect_to = PATH.'admin/dealership.php';
}

$errors = array();

if(!isset($_POST['owner_name']) or strlen($_POST['owner_name']) < 2) { array_push($errors, 'owner_name'); }
if(!isset($_POST['phone']) or strlen($_POST['phone']) < 3) { array_push($errors, 'phone'); }
if(!isset($_POST['email']) or filter_var($_POST['phone'], FILTER_VALIDATE_EMAIL)) { array_push($errors, 'email'); }
if(!isset($_POST['name']) or strlen($_POST['name']) < 2) { array_push($errors, 'name'); }
if(!isset($_POST['dealerships-brands']) or count($_POST['dealerships-brands']) <= 0) { array_push($errors, 'dealerships-brands'); }

if( count( $errors ) ) {
	echo json_encode(array('type'=>'danger' , 'menssage'=>'Corrija los campos en rojo','errors'=>$errors));
	$flash = $b->create_flash('danger' , 'Corrija los campos en rojo',array(
		'post'=>$_POST,
		'errors'=>$errors
		));
	header('Location: '.$redirect_to);
}

include('upload_dealerships_thumbnail.php');

$data = array(
	'status' => $status,
	'owner_name' => $_POST['owner_name'],
	'phone' => $_POST['phone'],
	'email' => $_POST['email'],
	'name' => $_POST['name'],
	'province' => $_POST['province'],
	'description' => $_POST['description'],
);

if ( !empty($_FILES) && $_FILES['thumbnail']['name'] ) {
	$data['thumbnail'] = $thumbnail;
}
foreach($data as $i => $v) {
	$data[$i] = htmlentities($v, ENT_QUOTES, "ISO-8859-1");
} 

if( $id && $user->detectSession() ) {
	$data['id'] = $id;
	$r = $dealership->update($data);
	$d = $dealership->delete_old_brands($id);
	$insert_id = $id;
	
} else {
	$r = $dealership->save($data);
	$insert_id = $r;
}
if( $r ) {

	$brands_data = array();
	foreach ($_POST['dealerships-brands'] as $key => $value) {
		$brand_data = array(
			'dealerships_id'=>$insert_id,
			'brands_id'=>$value,
			);
		$insert = $b->insert_array('brands_has_dealerships' , $brand_data);
	}

	$flash = $b->create_flash('success' , 'Guardamos correctamente');

	if($user->detectSession() && isset($_POST['is_panel_admin']) ) {
		$redirect_to = PATH.'admin/dealerships.php';
	} else {
		$redirect_to = PATH.'concesionaria/nueva/success.php';
	}
} else {

	$flash = $b->create_flash('danger' , 'Error al guardar');
}

header('Location: '.$redirect_to);

?>
