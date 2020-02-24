<?php
	include 'database.php';

	class Histogram extends Database
	{
		public function getFrequency($year) {
			$sql = "SELECT DATE_FORMAT(date, '%m') as 'month',
					COUNT(id) as 'frequency'
					FROM attendances
					WHERE YEAR(date) = $year
					GROUP BY DATE_FORMAT(date, '%Y%m')";

			$frequency = array();
			$query = mysqli_query($this->connection, $sql);
			while($row = mysqli_fetch_assoc($query)) {
				$frequency[] = $row;
			}

			return $data = $frequency;
		}

	}

	$histogram_data = new Histogram;

	if(isset($_POST["year"])) {

		$row = $histogram_data->getFrequency($_POST["year"]);
		echo json_encode($row);
	}

?>