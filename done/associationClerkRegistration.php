<?php
	require_once "connection.php";

	$associationName = filter_input(INPUT_POST,'associationName');
	$firstName = filter_input(INPUT_POST,'firstName');
	$lastName =filter_input(INPUT_POST,'lastName');
	$emailAddress=filter_input(INPUT_POST,'emailAddress');
	$contactNumber=filter_input(INPUT_POST,'contactNumber');
	$username=filter_input(INPUT_POST,'username');
	$password=filter_input(INPUT_POST,'password');
	
	$query="INSERT INTO association_clerk(FirstName, lastName, EmailAddress ContactNumber, Username, Password) VALUES(:firstName, :lastName, :emailAddress, :contactNumber, :username, :password)";
	
	$statement =$conn->prepare($query);
	
	$statement->bindParam(':firstName', $firstName);
	$statement->bindParam(':lastName', $lastName);
	$statement->bindParam(':emailAddress', $emailAddress);
	$statement->bindParam(':contactNumber', $contactNumber);
	$statement->bindParam(':username', $username);
	$statement->bindParam(':password', $password);
	if($statement->execute())
            {
                $successMSG = "new record succesfully inserted ...";
                header("refresh:5;newIndex.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                echo "error while inserting....<br>";
                print_r($statement->errorCode());
                print_r($statement->errorInfo());
            }
?>
<!DOCTYPE html>
<head>
	<title>Association Clerk Registration Page</title>
</head>
<body>
<div id="header"><?php include('header.php');?></div>
	<h1><b>Register Association Clerk</b></h1>
<form>
	<table>
		<tr>
			<td>
				<input type="text" name="associationNam" style="text-align: center" placeholder="Association Name" required="Yes" size="45"> * 
			</td>
		</tr>
		
		<tr>
			<td>
				<input type="text" name="associationName" style="text-align: center" placeholder="Association Name" required="Yes" size="45"> * 
			</td>
		</tr>
		<tr> 
	    	<td>
	    		<input type="text" name="contctPerson" style="text-align: center" placeholder="Contact Person" required="Yes" size="45"> * 
	    	</td>
		</tr>
		<tr>
	    	<td>
	    		<input type="text" name="contactNumber" style="text-align: center" placeholder="Contact Number" required="Yes" size="45"> * 
	    	</td>
		</tr>
		<tr>
	    	<td>
	    		<input type="button" name="btnNext" value="Next" onclick="location.href=''">
	    	</td>
		</tr>
	</table>
</form>
<div id="footer"><?php include_once('footer.php');?></div>

</body>
</html>