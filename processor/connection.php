<?php
    class Connection{
        function connect()
        {
            $servername = "localhost";
	        $username = "asif";
	        $password = "12345678";
	        try{
	        	$db_conn = new PDO("mysql:host=$servername;dbname=resume_maker", $username, $password);
                return $db_conn;
	        } catch (PDOException $e) {
	        	echo "Connection failed: " . $e->getMessage();
	        }
        }
    }
    
?>