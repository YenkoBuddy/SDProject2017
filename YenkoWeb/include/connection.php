<?php
	$host='localhost';
	$database='yenko_buddy';
	$username = 'root';
	$password= '0246085565';
	
	
	//PDO object and PDO execption
	try {
	$conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	#echo '<p> You are connected to the db';
	}
	catch (PDOException $e){
		$error_message = $e->getMessage();
		echo "<p> And errror occured:$error_message</p>";
	}
	
	
?>