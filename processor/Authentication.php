<?php 

    include('Connection.php');
    class Authentication{

        function __construct(){
            $db_conn = new Connection();
            $db_conn = $db_conn->connect();
            $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'Connection succussfully';
        }
    }
?>