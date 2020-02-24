<?php
	include 'database.php';

	class Pie extends Database
	{
		public function getAttendance($employee_id, $month, $year) {
			$sql = "SELECT COUNT(*) AS present 
					FROM attendances
					WHERE MONTH(date) = $month
					AND YEAR(date) = $year 
					AND employee_id = $employee_id";
					
			$attendance = array();
			$query = mysqli_query($this->connection, $sql);
			while($row = mysqli_fetch_assoc($query)) {
				$attendances[] = $row;
			}

			return $data = $attendances;
		}

	}

	$pie_data = new Pie;

	if(isset($_POST["employee_id"])) {

		$row = $pie_data->getAttendance($_POST["employee_id"], $_POST["month"], $_POST["year"]);
		echo json_encode($row);
	}

?>