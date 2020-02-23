<?php
class Database 
{
	public $connection;

	public function __construct() 
	{
		$this->connection = mysqli_connect("localhost", "root", "", "centric_project");

		// if($this->connection) {
		// 	echo "Connected";
		// } else {
		// 	echo "Not Connected";
		// }


	} 
}

?>