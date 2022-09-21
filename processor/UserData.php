<?php 
    include('Connection.php');
    class UserData{
        function __construct(){
            $db_conn = new Connection();
            $db_conn = $db_conn->connect();
            $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        function storeData(){

            try {
                // BASIC INFO
                $summary = $_POST['summary'];
                $title = $_POST['title'];
                // EDUCATION
                $institue = $_POST['institue'];
                $degree = $_POST['degree'];
                $edu_session = $_POST['edu_session'];
                // SKILLS
                $skills = $_POST['skills'];
                // LANGUAGE
                $languages = $_POST['language'];
                // EXPERIENCE
                $job_title = $_POST['job_title'];
                $company_name = $_POST['company_name'];
                $exp_session = $_POST['exp_session'];
                $description = $_POST['description'];


                // STORE BASIC INFO 

                

                
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    
?>