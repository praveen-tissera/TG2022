<?php

//purpose = establish the connection between the coding and the database (basically)

    class dbConnection{

        private $conn;  // connection object
        private $hostname="localhost";
        private $dbusername="root";
        private $dbpassword="";
        private $dbname="accolade_db";


        function __construct(){
            $this->conn= new mysqli($this->hostname, $this->dbusername, $this->dbpassword, $this->dbname);

            if(!$this->conn->connect_error){
                $GLOBALS["con"] = $this->conn;
                /// $GLOBALS can be accessed anywhere in the program
            }
            else{
                
                echo "Connection was not created!!";

            }

        }


    }
?>

