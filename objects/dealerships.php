<?php class dealerships extends b { 

	protected $table 	= 'dealerships';
	public $id, $name, $description, $created_at, $phone, $email, $province, $thumbnail, $owner_name;
	public $brands_ids = array();

	public function __construct($val){
		parent::__construct();
		
		$this->con	= $val[0];
		$this->route = $val[1];
		$identi = (isset($val['id'])) ? $val['id'] : null;

		if(is_numeric($identi)) {
			$this->id = $identi;
			
			$r = $this->get();
			foreach ($r as $key => $value) {
				$this->$key = $value;
			}

			$this->description = $this->html($this->description);
			$this->brands_ids = $this->get_brands();

		} else {
			$r = $this->get();

			if( is_array($r) ) {
				$this->r = $r; 
			}
			else {
				$this->r = array();
			}
		}
		$this->exists = is_numeric($this->id);
		
	}
	
	private function get() {
		if( ! is_null($this->id)) {
			$sql = "SELECT *, DATE_FORMAT(created_at,'%d%/%m%/%Y') AS created_at_visual FROM $this->table WHERE id = :id";
			$values = array('id'=>$this->id);
			$r = $this->con->query($sql,$values);

			return (isset($r[0])) ? $r[0] : false;

		} else {
			$sql = "SELECT *, DATE_FORMAT(created_at,'%d%/%m%/%Y') AS created_at_visual FROM $this->table";
			$r = $this->con->query($sql);

			return (isset($r[0])) ? $r : false;
		}
	}

	public function get_brands ($id = false) {
		if(!$id) $id = $this->id;
		$sql = "SELECT brands_id, brands.brand, brands.thumbnail, brands.link FROM `brands_has_dealerships`
				LEFT JOIN brands ON brands_id = brands.id
				WHERE `dealerships_id` = ".$id;

		$r = $this->con->query($sql);

		$result = array();

		if (isset($r[0])) {
			foreach ($r as $key => $value) {
				$result[$value['brands_id']] = $value;
			}
			return $result;
		} 
		else return array();
	}

	public function get_for_banner ($province) {
		$sql = "SELECT dealerships.name, dealerships.thumbnail, dealerships.id
				FROM dealerships 
				WHERE status = 'active'
				AND province = '2'
				LIMIT 1";
		
		$values = array('province'=>$province);

		$r = $this->con->query($sql,$values);

		return (isset($r[0])) ? $r[0] : false;
	}

	public function delete_old_brands ($id) {
		$sql = "DELETE FROM `brands_has_dealerships` WHERE  `brands_has_dealerships`.`dealerships_id` = ".$id;
		return $this->con->query_delete($sql);
	}
	
	public function update_positions ($positons) {
		
		foreach ($positons as $id => $position) {
			$sql = "UPDATE $this->table SET position = :position WHERE id = :id";
			$values = array(
				'id' => $id,
				'position' => $position
				);

			$r = $this->con->query_update($sql, $values);


		}
		return true;
	}


}

?>