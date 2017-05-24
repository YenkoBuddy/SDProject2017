<?php
	$host='localhost';
	$database='yenko-buddy';
	$username = 'Wendy';
	$password= 'Wendy2017';
	
	
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