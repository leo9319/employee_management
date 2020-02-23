<?php
	include 'database.php';

	class Attendance extends Database
	{
		// public function index($table)
		// {
		// 	$sql = "SELECT * FROM " .$table;
		// 	$attendance = array();
		// 	$query = mysqli_query($this->connection, $sql);
		// 	while($row = mysqli_fetch_assoc($query)) {
		// 		$attendances[] = $row;
		// 	}

		// 	return $attendances;

		// }

		public function storeAttendance($table, $fields) {
			$sql = "";
			$sql .= "INSERT INTO ".$table;
			$sql .= "(" . implode(",", array_keys($fields)) . ") VALUES ";
			$sql .= "('" . implode("','", array_values($fields)) . "')";
			$query = mysqli_query($this->connection, $sql);
			if($query) {
				return true;
			}
		}

	}

	$attendance = new Attendance;

	if(isset($_POST["submit"])) {
		// return 'test';
		$data = array(
			"employee_id" => $_POST["employee_id"],
			"date" => $_POST["date"]
		);

		if($attendance->storeAttendance("attendances", $data)) {
			header("location: ../resources/views/attendance/index.php");
		}
	}

	

?>