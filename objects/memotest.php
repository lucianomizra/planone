<?php class memotest extends b { 

	protected $table 	= 'memotest';

	public function __construct($val){
		parent::__construct();
		
		$this->con	= $val[0];
		$this->route = $val[1];
		// Reescribir cuando tenga ganas esto con if y elseif
		$this->id = (isset($val['id'])) ? $val['id'] : null;
		$this->empresa_id = (isset($val['empresa_id'])) ? $val['empresa_id'] : null;

		$this->exists = is_numeric( $this->id );

		$r = $this->get();
		$this->r = $r;
		
	}
	
	private function get() {

		if(! is_null($this->id)) {
			$sql = "SELECT * FROM $this->table WHERE id = :id";
			$values = array('id'=>$this->id);
			$r = $this->con->query($sql,$values);
			return (isset($r[0])) ? $r : false; 
		} elseif ( ! is_null($this->empresa_id) ) {
			$sql = "SELECT * FROM $this->table WHERE empresa_id = :empresa_id";
			$values = array('empresa_id'=>$this->empresa_id);
			$r = $this->con->query($sql,$values);
			return (isset($r[0])) ? $r : false; 
		} else {
			$sql = "SELECT * FROM $this->table";
			$r = $this->con->query($sql);
			return (isset($r[0])) ? $r : false;		
		}

	}


	public function update($data) {
		$sql = "UPDATE  {$this->table} SET  name = :name, thumbnail = :thumbnail, description = :description WHERE id = :id;";
		$values = array(
			'name'=>$data['name'],
			'thumbnail'=>$data['thumbnail'],
			'description'=>$data['description'],
			'id'=>$this->id
		);

		$r = $this->con->query_update($sql , $values);

		return $r;
	}
	
}

?>