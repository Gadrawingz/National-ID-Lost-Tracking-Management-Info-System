<?php

require_once('../../config/DBConfig.php');

/**********************************************************
 * MADE UNDER THE CONTROL OF:
 * @donnekt and @gadrawingz
 * Go to: https://www.donnekt.com
 * *******************************************************/

class IDAllData extends DBConfig {

	public function __construct() {
		$obj = new DBConfig;
		$this->con= $obj->connect();
	}

	public function postFoundID($id_names, $id_num, $id_dob, $id_sex, $is_dist, $is_sect, $image_file, $u_location, $v_id) {

		// Taking care of file name
        $format = new AppConfig();

		//$file_name = $format->urlFormatter($id_names)."-".$id_num.".";
		$file_name = $image_file['name'];
        $file_temp = $image_file['tmp_name'];
        $file_type = $image_file['type'];

        $mimes = [
        	'image/jpeg', 'image/pjpeg', 'image/png', 
        	'image/x-png', 'image/tiff', 'image/gif'
        ];

        // Check for existing data
        $idsql = "SELECT COUNT(*) FROM `found` WHERE nid_number='".$id_num."' ";
        $idst = $this->con->prepare($idsql);
        $idst->execute();


        if(!in_array($file_type, $mimes)){
        	return " Uploaded file is not image supported!";

        } else if($id_names=='' || $id_num=='' || $id_dob=='' || $id_sex=='' || $is_dist=='' || $is_sect=='' || $image_file=='' || $u_location=='' || $v_id=='' ){
            return '<span class="c-white-red"> Some fields are empty!</span>';
        	
        } else if(strlen($id_num)!=16){
            return '<span class="c-white-red">ID should have 16 numbers!</span>';

        } else if($v_id=='0'){
            return '<span class="c-white-red">Account is not setup!</span>';

        } else if($idst->fetchColumn()!=0) {
            return '<span class="c-white-red">This National ID already posted!</span>';

        } else {
        	$uploadFilePath = '../../uploads/'.basename($file_name);
        	move_uploaded_file($file_temp, $uploadFilePath);
        	
        	$sql= "INSERT INTO `found`(`nid_names`, `nid_number`, `nid_dob`, `nid_sex`, `issued_dist`, `issued_sect`, `nid_image`, `found_location`, `user_id`) VALUES ('".addslashes($id_names)."', '$id_num', '$id_dob', '$id_sex', '$is_dist', '$is_sect', '".$file_name."', '".addslashes($u_location)."', '$v_id')";
        	$query= $this->con->prepare($sql);
        	$query->execute();
        	$count= $query->rowCount();

        	// DEALING WITH LOST_CHECK TABLE:
        	$checkExistSql = "SELECT COUNT(*) FROM `lost_check` WHERE nid_number='$id_num' ";
        	$actionSTMT = $this->con->prepare($checkExistSql);
        	
        	$actionSTMT->execute();
        	if($actionSTMT->fetchColumn()=='0') {
        		// Marking ID as Found, But has_reward=0, is_received=0 @gadrawingz
        		$q="INSERT INTO `lost_check`(`nid_number`, `is_found`) VALUES ('$id_num', '1')";
        		$checkSaveQuery= $this->con->prepare($q);
        		$checkSaveQuery->execute();
        	}
        	return "ID information is submitted!";
        }
	}

