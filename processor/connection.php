<?php
    class Connection{
        
        function connect()
        {
            $servername = "localhost";
	        $username = "ZEHRI";
	        $password = "ijaz1234";
	        try{
	        	$db_conn = new PDO("mysql:host=$servername;dbname=resume_maker", $username, $password);
                return $db_conn;
	        } catch (PDOException $e) {
	        	echo "Connection failed: " . $e->getMessage();
	        }
        }
    }
