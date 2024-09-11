<?php

class DBController{
    //database connection properties
    protected $host = "us-cluster-east-01.k8s.cleardb.net";
    protected $user = "bc96a7d3b04a8a";
    protected $password = "95138c1f";
    protected $database = "heroku_6cff8b9ab658646";

    //connrction property
    public $con = null;
    

    //call conetracter
    public function __construct(){
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if($this->con->connect_error){
            echo"Fail".$this->con->connect_error;
        }
    }
    
    public function __destruct(){
        $this->closeConnection();
    }
    
    //for mysqli closing connection
    protected function closeConnection(){
        if($this->con != null) {
            $this->con->close();
            $this->con = null;
        }
      }
    }
?>