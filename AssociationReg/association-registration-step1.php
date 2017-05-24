<?php
    require_once "connection.php";
	session_start();
    session_destroy();

    if(isset($_POST['next']))
    {
    	$associationName = $_POST['associationName'];
    	$contactPerson = $_POST['contactPerson'];
    	$contactNumber = $_POST['contactNumber'];
    	$sql = "INSERT INTO association(AssociationName, ContactPerson, ContactNumber) VALUES(:associationName, :contactPerson, :contactNumber)";
    	$stmt = $conn->prepare($sql);
    	$stmt->bindParam(':associationName', $associationName);
    	$stmt->bindParam(':contactPerson', $contactPerson);
    	$stmt->bindParam(':contactNumber', $contactNumber);
    	$stmt->execute();
    	if($stmt)
    	{
    		session_start();
        	$_SESSION["AssociationName"] = $associationName;
        	$msg = "new record succesfully inserted ...";
        	header("Location: association-registration-step2.php");
        	//header("refresh:5;association-registration-step1.php"); // redirects image view page after 5 seconds.

        }
        else
        {
        	$msg = "error while inserting....<br>";
        	print_r($stmt->errorCode());
        	print_r($stmt->errorInfo());
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Owner Registration</title>
</head>
<body>
	<form method='post'>
	<label>Association Registration</label>
	<table>
		<tr><td><input class="form-control" type="text" name="associationName" placeholder="Association Name" required autofocus/></td></tr>
		<tr><td><input class="form-control" type="text" name="contactPerson" placeholder="Contact Person" required/></td></tr>
		<tr><td><input class="form-control" type="text" name="contactNumber" placeholder="Contact Number" required/></td></tr>
		<tr><td><button type="submit" name="next" class="btn">Next</button></td></tr>
	</table>
	</form>
	    <?php if(isset($msg)){ ?>
            <span ><?php echo $msg; ?></span>
    <?php } ?>
</body>
</html>