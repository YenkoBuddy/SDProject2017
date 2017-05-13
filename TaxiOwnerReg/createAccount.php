<?php
	require "connection.php"; 

	#$ownerID =3;
	$firstName = filter_input(INPUT_POST,'firstName');
	$lastName =filter_input(INPUT_POST,'lastName');
	$idNo=filter_input(INPUT_POST,'idNo');
	$emailAddress=filter_input(INPUT_POST,'emailAddress');
	$contactNumber=filter_input(INPUT_POST,'contactNumber');
	$address1=filter_input(INPUT_POST,'address1');
	$surburbID= filter_input(INPUT_POST,'suburb');
	$postalCode=filter_input(INPUT_POST,'postalCode');
	$noOfTaxis=filter_input(INPUT_POST,'noOfTaxis');
	$password=filter_input(INPUT_POST,'password');
	$proofOfResidence= "";

	$query="INSERT INTO OWNER(FirstName, LastName, IDNo, EmailAddress, ContactNumber, Address1, SuburbID, PostalCode, NoOfTaxis, Password, ProofOfResidence) VALUES(:firstName, :lastName, :idNo, :emailAddress, :contactNumber, :address1, :surburbID, :postalCode, :noOfTaxis, :password, :proofOfResidence)";
	$statement =$conn->prepare($query);
	#$statement->bindParam(':ownerID', $ownerID);
	$statement->bindParam(':firstName', $firstName);
	$statement->bindParam(':lastName', $lastName);
	$statement->bindParam(':idNo', $idNo);
	$statement->bindParam(':emailAddress', $emailAddress);
	$statement->bindParam(':contactNumber', $contactNumber);
	$statement->bindParam(':address1', $address1);
	$statement->bindParam(':surburbID', $surburbID);
	$statement->bindParam(':postalCode', $postalCode);
	$statement->bindParam(':noOfTaxis', $noOfTaxis);
	$statement->bindParam(':password', $password);
	$statement->bindParam(':proofOfResidence', $proofOfResidence);
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
	<title>Confirm</title>
</head>
	
</script>
<body>
<main>
</main>
</body>
</html>
