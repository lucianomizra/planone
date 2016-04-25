<?php class cars extends b { 

	protected $table 	= 'cars';
	public $id;
	public $name;
	public $brands_id;
	public $thumbnail;
	public $description;
	public $thumbnail_brand;
	public $cuota1;
	public $cuota2;
	public $plan1;
	public $plan2;

	public function __construct($val){
		parent::__construct();
		
		$this->con	= $val[0];
		$this->route = $val[1];
		$identi = (isset($val['id'])) ? $val['id'] : null;
		$this->show_all = (isset($val['show_all'])) ? $val['show_all'] : false;
		$this->random = (isset($val['random'])) ? $val['random'] : false;



		if(is_numeric($identi)) {
			$this->id = $identi;
			
			$r = $this->get();
			if(is_array($r)) {

				foreach ($r as $key => $value) {
					$this->$key = $value;
				}
			}
		} else {

			$this->brands_id = (isset($val['brands_id'])) ? $val['brands_id'] : false;
			$this->limit = (isset($val['limit'])) ? $val['limit'] : false;

			$r = $this->get();

			$this->r = $r;
		}

		if($r){ $this->exists = true; }
		else { $this->exists = false; }		
	}
	
	private function get() {

		$sql = "SELECT cars.`name`, cars.`id`, cars.`thumbnail` AS thumbnail,
				cars.`cuota1`, cars.`cuota2`, cars.`plan1`, cars.`plan2`, cars.status, cars.brands_id AS brands_id,
				brands.`thumbnail` AS thumbnail_brand,
				brands.`brand` AS brand
				FROM cars 
				LEFT JOIN brands ON cars.brands_id = brands.id
				WHERE 1 ";



		if( ! is_null($this->id) ) {
			$sql .= " AND cars.id = ".$this->id;
			$r = $this->con->query($sql);
			$result = (isset($r[0])) ? $r[0] : false;

		} else {

			$values = array();

			if( ! $this->show_all ) {
				$sql .= "AND cars.status = 'active'";
			}
			if ( $this->brands_id && is_numeric($this->brands_id) ) {
				$sql .= "AND brands_id = :brands_id";
			$r = $this->con->query($sql,$values);
				$values = array('brands_id'=>$this->brands_id);
			}

			
			if( $this->random ) $sql .= " ORDER BY RAND() ";
			else $sql .= " ORDER BY cars.position";
			if(is_numeric( $this->limit ) ) $sql .= " LIMIT " . $this->limit;

			$r = $this->con->query($sql,$values);

			$result = (isset($r[0])) ? $r : false;
		}

		return $result;
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

}

?>