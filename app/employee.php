<?php
	include 'database.php';

	class Employee extends Database
	{
		public function index($table)
		{
			$sql = "SELECT * FROM " .$table;
			$employees = array();
			$query = mysqli_query($this->connection, $sql);
			while($row = mysqli_fetch_assoc($query)) {
				$employees[] = $row;
			}

			return $employees;

		}

		public function store($table, $fields) {
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

	$obj = new Employee;

	if(isset($_POST["submit"])) {
		$data = array(
			"name" => $_POST["name"],
			"position" => $_POST["position"],
			"department" => $_POST["department"],
			"date_joined" => $_POST["date_joined"],
			"address" => $_POST["address"],
			"nid" => $_POST["nid"],
			"emergency_contact" => $_POST["emergency_contact"]
		);

		if($obj->store("employees", $data)) {
			header("location: ../resources/views/employees/index.php");
		}
	}

	

?>