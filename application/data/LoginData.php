<?php

require_once('../../config/DBConfig.php');

/**********************************************************
 * MADE UNDER THE CONTROL OF:
 * @donnekt and @gadrawingz
 * Go to: https://www.donnekt.com
 * *******************************************************/

class LoginData extends DBConfig {

	public function __construct() {
		$obj = new DBConfig;
		$this->con= $obj->connect();
	}
	
	public function doAdminLogin($email, $pass) {
        $sql= "SELECT * FROM `admin` WHERE email='$email' AND password='$pass' ";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function doPSLogin($username, $pass) {
        $sql= "SELECT * FROM `police_station` WHERE username='$username' AND password='$pass' ";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }


   
}

?>