<?php

require_once('../../config/DBConfig.php');

/**********************************************************
 * MADE UNDER THE CONTROL OF:
 * @donnekt and @gadrawingz
 * Go to: https://www.donnekt.com
 * *******************************************************/


class PoliceData extends DBConfig {

    public function __construct() {
        $obj = new DBConfig;
        $this->con= $obj->connect();
    }


    public function newPoliceStation($name, $com, $dist, $sect, $contact, $username, $password) {

        if($name=='' || $com=='' || $dist=='' || $sect=='' || $username=='' || $password=='' || $contact==''){
            return '<span class="c-white-red">Some fields are empty!</span>';

        } else if(!preg_match("/^07[2,3,8,9]{1}\d{7}$/", $contact)) {
            return '<span class="c-white-red"> Invalid Phone number</span>';

        } else {
            $sql= "INSERT INTO `police_station`(`station_name`, `district`, `sector`, `station_commander`, `contact_number`, `username`, `password`) VALUES ('".addslashes($name)."', '".addslashes($dist)."', '".addslashes($sect)."', '".addslashes($com)."', '$contact', '$username', '$password')";
            $query= $this->con->prepare($sql);
            $query->execute();
            $count= $query->rowCount();
            return '<span class="c-white-green">Registration is successful</span>';
        }
    }

    public function updatePoliceStation($id, $name, $com, $dist, $sect, $contact, $status) {

        if($name=='' || $com=='' || $dist=='' || $sect=='' || $status=='' || $contact==''){
            return '<span class="c-white-red">Some fields are empty!</span>';

        } else if(!preg_match("/^07[2,3,8,9]{1}\d{7}$/", $contact)) {
            return '<span class="c-white-red"> Invalid Phone number</span>';

        } else {
            $sql= "UPDATE `police_station` SET `station_name`='".addslashes($name)."', `district`='".addslashes($dist)."', sector='".addslashes($sect)."', station_commander='".addslashes($com)."', contact_number='$contact', status='$status' WHERE station_id='$id' ";
            $query= $this->con->prepare($sql);
            $query->execute();
            $count= $query->rowCount();
            return '<span class="c-white-green">Update is successful</span>';
        }
    }


    public function policeStations() {
        $sql = "SELECT * FROM police_station ORDER BY station_name ASC LIMIT 25";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt; 
    }

    public function countPoliceStations() {
        $sql = "SELECT COUNT(*) FROM police_station";
        $stmt= $this->con->query($sql)->fetchColumn();
        return $stmt;
    }

    public function policeStation($id) {
        $sql = "SELECT * FROM police_station WHERE station_id='$id' ";
        $stmt= $this->con->prepare($sql);
        $stmt->execute();
        return $stmt; 
    }

    public function deletePoliceStation($id) {
        $sql="DELETE FROM police_station WHERE station_id='$id' ";
        $query = $this->con->prepare($sql);
        $query->execute();
        $count= $query->rowCount();
        return $count;
    }



}