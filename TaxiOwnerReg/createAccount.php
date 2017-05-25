<?php
	require "connection.php"; 

	$username=filter_input(INPUT_POST,'username');
	$password=filter_input(INPUT_POST,'password');
	$accesslevel ="1";

    if(isset($_POST['submit']))
    {

        if(isset($username) AND isset($password))
        {
            $sql2 = "INSERT INTO logins(Username, Password, AccessLevel) VALUES(:username, :password, :accesslevel)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bindParam(':username', $username);
            $stmt2->bindParam(':password', $password);
            $stmt2->bindParam(':accesslevel', $accesslevel);
            $stmt2->execute();

            $sql3 = "SELECT * FROM logins WHERE Username = :username AND Password=:password";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->bindParam(':username', $username);
            $stmt3->bindParam(':password', $password);
            $stmt3->bindParam(':accesslevel', $accesslevel);
            $stmt3->execute(array(':username'=>$username, ':password'=>$password));
            $loginInfo = $stmt3->fetch(PDO::FETCH_ASSOC);
            if(!$loginInfo)
            {
                $msg = "Couldn't get login info.";
            }
            else
        	{
            extract($loginInfo);
            session_start();
            $_SESSION["LoginID"] = $loginInfo['LoginID'];
            $loginID = $_SESSION["LoginID"];
        	}
        }
	$firstName = filter_input(INPUT_POST,'firstName');
	$lastName =filter_input(INPUT_POST,'lastName');
	$idNo=filter_input(INPUT_POST,'idNo');
	$contactNumber=filter_input(INPUT_POST,'contactNumber');
	$emailAddress=filter_input(INPUT_POST,'emailAddress');
	$address1=filter_input(INPUT_POST,'address1');
	$surburbID= filter_input(INPUT_POST,'suburb');
	$associationID=filter_input(INPUT_POST,'associationID');
	$proofOfResidence = "";


	$query="INSERT INTO owner(FirstName, LastName, IDNo, ContactNumber, EmailAddress, Address1, SuburbID, ProofOfResidence, AssociationID, LoginID) VALUES(:firstName, :lastName, :idNo, :contactNumber, :emailAddress, :address1, :surburbID, :proofOfResidence, :associationID, :loginID)";
	$statement =$conn->prepare($query);
	$statement->bindParam(':firstName', $firstName);
	$statement->bindParam(':lastName', $lastName);
	$statement->bindParam(':idNo', $idNo);
	$statement->bindParam(':contactNumber', $contactNumber);
	$statement->bindParam(':emailAddress', $emailAddress);
	$statement->bindParam(':address1', $address1);
	$statement->bindParam(':surburbID', $surburbID);
	$statement->bindParam(':proofOfResidence', $proofOfResidence);
	$statement->bindParam(':associationID', $associationID);
	$statement->bindParam(':loginID', $loginID);

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
}
	
?>
