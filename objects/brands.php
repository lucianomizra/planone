<?php class brands extends b { 

	protected $table 	= 'brands';
	public $id, $permalink;

	public function __construct($val){
		parent::__construct();
		
		$this->con	= $val[0];
		$this->route = $val[1];
		$this->link = (isset($val['link'])) ? $val['link'] : false;
		$identi = (isset($val['id'])) ? $val['id'] : null;

		if(is_numeric($identi) || $this->link) {
			$this->id = $identi;
			
			$r = $this->get();
			$r = $r[0];
			foreach ($r as $key => $value) {
				$this->$key = $value;
			}

		} else {
			$r = $this->get();

			$this->r = $r;
		}

		$this->exists = is_numeric($this->id);
		
	}
	
	private function get() {
		if( is_numeric($this->id) ) {
			$sql = "SELECT * FROM $this->table WHERE id = :id";
			$values = array('id'=>$this->id);
		} else if ( $this->link ) {
			$sql = "SELECT * FROM $this->table WHERE link = :link";
			$values = array('link'=>$this->link);
		} else {
			$sql = "SELECT * FROM $this->table ORDER BY position";
			$values = array();
		}
		
		$r = $this->con->query($sql,$values);

		return (isset($r[0])) ? $r : false;
	}
	
	public function update_positions($positons) {
		
		foreach ($positons as $id => $position) {
			$sql = "UPDATE $this->table SET position = :position WHERE id = :id";
			$values = array(
				'id' => $id,
				'position' => $position
				);

			$this->con->query_update($sql, $values);

		}
		
		return true;
	}

	public function parent_dealership ($brands_id, $province) {
		$sql = "SELECT dealerships.name, dealerships.thumbnail, dealerships.id, brands.id AS brands_id
				FROM brands
				JOIN brands_has_dealerships ON brands_has_dealerships.brands_id = brands.id
				JOIN dealerships ON brands_has_dealerships.dealerships_id = dealerships.id
				WHERE province = :province
				AND brands.id = :brands_id
				AND dealerships.status = 'active'";

		$values = array(
			'brands_id' => $brands_id,
			'province' => $province
			);

		$r = $this->con->query($sql,$values);

		return (isset($r[0])) ? $r[0] : false;
	}


}

?>