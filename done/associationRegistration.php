<?php
	require_once "connection.php";

	$associationName = filter_input(INPUT_POST,'asssociationName');
	$contactPerson =filter_input(INPUT_POST,'contactPerson');
	$contactNumber=filter_input(INPUT_POST,'contactNumber');
	
	$query="INSERT INTO association(AssociationName, ContactPerson, ContactNumber) VALUES(:asssociationName, :contactPerson, :contactNumber)";
	$statement =$conn->prepare($query);
	
	$statement->bindParam(':asssociationName', $asssociationName);
	$statement->bindParam(':contactPerson', $contactPerson);
	$statement->bindParam(':contactNumber', $contactNumber);
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
	<title>Association Registration Page</title>
</head>
<body>
<div id="header"><?php include('header.php');?></div>
	<h1><b>Register Association</b></h1>
<form>
	<table>
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