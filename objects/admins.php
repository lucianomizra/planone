<?php 
class admins {
	
	function __construct($con){
		$this->con = $con;
	}
	
	public function login($user,$passwd){
		$sql = "SELECT name FROM user_admin WHERE name = :user AND passwd = :passwd;";
		
		$values = array('user'=>$user,'passwd'=> md5($passwd));

		$r = $this->con->query($sql,$values);
		return (isset($r[0]['name'])) ? $r[0]['name'] : false;
	}

	public function detectSession() {
	  if(isset($_SESSION['login']) && $_SESSION['login']) {
	    return true;
	  } else return false;
	}
}
