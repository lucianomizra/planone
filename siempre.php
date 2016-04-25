<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_ALL, 'esMX.utf-8');
define('DIR', dirname(__FILE__) . '/');
session_start();
require_once(DIR.'objects/b.php');
require_once(PATH.'db/pdo.mysql.class.php');

if( !isset($settings) ) $settings = array();

$con            = new DBConnector();
$b         = new b($con , PATH, $settings);

$location = $b->nuevo('location');


function view($view,$params=null) {

	global $b, $section, $title, $location;

	if(is_array($params)) {
		foreach ($params as $key => $value) {
			$$key = $value;
		}
	}

	include PATH . 'views/'.$view.'.php';

}

function redirect($to, $status = 303) {

   header('Location: ' . PATH . $to, true, $status);
   die();
}
