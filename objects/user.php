<?php class user extends b {
	
	private $table = 'user';
	public $firstname, $lastname, $tel, $mail;

	public function __construct($val){
		parent::__construct();
		
		$this->con	= $val[0];
		$this->route = $val[1];
		$this->id = (isset($val[2])) ? $val[2] : null;

		$r = $this->get();
		if($this->r = $r) {
			$this->id = $r['id'];
			$this->exists = true;
		} else {
			$this->exists = false;
		}

	}
	
	public function get () {

		$sql = "SELECT * FROM $this->table WHERE id = :id";
		$values = array(
			'id' => $this->id
		);
		$r = $this->con->query($sql,$values);
		return (isset($r[0]['id'])) ? $r[0] : false;		
	}

	public function create() {

		$sql = "INSERT INTO $this->table SET mail = :mail, firstname = :firstname, lastname = :lastname, tel = :tel";
		$values = array(
			'mail' => $this->mail,
			'firstname' => $this->firstname,
			'lastname' => $this->lastname,
			'tel' => $this->tel
		);
		return $r = $this->con->query_insert_return_id($sql,$values);
	}

	public function participar($empresa) {
		// $sql = "INSERT INTO participantes SET user_id = :user_id, create = :create, empresa_id = :empresa_id";
		$sql = "INSERT INTO  `participantes` (
		`create` ,
		`user_id` ,
		`empresa_id`
		)
		VALUES (
		:create, :user_id, :empresa_id
		);";
				$values = array(
			'create' => date("Y-m-d H:i:s"),
			'user_id' => $this->id,
			'empresa_id' => $empresa
		);
		return $r = $this->con->query_insert($sql,$values);
	}


	
};

?>