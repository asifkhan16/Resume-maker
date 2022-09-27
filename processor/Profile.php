<?php

class UserData
{
	function __construct()
	{
		$obj = new Connection();
		$this->db = $obj->connect();
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	function get_profile()
	{
		$id  = $_SESSION['id'];
		$query = "SELECT * FROM users WHERE id = ?";
		$stmt = $this->db->prepare($query);
		$stmt->execute(array($id));

		$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $user;
	}

	function updateProfileImage()
	{
		$filename = $_FILES["image"]["name"];
		$tempname = $_FILES["image"]["tmp_name"];
		$folder = "images/" . $filename;

		if (move_uploaded_file($tempname, $folder)) {
		}
		// echo '<pre>' . var_export('Image updated failed', true) . '</pre>';

		$id = $_SESSION['id'];
		$query = "UPDATE users Set `image` = ? WHERE id = ?";
		$stmt = $this->db->prepare($query);
		$stmt->execute(array($filename, $id));
		$_SESSION['image'] =  $filename;
		return 'ok';
	}
	function deleteProfileImage()
	{
		$id = $_SESSION['id'];
		try {
			$query = "UPDATE users SET image=null WHERE id=?";
			$stmt = $this->db->prepare($query);
			$stmt->execute(array($id));
			$_SESSION['image'] =  null;
			return 'ok';
		} catch (\Throwable $th) {
			echo $th->getMessage();
		}
	}
	function change_password()
	{
		$id = $_SESSION['id'];
		$password = $_POST['password'];
		$new_password = $_POST['new-password'];
		$confirm_password = $_POST['confirm-password'];

		if ($new_password != $confirm_password)
			return "password confirmation does not match.";

		if ($new_password == '')
			return 'Please in Correct password';

		$password = md5($password);


		$query = "SELECT * FROM users Where id=? and password=?";
		$stmt = $this->db->prepare($query);
		$stmt->execute(array($id, $password));

		if ($stmt->rowCount() != 1) {
			return "Your Current Password Is Invalid";
		}
		$new_password = md5($new_password);
		$query = "UPDATE users set password=? where id=?";
		$stmt = $this->db->prepare($query);
		$stmt->execute(array($new_password, $id));
		return 'password changed succsussfully';
	}
}
