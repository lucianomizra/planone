<?php 
class location {
	
	public $user_location;

	function __construct(){

		$this->user_location = (isset($_SESSION['location']) && $_SESSION['location']) ? $_SESSION['location'] : false;

		$this->provinces = array(
		'0' => 'Capital Federal',
		'1' => 'Buenos Aires-GBA Norte',
		'2' => 'Buenos Aires-GBA Oeste',
		'3' => 'Buenos Aires-GBA Sur',
		'4' => 'Buenos Aires Provincia',
		'5' => 'Catamarca',
		'6' => 'Chaco',
		'7' => 'Chubut',
		'8' => 'Córdoba',
		'9' => 'Corrientes',
		'10' => 'Entre Ríos',
		'11' => 'Formosa',
		'12' => 'Jujuy',
		'13' => 'La Pampa',
		'14' => 'La Rioja',
		'15' => 'Mendoza',
		'16' => 'Misiones',
		'17' => 'Neuquén',
		'18' => 'Río Negro',
		'19' => 'Salta',
		'20' => 'San Juan',
		'21' => 'San Luis',
		'22' => 'Santa Cruz',
		'23' => 'Santa Fe',
		'24' => 'Santiago del Estero',
		'25' => 'Tucumán');
	}

	public function setLocation ($type, $id) {

		$_SESSION['location'][$type] = $id;

	}

	public function unsetLocation () {
		$_SESSION['location'] = false;

	}

	public function getProvince( $id ) {
		
		if( isset($this->provinces[$id] ) )
		return $this->provinces[$id];
		else return false;
	}
	
}
