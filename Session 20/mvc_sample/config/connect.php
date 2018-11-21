<?php 
/**
 * 
 */
class ConnectDB
{
	var $server = 'localhost';
	var $username = 'root';
	var $password = '';
	var $database = '18php05_demo';
	var $connect;

	public function __construct(){
		$this->ConnectDB();	
	}

	public function connectDB(){
		$this->connect = mysqli_connect($this->server, $this->username, $this->password, $this->database);
		 // $this->connect;
		if (mysqli_connect_errno()) {
			echo "Failed to connect! ".mysqli_connect_error();
			}
		return mysqli_set_charset($this->connect, "utf8");
		}
	}
 ?>