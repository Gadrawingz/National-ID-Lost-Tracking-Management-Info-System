<?php

class DBConfig {
    public    $hostname = "localhost";
    protected $database= "nid_tracking";
    private   $user = "root";
    private   $password = "";
    public    $con;

    public function connect(){
        try {
            $dsn= "mysql:host=$this->hostname; dbname=$this->database";
            $this->con = new PDO($dsn, $this->user, $this->password);
            return $this->con;

        } catch(PDOException $error) {
            echo "DAMN! ERROR OCCURED".$error->getMessage();
            // @donnekt in control
            // @gadrawingz in charge
        }
    }
}

?>