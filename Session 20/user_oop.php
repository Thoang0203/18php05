<?php 
	class User
	{
		var $name;
		var $username;
		var $password;
		public function addUser()
		{
			echo "Added!";
		}
		public function editUser()
		{
			echo "Edited!";
		}
		public function deleteUser()
		{
			echo "Deleted!";
		}
		public function viewUser()
		{
			echo "Viewed!";
		}
		protected function changepassword(){
			echo "Change Password!";
		}
		protected function forgotpassword(){
			echo "Forgot Password!";
		}
	}

	class Student extends User
	{
		var $id;
		function addUser()
		{
			echo "Added Student!";
		}
		function forgotpassword() {
			echo "Forgot Student's Password!";
		}
	}

	/**
	 * 
	 */
	class Teacher
	{
		
	}

	$student = new Student();
	$student -> addUser();
	echo "<br>";
	$student -> forgotpassword();
	echo "<br>";
	$user = new User();
	$user -> editUser();
	//Protected function -> fail!
	//$user -> changepassword();
 ?>