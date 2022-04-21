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

    public function doVisitorLogin($telephone, $pass) {
        $sql= "SELECT * FROM `user` WHERE telephone='$telephone' AND password='$pass' ";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }




    // ################################
    public function viewPSAccount($id) {
        $sql = "SELECT * FROM police_station WHERE station_id='$id' ";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function updatePSAccount($id, $username, $password) {
        $sql="UPDATE police_station SET username='$username', password='$password' WHERE station_id='$id' ";
        $query= $this->con->prepare($sql);
        $query->execute();
        $count= $query->rowCount();
        return $count;
    }

    public function viewUserAccount($id) {
        $sql = "SELECT * FROM user WHERE user_id='$id' ";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function updateUserAccount($id, $fn, $tel, $password) {
        $sql="UPDATE user SET full_name='$fn', telephone='$tel', password='$password' WHERE user_id='$id' ";
        $query= $this->con->prepare($sql);
        $query->execute();
        $count= $query->rowCount();
        return $count;
    }

   
}

?>