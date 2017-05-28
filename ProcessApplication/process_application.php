<?php
require_once('connection.php');
$applicationID = filter_input(INPUT_POST, 'applicationID');

$sql="SELECT * FROM application WHERE ApplicationID =:applicationID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':applicationID', $applicationID);
$stmt->execute();
$appInfo= $stmt->fetchAll();
$stmt->closeCursor();

foreach ($appInfo as $appInfo):
	$regNo =$appInfo['RegNo'];
	$type = $appInfo['Type'];
	$year =$appInfo['Year'];
	$model = $appInfo['Model'];
	$description = $appInfo['Description'];
	$licenceDisc = $appInfo['LicenceDisc'];
	$ownerID= $appInfo['OwnerID'];
	$routeID = $appInfo['RouteID'];
	$validationStatus = $appInfo['ValidationStatus'];

	$firstName = $appInfo['FirstName'];
	$lastName = $appInfo['LastName'];
	$IDNo = $appInfo['IDNo'];
	$contactNumber = $appInfo['ContactNumber'];
	$email = $appInfo['EmailAddress'];
	$address1 = $appInfo['Address1'];
	$suburbID = $appInfo['SuburbID'];
	$proofOfResidence = $appInfo['ProofOfResidence'];
	$driversLicence = $appInfo['DriversLicence'];
	$licenceExpiryDate = $appInfo['LicenceExpiryDate'];
	$prdp= $appInfo['PrDP'];
	$prdpExpiryDate = $appInfo['PrDPExpiryDate'];
	$photo = $appInfo['Photo'];
endforeach;
$barcode=" ";

if($validationStatus=="Valid"){
$sql1 ="INSERT INTO taxi(RegNo, Type, Year, Model, Description, LicenceDisc, InspectionReport, Barcode, OwnerID, RouteID)
	VALUES (:regNo, :type, :year, :model, :description, :licenceDisc, :inspectionReport, :barcode, :ownerID, :routeID)";
$stmt1 = $conn->prepare($sql1);
$stmt1->bindParam(':regNo', $regNo);
$stmt1->bindParam(':type', $type);
$stmt1->bindParam(':year', $year);
$stmt1->bindParam(':model', $model);
$stmt1->bindParam(':description', $description);
$stmt1->bindParam(':licenceDisc', $licenceDisc);
$stmt1->bindParam(':inspectionReport', $inspectionReport);
$stmt1->bindParam(':barcode', $barcode);
$stmt1->bindParam(':ownerID', $ownerID);
$stmt1->bindParam(':routeID', $routeID);

if($stmt1->execute()){
	$sql2 ="INSERT INTO driver(FirstName, LastName, IDNo, ContactNumber, EmailAddress, Address1, SuburbID, ProofOfResidence, DriversLicence, LicenceExpiryDate, PrDP, PrDPExpiryDate, Photo, RegNo)
	VALUES (:firstName, :lastName, :IDNo, :contactNumber, :email, :address1, :suburbID, :proofOfResidence, :driversLicence, :licenceExpiryDate, :prdp, :prdpExpiryDate, :photo, :regNo)";
	$stmt2 = $conn->prepare($sql2);
	$stmt2->bindParam(':firstName', $firstName);
	$stmt2->bindParam(':lastName', $lastName);
	$stmt2->bindParam(':IDNo', $IDNo);
	$stmt2->bindParam(':contactNumber', $contactNumber);
	$stmt2->bindParam(':email', $email);
	$stmt2->bindParam(':address1', $address1);
	$stmt2->bindParam(':suburbID', $suburbID);
	$stmt2->bindParam(':proofOfResidence', $proofOfResidence);
	$stmt2->bindParam(':driversLicence', $driversLicence);
	$stmt2->bindParam(':licenceExpiryDate', $licenceExpiryDate);
	$stmt2->bindParam(':prdp', $prdp);
	$stmt2->bindParam(':prdpExpiryDate', $prdpExpiryDate);
	$stmt2->bindParam(':photo', $photo);
	$stmt2->bindParam(':regNo', $regNo);

	if($stmt2->execute())
	{
		$sql3 ="SELECT DriverID FROM driver WHERE IDNo =:IDNo";
		$stmt3 = $conn->prepare($sql3);
		$stmt3->bindParam(':IDNo', $IDNo);
		$stmt3->execute();
		$driverInfo= $stmt3->fetchAll();
		$stmt3->closeCursor();

		foreach ($driverInfo as $driverInfo):
		$driverID =$driverInfo['DriverID'];
		endforeach;

	}
	
}

if($stmt1 AND $stmt2)
{

	$startDate = date('Y-m-d');
	$status ="Active";
	$sql4 ="INSERT INTO taxi_driver(RegNo, DriverID, StartDate, Status)
	VALUES (:regNo, :driverID, :startDate, :status)";
	$stmt4 = $conn->prepare($sql4);
	$stmt4->bindParam(':regNo', $regNo);
	$stmt4->bindParam(':driverID', $driverID);
	$stmt4->bindParam(':startDate', $startDate);
	$stmt4->bindParam(':status', $status);
	
	if($stmt4->execute()){
		$inserted="True";
	}

	
}
}

if($inserted = "True" || $validationStatus == "Invalid"){
	$sql5 ="DELETE FROM application WHERE ApplicationID=:applicationID";
	$stmt5 = $conn->prepare($sql5);
	$stmt5->bindParam(':applicationID', $applicationID);

	if($stmt5->execute()){
        header("refresh:1; view_applications.php");
    }
    else
       {
        		$msg = "error while processing....<br>";
        		print_r($stmt5->errorCode());
        		print_r($stmt5->errorInfo());
       	 	}
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

</body>
</html>