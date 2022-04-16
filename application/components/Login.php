<?php
include('../data/LoginData.php');
//@gadrawingz @donnekt

class Login{

	public function __construct() {}

	public function adminLogin($email, $password) {

		error_reporting(0);
		$call = new LoginData;
		$stmt = $call->doAdminLogin($email, $password);
		$row  = $stmt->FETCH(PDO::FETCH_ASSOC);

		if(($email==$row['email']) && ($password==$row['password'])) {
			$_SESSION['admin_id']		= $row['admin_id'];
            $_SESSION['admin_names'] 	= $row['full_name'];
            echo "<script>window.location='../main/dashboard'</script>";
        } else {	
			echo "<script>window.location='../log_err_a/invalid'</script>";
		}
	}

	public function policeStationLogin($username, $password) {
		error_reporting(0);
		$call = new LoginData;
		$stmt = $call->doPSLogin($username, $password);
		$row  = $stmt->FETCH(PDO::FETCH_ASSOC);

		if(($username==$row['username']) && ($password==$row['password'])) {
			$_SESSION['ps_id']		= $row['station_id'];
            $_SESSION['username'] 	= $row['username'];
            $_SESSION['ps_name'] 	= $row['station_name'];
            echo "<script>window.location='../main/dashboard'</script>";
        } else {	
			echo "<script>window.location='../log_err_p/invalid'</script>";
		}
	}


}
?>