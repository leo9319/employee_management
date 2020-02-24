<?php
	include 'database.php';

	class Salary extends Database
	{
		public function getSalaries() {
			$sql = "SELECT  E.name, `basic` + `house` + `medical_allowance` + `conveyance` + `food_allowance` AS gross_salary
					FROM    salaries AS S
					JOIN employees AS E
					ON E.id = S.employee_id
					";
					
			$salaries = array();
			$query = mysqli_query($this->connection, $sql);
			while($row = mysqli_fetch_assoc($query)) {
				$salaries[] = $row;
			}

			return $salaries;
		}

	}

	$salary_data = new Salary;

	echo json_encode($salary_data->getSalaries());

?>