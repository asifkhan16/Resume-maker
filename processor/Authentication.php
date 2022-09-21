<?php 
    class Authentication{

        function __construct(){
            $servername = "localhost";
		    $username = "asif";
		    $password = "12345678";
		    try {

		    	$this->db = new PDO("mysql:host=$servername;dbname=resume_maker", $username, $password);
		    	// set the PDO error mode to exception
		    	$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    	// echo "Connection Successfull ";

		    } catch (PDOException $e) {
		    	echo "Connection failed: " . $e->getMessage();
		    }
        }
    }
?>