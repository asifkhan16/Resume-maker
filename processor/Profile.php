<?php 
    include('Connection.php');
    class UserData{
        function __construct(){
            $obj = new Connection();
            $this->db = $obj->connect();
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        function get_profile(){
            $id  = $_SESSION['id'];
            $query = "SELECT * FROM users WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array($id));

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        }
    }

?>