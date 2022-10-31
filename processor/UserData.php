<?php
// include('connection.php');
class UserData
{
    function __construct()
    {
        $obj = new Connection();
        $this->db = $obj->connect();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function getData()
    {
        try {

            // return "<pre>" . var_export('working'). "</pre>";

            $id = $_SESSION['id'];

            $query = "SELECT users.* ,(SELECT * FROM educations WHERE user_id = $id) FROM users WHERE id=?";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array($id));

            $data = $stmt->fetchObject(PDO::FETCH_OBJ);
            echo "<pre>" . var_export($data, true) . "</pre>";
        } catch (\Throwable $th) {
            echo "<pre>" . var_export($th->getMessage(), true) . "</pre>";
        }
    }

    function storeData()
    {

        try {
            // USER ID
            $user_id = $_SESSION['id'];

            // BASIC INFO
            $summary = $_POST['summary'];
            $title = $_POST['title'];

            // EDUCATION
            $institute = $_POST['institute'];

            $degree = $_POST['degree'];
            $edu_session = $_POST['edu_session'];


            // SKILLS
            $skills = $_POST['skills'];

            // LANGUAGE
            $languages = $_POST['languages'];

            // EXPERIENCE
            $job_title = $_POST['job_title'];
            $company_name = $_POST['company_name'];
            $exp_session = $_POST['exp_session'];
            $description = $_POST['exp_description'];


            // STORE BASIC INFO 
            $query = "INSERT INTO basic_informations (user_id,summary,title) VALUES (?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array($user_id, $summary, $title));

            // STORE EDUCATION
            for ($i = 0; $i < count($institute); $i++) {
                $query = "INSERT INTO educations (user_id,institue,degree,session) VALUE (?,?,?,?)";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array($user_id,$institute[$i],$degree[$i],$edu_session[$i]));
            }

            // STORE  EXPERIENCE
            for ($i = 0; $i < count($company_name); $i++) {
                $query = "INSERT INTO experience (user_id,job_title,company_name,session,description) VALUE (?,?,?,?,?)";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array($user_id,$job_title[$i],$company_name[$i],$exp_session[$i],$description[$i]));
            }

            // STORE  SKILLS
            for ($i = 0; $i < count($skills); $i++) {
                $query = "INSERT INTO skills (user_id,name) VALUE (?,?)";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array($user_id,$skills[$i]));
            }

            // STORE  LANGUGES
            for ($i = 0; $i < count($languages); $i++) {
                $query = "INSERT INTO languages (user_id,name) VALUE (?,?)";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array($user_id,$languages[$i]));
            }

            return 'Added successfully.';
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    function updateData()
    {

        try {
            // return "<pre>". var_export($user_id,true)."</pre>";
            // USER ID
            $user_id = $_SESSION['id'];

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
            $query = "INSERT INTO basic_informations (user_id,summary,title) VALUES (?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute(array($user_id, $summary, $job_title));

            // STORE EDUCATION
            for ($i = 0; $i < count($institue); $i++) {
                $query = "INSERT INTO educations (user_id,institue,degree,session) VALUE (?,?,?,?)";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array($user_id,));
            }

            // STORE  EXPERIENCE
            for ($i = 0; $i < count($company_name); $i++) {
                $query = "INSERT INTO experience (user_id,job_title,company_name,session,description) VALUE (?,?,?,?,?)";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array($user_id,));
            }

            // STORE  SKILLS
            for ($i = 0; $i < count($skills); $i++) {
                $query = "INSERT INTO skills (user_id,name) VALUE (?,?)";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array($user_id,));
            }

            // STORE  LANGUGES
            for ($i = 0; $i < count($languages); $i++) {
                $query = "INSERT INTO skills (user_id,name) VALUE (?,?)";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array($user_id,));
            }

            return 'Added successfully.';
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
