<?php
	include 'database.php';

	class Salary extends Database
	{

		public function storeSalary($table, $fields) {
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

	$salary = new Salary;

	if(isset($_POST["submit"])) {
		$data = array(
			"employee_id" => $_POST["employee_id"],
			"basic" => $_POST["basic"],
			"house" => $_POST["house"],
			"medical_allowance" => $_POST["medical_allowance"],
			"conveyance" => $_POST["conveyance"],
			"food_allowance" => $_POST["food_allowance"]
		);

		if($salary->storeSalary("salaries", $data)) {
			header("location: ../resources/views/salary/index.php");
		}
	}

	

?>