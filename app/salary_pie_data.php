<?php
	include 'database.php';

	class SalaryPie extends Database
	{
		public function getSalary($employee_id) {
			$sql = "SELECT S.basic, S.house, S.medical_allowance, S.conveyance, S.food_allowance
					FROM salaries AS S
					JOIN employees AS E
					ON E.id = S.employee_id
					WHERE S.employee_id = $employee_id
					LIMIT 1";
					
			$salaries = array();
			$query = mysqli_query($this->connection, $sql);
			while($row = mysqli_fetch_assoc($query)) {
				$salaries[] = $row;
			}

			return $salaries;
		}

	}

	$salary_data = new SalaryPie;

	if(isset($_POST["employee_id"])) {

		$row = $salary_data->getSalary($_POST["employee_id"]);
		echo json_encode($row);
	}

?>