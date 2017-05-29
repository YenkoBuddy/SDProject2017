<?php
require_once('connection.php');
$applicationID = filter_input(INPUT_GET, 'applicationID');
$sql="SELECT * FROM application WHERE ApplicationID =:applicationID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':applicationID', $applicationID);
$stmt->execute();
$appInfo= $stmt->fetchAll();
$stmt->closeCursor();

foreach ($appInfo as $appInfo):

	$driverName = $appInfo['FirstName']." ".$appInfo['LastName'];
	$taxi = $appInfo['RegNo']." ".$appInfo['Type'];
	$ownerID= $appInfo['OwnerID'];
	$validationStatus = $appInfo['ValidationStatus'];
endforeach;

if($stmt)
{
	$sql1 = 'SELECT AssociationID, CONCAT(FirstName," ", LastName) AS OwnerName FROM owner WHERE OwnerID=:ownerID';
	$stmt1 = $conn->prepare($sql1);
	$stmt1->bindValue(':ownerID', $ownerID);
	$stmt1->execute();
	$ownerInfo = $stmt1->fetchAll();
	$stmt1->closeCursor();
}

foreach ($ownerInfo as $ownerInfo):
	$ownerName = $ownerInfo['OwnerName'];
	$associationID = $ownerInfo['AssociationID'];

endforeach;

if($stmt)
{
	$sql2 = 'SELECT AssociationName FROM association WHERE AssociationID =:associationID';
	$stmt2 = $conn->prepare($sql2);
	$stmt2->bindParam(':associationID', $associationID);
	$stmt2->execute();
	$associationInfo= $stmt2->fetchAll();
	$stmt2->closeCursor();
}
foreach ($associationInfo as $associationInfo):
	$associationName = $associationInfo['AssociationName'];
endforeach;



if($validationStatus == "Valid")
{
	$message = "Dear ".$ownerName."\r\n\r\nYour application has been approved. Further actions will be communicated.\r\n\r\nApplication Details:\r\n"."Driver Name: ".$driverName."\r\nTaxi: ".$taxi."\r\n\r\nSee yenkobuddy.co.za for updated and more.\r\n\r\nRegards\r\n".$associationName;
}
else if($validationStatus =="Invalid")
{
	$message = "Dear ".$ownerName."\r\n\r\nYour application has been rejected due to the following documents being invalid:\r\n\r\n\r\n\r\nApplication Details:\r\n"."Driver Name: ".$driverName."\r\nTaxi: ".$taxi."\r\n\r\nPlease re-apply with valid documents.\r\n\r\nRegards\r\n".$associationName;
	$notice ="*Please enter the invalid documents and addition information above";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Process Application</title>
	<style type="text/css">
		<?php if($validationStatus == "Valid"){ ?>
			.validation {color: green;}
		<?php } else if($validationStatus == "Invalid"){ ?>
			.validation {color:red;}
		<?php } ?>
	</style>
</head>
<body>
	<h2>Process Application</h2>
	<form method='post' action="process_application.php">
	<table>
	<tr><td>
	<label>Taxi Owner Name: </label>
	<label><?php echo $ownerName; ?></label><br>
	</td></tr>
	<tr><td>
	<label>Validation Status: </label>
	<label class="validation"><?php echo $validationStatus;?></label><br>
	</td></tr>
	<tr><td>
	<textarea rows="17" cols="60"><?php echo $message ?></textarea><br>
	</td></tr>
    <input type="hidden" name="applicationID" value="<?php echo $applicationID; ?>">
    <tr><td>
    <?php if ($validationStatus=="Invalid"){
    		echo $notice;
    	}
    ?><br>
    </td></tr>
    <tr><td>
    <input type="submit" value="Send" style="float: right;">
    </td></tr>
    </table>
	</form>
</body>
</html>