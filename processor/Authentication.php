<?php
// include('connection.php');
class Authentication
{
	function __construct()
	{
		$obj = new Connection();
		$this->db = $obj->connect();
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	function register()
	{
		try {

			$name = $_POST['name'];
			$contact = $_POST['contact'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$c_password = $_POST['c_password'];

			$filename = $_FILES["image"]["name"];
			$tempname = $_FILES["image"]["tmp_name"];
			$folder = "../assets/images/" . $filename;

			// VALIDATION
			if (!preg_match("/^[a-zA-Z-'\s]+$/", $name)) {
				return "Please Enter a valid Name";
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return "You have entered an invalid email";
			}

			if (!preg_match("/^[0-9]{11}+$/", $contact)) {
				return "Please enter a valid contact number e.g. 0313XXXXXXX";
			}

			if ($password != $c_password)
				return "password confirmation does not match.";

			$password = md5($_POST['password']);

			$check = $this->db->prepare("SELECT name FROM users WHERE email = ? LIMIT 1");
			$check->execute(array($email));
			if ($check->rowCount() == 1)
				return "Email already registered";

			if (move_uploaded_file($tempname, $folder)) {
			}

			$query = "INSERT INTO  users(name,email,contact ,password,image) VALUES(?,?,?,?,?)";
			$stmt = $this->db->prepare($query);
			$stmt->execute(array($name, $contact, $email, $filename, $password));

			$query = "SELECT * FROM users WHERE EmailId=? LIMIT 1";
			$stmt = $this->db->prepare($query);
			$stmt->execute(array($email));
			$user =  $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($user as $key => $value) {
				$id =  $value['id'];
				$name = $value['FullName'];
				$image = $value['image'];
			}
			session_name("resume_maker");
			session_start();

			$_SESSION['id'] = $id;
			$_SESSION['image'] = $image;
			$_SESSION['user_name'] = $name;
			$_SESSION['user_logged_in'] = true;

			header('location:../index.php');
		} catch (\Throwable $th) {
			return $th->getMessage();
		}
	}

	function login()
	{
		try {
			$email = $_POST['email'];
			$password = md5($_POST['password']);

			if (empty($email) || empty($password)) {
				return "Please, Enter email and password";
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return "You have entered an invalid email";
			}

			$query = "SELECT * FROM users WHERE EmailId=? AND Password=?";
			$stmt = $this->db->prepare($query);
			$stmt->execute(array($email, $password));

			if ($stmt->rowCount() != 1) {
				return "Invalid Credentials";
			}
			$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($user as $key => $value) {
				$id =  $value['id'];
				$name = $value['FullName'];
				$image = $value['image'];
			}

			session_name("travel");
			session_start();

			$_SESSION['id'] = $id;
			$_SESSION['image'] = $image;
			$_SESSION['user_name'] = $name;
			$_SESSION['user_logged_in'] = true;

			header('location:../index.php');
		} catch (\Throwable $th) {
			return $th->getMessage();
		}
	}
}
