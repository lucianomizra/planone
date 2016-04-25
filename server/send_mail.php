<?php 

	if(isset($_POST['name']) && strlen($_POST['name']) < 1) { echo json_encode(array('success'=>false,'message'=> 'Ingresa tu nombre valido','error'=> 'name')); die(); }
	if(isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { echo json_encode(array('success'=>false,'message'=> 'Correo electronico invalido','error'=> 'email')); die(); }
	if(isset($_POST['message']) && strlen($_POST['message']) < 10) { echo json_encode(array('success'=>false,'message'=> 'El comentario tiene que tener al menos 30 caracteres.','error'=> 'comment')); die(); }
	
	
	$para      = 'lucianomizrahi@gmail.com';
	$titulo = 'Contacto Web - '.$_POST['name'];
	$mensaje = "
		<html>
		<head>
		  <title>$titulo</title>
		</head>
		<body>
			<strong>Nombre: </strong> {$_POST['name']} <br />
			<strong>Mail: </strong> {$_POST['email']} <br />
			<strong>Comentarios: </strong>
			<p>
				{$_POST['message']} 
			</p>
		</body>
		</html>
		";
	$cabeceras = 'From: '.$_POST['email'] . " \r\n" .
		'Reply-To: '. $para . " \r\n" .
		'X-Mailer: PHP/' . phpversion();
	$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

	mail($para, $titulo, $mensaje, $cabeceras);
	
	echo json_encode(array('success'=>true,'message'=> 'El mensaje fue enviado'));
?>