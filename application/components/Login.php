<?php
include('../data/LoginData');

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
			echo "<script>window.location='../main/login?err=invalid'</script>";
		}
	}

	public function logoutUser($user_session) {
		if(isset($user_session) && $user_session=='admin_id') {
			unset($user_session);
			session_destroy();
			echo "<script>window.location='../main/login'</script>";
		} else {	
			echo "<script>window.location='../main/dashboard'</script>";
		}
	}


}
?>