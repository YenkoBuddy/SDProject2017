<?php
	require_once "connection.php"; 
	$ownerID = 9;

if (isset($_POST['btnAssign']))
{
	$taxi = $_POST['taxi'];
	$driver = $_POST['driver'];
	$startDate = date('Y-m-d');
	$endDate = date('Y-m-d');
	$activeStatus = "Active";
	$inactiveStatus ="Inactive";

	if(isset($_POST['taxi']) AND isset($_POST['driver']))
	{

		$query3 ="UPDATE taxi_driver SET EndDate =:endDate, Status=:inactiveStatus WHERE RegNo =:taxi AND Status =:activeStatus";
		$statement3 =$conn->prepare($query3);
		$statement3->bindParam(':endDate', $endDate);
		$statement3->bindParam(':inactiveStatus', $inactiveStatus);
		$statement3->bindParam(':taxi', $taxi);
		$statement3->bindParam(':activeStatus', $activeStatus);
		$statement3->execute();

		$query ="UPDATE taxi_driver SET EndDate =:endDate, Status=:inactiveStatus WHERE DriverID =:driver AND Status =:activeStatus";
		$statement =$conn->prepare($query);
		$statement->bindParam(':endDate', $endDate);
		$statement->bindParam(':inactiveStatus', $inactiveStatus);
		$statement->bindParam(':driver', $driver);
		$statement->bindParam(':activeStatus', $activeStatus);

		if($statement->execute()){
			$query1="INSERT INTO taxi_driver(RegNo, DriverID, StartDate, Status)
				VALUES (:taxi, :driver, :startDate, :activeStatus )";
			$statement1 =$conn->prepare($query1);
			$statement1->bindParam(':taxi', $taxi);
			$statement1->bindParam(':driver', $driver);
			$statement1->bindParam(':startDate', $startDate);
			$statement1->bindParam(':activeStatus', $activeStatus);

			$statement1->execute();
		}
		else
		{
			$successMSG = "Welele";
			print_r($statement->errorCode());
        	print_r($statement->errorInfo());
		}
		



	}

	/*if(isset($_POST['driver']))
	{
		$query="INSERT INTO taxi-driver(RegNo, DriverID)
				VALUES (:taxi, :driver)";
		$statement =$conn->prepare($query);
		$statement->bindParam(':taxi', $taxi);
		$statement->bindParam(':driver', $driver);
		if ($statement->execute())
		{
			$successMSG = "New record succesfully inserted";
		}
	}*/
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Assign Taxi</title>
</head>
<body>
<form method="post">

<h1><b>Assign Taxi </b></h1>
<table>
	<tr>
	<td>
	<select name="taxi">
		<option>-- Select Taxi --</option>
		<?php 
			$sql="SELECT DISTINCT taxi.RegNo, Type FROM taxi_driver, taxi WHERE taxi_driver.RegNo = taxi.RegNo AND OwnerID=:ownerID";
			$statement = $conn->prepare($sql);
			$statement->bindParam(':ownerID', $ownerID);
			$statement->execute();
			while ($row=$statement->fetch(PDO::FETCH_ASSOC)) 
			{
		?>
				<option value="<?php echo $row['RegNo']; ?>"><?php echo $row['RegNo'], " " ,$row['Type']; ?>
				</option>
		<?php
			}
		?>	

	</select> 
	</td>	
		<td> --- </td>	
	<td>	 
	<select name="driver">
		<option>-- Select Driver --</option>
		<?php 
			$sql= "SELECT DISTINCT taxi_driver.DriverID, FirstName, LastName FROM taxi_driver, driver, taxi WHERE taxi_driver.RegNo = taxi.RegNo AND OwnerID=:ownerID AND driver.DriverID = taxi_driver.DriverID";
			$statement = $conn->prepare($sql);
			$statement->bindParam(':ownerID', $ownerID);
			$statement->execute();
			while ($row=$statement->fetch(PDO::FETCH_ASSOC)) 
			{
		?>
				<option value="<?php echo $row['DriverID']; ?>"><?php echo $row['FirstName'], " " ,$row['LastName']; ?>					
				</option>
		<?php
			}
		?>			
	</td>
	</select>
	</tr>
	<tr>
	<td ><input type="submit" name="btnAssign" value="Assign"></td>
	</tr>
</table>



</form>
<?php if(isset($successMSG)){ ?>
            <span><?php echo $successMSG; ?></span>
<?php } ?>
</body>
</html>