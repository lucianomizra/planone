<?php
	session_start();
	
	
	//setcookie("login",  0, time()+3600,"/",""); 
	
session_destroy();
header('Location: ../admin/propiedades.php');