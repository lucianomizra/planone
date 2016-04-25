<?php class b {

	public $route   = null;
	public $con 	= false;
	public $settings 	= array();
	
	function __construct ($con = null, $route = null, $settings = array() ) {
		$this->route	= $route;
		$this->con	= $con;
		$this->settings	= $settings;
	}

	public function is_panel_admin() {
		if( isset($this->settings['is_panel_admin']) ) {
			return $this->settings['is_panel_admin'];
		} else {
			return false;
		}
	}

	public function get_date() {
		return date('Y-m-d H:i:s');
	}
	
	public function nuevo ($objeto,$parametros = null) {
		if(!is_null($parametros)) { array_unshift($parametros,$this->con,$this->route); } 
		else { $parametros = array($this->con,$this->route); }
		require_once($this->route . 'objects/'.$objeto.'.php');
		$$objeto    = new $objeto($parametros);

		return $$objeto;
	}

	public function random_code() {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		$c = substr( str_shuffle( $chars ), 0, 10 );
		return $c;
	}
	
	public function insert_array($table , $data){
		foreach ($data as $field=>$value) {
			$fields[] = '`' . $field . '`';
			$valuesData[] = ":" . $field;
		};
		$field_list = implode(',', $fields);
		$value_list = implode(', ', $valuesData);
		
		$sql = "INSERT INTO `" . $table . "` (" . $field_list . ") VALUES (" . $value_list . ")";
		$values = $data;
		
		$res = $this->con->query_insert_return_id($sql, $values);

		return $res;
	}	

	public function update_array($con , $table , $data){
		$string = '';

		foreach ($data as $key => $value) {
			if(isset($value) /*&& $value */&& $value != 'id') {
				$string .= '`'. $key . '` = :'.$key.', ';
			}
		};
				
		$sql = "UPDATE $table SET ".trim($string,', ')." WHERE `id` = \"{$data['id']}\"";
		$values = $data;


		$res = $con->query_update($sql, $values);

		return $res;
	}


	public function create_flash($type , $message, $extra = array() ){
		$_SESSION['univ_flash'] = array(
			'type'=>$type,
			'message'=>$message,
			'extra'=>$extra
		);
	}
	
	public function delete_flash(){
		$_SESSION['univ_flash'] = null;
	}


	public function save($data) {
		$data["created_at"] = $this->get_date();

		return $this->insert_array($this->table , $data);
	}


	public function update($data) {
		$data["updated_at"] = $this->get_date();
		return $this->update_array($this->con , $this->table , $data);
	}

	public function delete() {
		$sql = "DELETE FROM `$this->table` WHERE `id` = :id ";
		$values = array(
			'id'=>$this->id
		);

		return $this->con->query_delete($sql , $values);
	}

	public function sanear_string($string)
	{

	    $string = trim($string);

	    $string = str_replace(
	        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
	        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
	        $string
	    );

	    $string = str_replace(
	        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
	        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
	        $string
	    );

	    $string = str_replace(
	        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
	        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
	        $string
	    );

	    $string = str_replace(
	        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
	        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
	        $string
	    );

	    $string = str_replace(
	        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
	        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
	        $string
	    );

	    $string = str_replace(
	        array('ñ', 'Ñ', 'ç', 'Ç'),
	        array('n', 'N', 'c', 'C',),
	        $string
	    );

	    //Esta parte se encarga de eliminar cualquier caracter extraño
	    $string = str_replace(
	        array("\\", "¨", "º", "-", "~",
	             "#", "@", "|", "!", "\"",
	             "·", "$", "%", "&", "/",
	             "(", ")", "?", "'", "¡",
	             "¿", "[", "^", "`", "]",
	             "+", "}", "{", "¨", "´",
	             ">", "< ", ";", ",", ":",
	             ".", " "),
	        '-',
	        $string
	    );


	    return $string;
	}

	public function html ($str) {

		$str = html_entity_decode($str, ENT_COMPAT, "ISO-8859-1");

	    $arrMojis = explode("%u",$str); 
	    for ($i = 1;$i < count($arrMojis);$i++){ 
		        $c = substr($arrMojis[$i],0,4); 
		        $cc = mb_convert_encoding(pack('H*',$c),$outCharCode,'ISO-8859-1'); 
		        $arrMojis[$i] = substr_replace($arrMojis[$i],$cc,0,4); 
		    } 
	    return implode('',$arrMojis); 

	}
}

?>