<?php
	include 'database.php';

	class Bar extends Database
	{
		public function getAttendance($month, $year) {
			$sql = "SELECT E.name, COUNT(*) AS total FROM attendances AS A JOIN employees AS E ON E.id = A.employee_id WHERE MONTH(A.date) = $month AND YEAR(A.date) = $year GROUP BY A.employee_id";
			$attendance = array();
			$query = mysqli_query($this->connection, $sql);
			while($row = mysqli_fetch_assoc($query)) {
				$attendances[] = $row;
			}

			return $data = $attendances;
		}

	}

	$bar_data = new Bar;

	if(isset($_POST["month"])) {

		$row = $bar_data->getAttendance($_POST["month"], $_POST["year"]);
		echo json_encode($row);
	}

?>