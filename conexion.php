<?php
$conn = new mysqli("localhost","root","","guatemala");

// echo "<pre>";
// print_r($conn);
	
	if($conn->connect_errno)
	{
		echo "No hay conexión: (" . $conn->connect_errno . ") " . $conn->connect_error;
	}
?>