    // @donnekt @gadrawingz
	public function postLostID($id_names, $id_num, $id_dob, $id_sex, $is_dist, $is_sect, $image_file, $from, $to, $date, $reward, $v_id) {

		// Taking care of file name
        $format = new AppConfig();

		//$file_name = $format->urlFormatter($id_names)."-".$id_num.".";
		$file_name = $image_file['name'];
        $file_temp = $image_file['tmp_name'];
        $file_type = $image_file['type'];

        $mimes = [
        	'image/jpeg', 'image/pjpeg', 'image/png', 
        	'image/x-png', 'image/tiff', 'image/gif'
        ];

        // Check for existing data
        $idsql = "SELECT COUNT(*) FROM `lost` WHERE nid_number='".$id_num."' ";
        $idst = $this->con->prepare($idsql);
        $idst->execute();

        if(!in_array($file_type, $mimes)){
        	return " Uploaded file is not image supported!";

        } else if($id_names=='' || $id_num=='' || $id_dob=='' || $id_sex=='' || $is_dist=='' || $is_sect=='' || $image_file=='' || $from=='' || $to=='' || $reward=='' || $v_id==''){
        	return '<span class="c-white-red"> Some fields are empty!</span>';
            
        } else if(strlen($id_num)!=16){
            return '<span class="c-white-red">ID should have 16 numbers!</span>';

        } else if($v_id=='0'){
            return '<span class="c-white-red">Account is not setup!</span>';

        } else if($idst->fetchColumn()!=0) {
            return '<span class="c-white-red">This National ID already posted!</span>';

        } else {
        	$uploadFilePath = '../../uploads/'.basename($file_name);
        	move_uploaded_file($file_temp, $uploadFilePath);
        	
        	$sql= "INSERT INTO `lost`(`nid_names`, `nid_number`, `nid_dob`, `nid_sex`, `issued_dist`, `issued_sect`, `nid_image`, `lost_from`, `lost_to`, `lost_date`, `reward`, `user_id`) VALUES ('".addslashes($id_names)."', '$id_num', '$id_dob', '$id_sex', '$is_dist', '$is_sect', '".$file_name."', '".addslashes($from)."', '".addslashes($to)."', '$date', '$reward', '$v_id')";
        	$query= $this->con->prepare($sql);
        	$query->execute();
        	$count= $query->rowCount();

        	return "ID information is submitted!";
        }
	}



