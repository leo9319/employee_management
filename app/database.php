<?php
class Database 
{
	public $connection;

	public function __construct() 
	{
		$this->connection = mysqli_connect("localhost", "root", "", "employee");

		// if($this->connection) {
		// 	echo "Connected";
		// } else {
		// 	echo "Not Connected";
		// }


	} 
}

?>