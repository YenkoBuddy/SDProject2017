<?php
$associationID=2;
session_start();
session_destroy();
require_once('connection.php');

$sql="SELECT owner.OwnerID, CONCAT(owner.FirstName, ' ', owner.LastName) AS OwnerName, CONCAT(application.FirstName, ' ', application.LastName) AS DriverName, CONCAT(application.RegNo, ' ', application.Type) AS Taxi, ApplicationID,ValidationStatus FROM application, owner, association_clerk WHERE owner.OwnerID = application.OwnerID AND owner.AssociationID = :associationID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':associationID', $associationID);
$stmt->execute();
$applicationInfo= $stmt->fetchAll();
$stmt->closeCursor();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Process Application</title>
<style type="text/css">
		a {text-decoration: none}
		a:link {color: black;}      /* unvisited link */
		a:visited {color: black;}   /* visited link */
		a:hover {color: black;}     /* mouse over link */
		a:active {color: black;}
		table{
		border-collapse: collapse;
		width:40%
		}
</style>
</head>
<body>
	<form method='post'>
	<table border="1">
		<tr>
		<th>Applicant</th>
		<th>Driver</th>
		<th>Taxi</th>
		<th>Validation Status</th>
		</tr>
		
		<?php foreach ($applicationInfo as $applicationInfo) : ?>
		<tr>
		<tr><td><a href="http:process_application_form.php?applicationID=<?php echo $applicationInfo['ApplicationID']; ?>"><?php echo $applicationInfo['OwnerName']?></a></td>
		<td><?php echo $applicationInfo['DriverName'];?></td>
		<td><?php echo $applicationInfo['Taxi'];?></td>
		<td><?php echo $applicationInfo['ValidationStatus'];?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	</form>
</body>
</html>