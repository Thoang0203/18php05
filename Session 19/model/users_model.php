<?php
	/**
	 * 
	 */
	class UsersModel extends ConnectDB
	{	
		public function checkLogin($username, $password){
			$this->sql = "SELECT * FROM users WHERE name = '$username' AND password = '$password' LIMIT 1";
			$result = mysqli_query($this->connect, $this->sql);
			$data = $result->fetch_assoc();
			return $data;
		}

		public function getUsersList(){
			$this->sql = 'SELECT * FROM users';
			return mysqli_query($this->connect, $this->sql);
		}

		public function getUsersDetail($userID){
			$this->sql = "SELECT * FROM users WHERE id = $userID";
			return mysqli_query($this->connect, $this->sql);
		}

		public function getUsersDelete($userID){
			$this->sql = "DELETE FROM users WHERE id = $userID";
			return mysqli_query($this->connect, $this->sql);
		}
		
		public function getUsersEdit($userID, $catID, $name, $price, $des, $nameImage){
			$this->sql = "UPDATE users SET catID = '$catID', name = '$name', price = '$price', description = '$des', image = '$nameImage' WHERE id = $userID";
			return mysqli_query($this->connect, $this->sql);
		}

		public function getAllCat(){
			$this->sql = 'SELECT * FROM categories';
			return mysqli_query($this->connect, $this->sql);
		}

		public function getAllCatNotById($catID){
			$this->sql = "SELECT * FROM categories WHERE catID != $catID";
			return mysqli_query($this->connect, $this->sql);
		}
		
		public function addUserByRegister($name, $email, $password, $nameImage){
			$this->sql = "INSERT INTO users(name, role, password, avatar, email) VALUES('$name', 'user', '$password', '$nameImage', '$email')";
			return mysqli_query($this->connect, $this->sql);
		}
	}
?>