	// ALL ABOUT LOST @donnekt @gadrawingz
	public function viewAllLostIDs() {
        $sql = "SELECT lo.id_pk, lo.nid_names, lo.nid_number AS national_id, lo.nid_dob, lo.nid_sex, lo.issued_dist, lo.issued_sect, lo.nid_image, lo.lost_from, lo.lost_to, lo.lost_date, lo.reward, lo.action_date, us.user_id AS account_id, us.full_name AS account_names,  us.telephone AS account_tel, lc.is_found, lc.is_received FROM lost lo LEFT JOIN lost_check lc ON lc.nid_number=lo.nid_number LEFT JOIN user us ON us.user_id=lo.user_id WHERE lc.nid_number IS NULL ORDER BY nid_names ASC LIMIT 25";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    // @donnekt @gadrawingz
    public function viewAllMergedLostIDs() {
        $sql = "SELECT lo.id_pk, lo.nid_names, lo.nid_number AS national_id, lo.nid_dob, lo.nid_sex, lo.issued_dist, lo.issued_sect, lo.nid_image, lo.lost_from, lo.lost_to, lo.lost_date, lo.reward, lo.action_date, us.user_id AS account_id, us.full_name AS account_names,  us.telephone AS account_tel, lc.is_found, lc.is_received FROM lost lo LEFT JOIN lost_check lc ON lc.nid_number=lo.nid_number LEFT JOIN user us ON us.user_id=lo.user_id ORDER BY lo.nid_names ASC LIMIT 50";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function checkLostIDsWithDatails($id) {
		$sql = "SELECT COUNT(*) FROM lost lo LEFT JOIN lost_check lc ON lc.nid_number=lo.nid_number WHERE lo.nid_number='$id' AND lc.is_found IS NOT NULL";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;
	}

    public function viewRecentLostIDs() {
        $sql = "SELECT * FROM `lost` ORDER BY action_date DESC";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function viewRecentLostIDsByDay($day) {
        $sql= "SELECT * FROM `lost` WHERE AND x='$x' ";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function countAllLostIDs() {
		$sql = "SELECT COUNT(*) FROM lost ";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;
	}


    /*************************************
     * 
     * IS FOUND: SELECT * FROM lost lo LEFT JOIN lost_check lc ON lc.nid_number=lo.nid_number
     * WHERE lc.nid_number IS NOT NULL AND lc.is_found='1' ORDER BY nid_names ASC LIMIT 20;
     * 
     * ***********************************/

	public function viewAllFoundIDs() {
        $sql = "SELECT fo.id_pk, fo.nid_names, fo.nid_number AS national_id, fo.nid_dob, fo.nid_sex, fo.issued_dist, fo.issued_sect, fo.nid_image, fo.found_location, fo.action_date, fo.user_id AS account_id, us.full_name AS account_names, us.telephone AS account_tel, lc.is_found, lc.has_reward, lc.is_received FROM found fo LEFT JOIN lost_check lc ON lc.nid_number=fo.nid_number LEFT JOIN user us ON us.user_id=fo.user_id WHERE lc.nid_number IS NOT NULL ORDER BY fo.nid_names ASC LIMIT 25";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function countAllFoundIDs() {
		$sql = "SELECT COUNT(*) FROM found ";
		$stmt= $this->con->query($sql)->fetchColumn();
		return $stmt;
	}


    // Searching
    public function searchResultInLostIDs($name) {
        $sql = "SELECT * FROM lost WHERE nid_names LIKE '%$name%' ORDER BY nid_names ASC LIMIT 25";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function countResultInLostIDs($n) {
        $sql = "SELECT COUNT(*) FROM lost WHERE nid_names LIKE '%$n%' ";
        $stmt= $this->con->query($sql)->fetchColumn();
        return $stmt;
    }


    public function searchResultInFoundIDs($n) {
        $sql = "SELECT * FROM found WHERE nid_names LIKE '%$n%' ORDER BY nid_names ASC LIMIT 25";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    // @donnekt @gadrawingz
    public function countResultInFoundIDs($n) {
        $sql = "SELECT COUNT(*) FROM found WHERE nid_names LIKE '%$n%' ";
        $stmt= $this->con->query($sql)->fetchColumn();
        return $stmt;
    }




    // Create visitor account:
    public function registerVisitor($names, $tel, $pass) {

        // Check for existing user
        $q = "SELECT COUNT(*) FROM `user` WHERE telephone='".$tel."' ";
        $idsq = $this->con->prepare($q);
        $idsq->execute();

        if($idsq->fetchColumn()!=0) {
            return '<span class="c-white-red">User with these credetintials exists!</span>';

        } else if(!preg_match("/^07[2,3,8,9]{1}\d{7}$/", $tel)) {
            return '<span class="c-white-red"> Invalid Phone number</span>';
            
        } else {
            $sql= "INSERT INTO `user`(`full_name`, `telephone`, `password`) VALUES ('".addslashes($names)."', '$tel', '$pass')";
            $query= $this->con->prepare($sql);
            $query->execute();
            $count= $query->rowCount();

            return "User account is created!";
        }
    }

    public function registeredVisitors() {
        $sql = "SELECT * FROM user ORDER BY full_name ASC LIMIT 25";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt; 
    }

    // @donnekt @gadrawingz
    public function countAllUsers() {
        $sql = "SELECT COUNT(*) FROM user ";
        $stmt= $this->con->query($sql)->fetchColumn();
        return $stmt;
    }

    public function disableUser($id) {
        $sql="UPDATE user SET status='0' WHERE user_id='$id' ";
        $query= $this->con->prepare($sql);
        $query->execute();
        $count= $query->rowCount();
        return $count;
    }

    // @donnekt @gadrawingz
    public function enableUser($id) {
        $sql="UPDATE user SET status='1' WHERE user_id='$id' ";
        $query= $this->con->prepare($sql);
        $query->execute();
        $count= $query->rowCount();
        return $count;
    }

    // @donnekt @gadrawingz
    public function verifyReceivedId($id) {
        $sql="UPDATE lost_check SET has_reward='1' WHERE nid_number='$id' ";
        $query= $this->con->prepare($sql);
        $query->execute();
        $count= $query->rowCount();
        return $count;
    }

    public function cancelIDVerification($id) {
        $sql="UPDATE lost_check SET has_reward='0' WHERE nid_number='$id' ";
        $query= $this->con->prepare($sql);
        $query->execute();
        $count= $query->rowCount();
        return $count;
    }


}
?>