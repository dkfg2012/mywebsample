<?php 
	$username = "admin";
	$password = "Fjst+197*";
	//create connection
	try {
	$conn = new PDO('mysql:host=localhost;dbname=eshop;charset=utf8mb4', $username, $password);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}


	/**
	 * 
	 */
	class sqlConnect
	{
		private $conn;
		private $username;
		private $password;

		public function __construct(){
			$this->username = "admin";
			$this->password = "Fjst+197*";
			$this->conn = new PDO('mysql:host=localhost;dbname=eshop;charset=utf8mb4', $this->username, $this->password);
		}

		function execute($sql){
			$getquery = $this->conn->prepare($sql);
			$getquery->execute();
			return $getquery->fetchAll();
		}
	}

	$sql = new sqlConnect();
	$num_query = "SELECT COUNT(*) AS total FROM products";
	$num_query = $sql->execute($num_query);
	$num_query = $num_query[0]['total'];
?>
