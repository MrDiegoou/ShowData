<?php
	class DBController {
		private $host = "localhost";
		private $user = "root";
		private $password = "ADMIN";
		private $database = "systeminv";
		private $conn;
	  
		function __construct() {
		  $this->conn = $this->connectDB();
		}
	  
		function connectDB() {
		  $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
		  return $conn;
		}
	  
		function runQuery($query) {
		  $result = mysqli_query($this->conn, $query);
		  while ($row = mysqli_fetch_assoc($result)) {
			// Adjust fecha by adding 2 hours
			$row['fecha'] = date('Y-m-d', strtotime($row['fecha'] . ' +2 hours'));
	  
			// Adjust hora by adding 2 hours
			$row['hora'] = date('H:i:s', strtotime($row['hora'] . ' +2 hours'));
	  
			$resultset[] = $row;
		  }
		  if (!empty($resultset))
			return $resultset;
		}
	  
		function numRows($query) {
		  $result = mysqli_query($this->conn, $query);
		  $rowcount = mysqli_num_rows($result);
		  return $rowcount;
		}
	  
		function executeUpdate($query) {
		  $result = mysqli_query($this->conn, $query);
		  return $result;
		}
	  }
	  
?>