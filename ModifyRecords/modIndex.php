<?php
require_once 'connection.php';
error_reporting( ~E_NOTICE );
session_start();
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$sql1 ="SELECT * FROM OWNER
				WHERE OwnerID =:ownerID";
		$stmt_edit = $conn->prepare($sql1);
		$stmt_edit->execute(array(':ownerID'=>$id));
		$edit_row = $stmt_edit->fetch();
		extract($edit_row);

	/*$currentSuburbID = $POST['SuburbID'];
	$sql2 = "SELECT * FROM SUBURB WHERE SuburbID =:currentSID";
	$stmt_suburb = $conn->prepare($sql2);
	$stmt_suburb->bindParam(':currentSID', $currentSuburbID);
	$stmt_suburb->execute(array(':currentSID'=>$currentSuburbID));
	$suburb_details =$stmt_suburb->fetch(PDO::FETCH_ASSOC);
	extract($suburb_details);
	session_start();
	$_SESSION["SuburbName"] = $suburb_details['SuburbName'];
	$_SESSION["CityID"] = $suburb_details['CityID'];

	$currentCityID = $POST['CityID'];
	$sql3 ="SELECT * FROM CITY WHERE CityID =:$currentCID";
	$stmt_city = $conn->prepare($sql3);
	$stmt_suburb->bindParam(':currentCID', $currentCityID);
	$stmt_city->execute(array(':currentCID'=>$currentCityID));
	$city_details = $stmt_city->fetch(PDO::FETCH_ASSOC);
	extract($city_details);
	$_SESSION["CityName"] = $city_details['CityName'];
	$_SESSION["ProvinceID"] = $city_details['ProvinceID'];

	$currentProvinceID = $POST['ProvinceID'];
	$sql4 ="SELECT ProvinceName PROVINCE WHERE ProvinceID =:$currentPID";
	$stmt_province = $conn->prepare($sql4);
	$stmt_suburb->bindParam(':currentPID', $currentSuburbID);
	$stmt_province->execute(array(':currentPID'=>$currentProvinceID));
	$province_details = $stmt_province->fetch(PDO::FETCH_ASSOC);
	extract($province_details);
	$_SESSION["ProvinceName"] = $city_details['ProvinceName'];*/


	}
	else
	{
		header("Location: mainPage.php");
	}
	if(isset($_POST['save_contact_details']))
	{
		$emailAddress = $_POST['emailAddress'];
		$contactNumber = $_POST['contactNumber'];
		$ownerID =$_GET['edit_id'];
		if(isset($ownerID)){
			$stmt = $conn->prepare('UPDATE OWNER SET EmailAddress=:email,ContactNumber=:contact WHERE OwnerID=:id');

			$stmt->bindParam(':email', $emailAddress);
			$stmt->bindParam(':contact', $contactNumber);
			$stmt->bindParam(':id', $ownerID);

		}
		if($stmt->execute()){
			?>
            <script>
				alert('Successfully Updated Contact Details');
				//window.location.href='index.php';
			</script>
            <?php
		}
		else{
			$errMSG = "Sorry Could Not Updated Contact Details!";
		}	

	}

	if(isset($_POST['save_address']))
	{
		$address1 = $_POST['address1'];
		$suburb = $_POST['suburb'];
		$postalCode = $_POST['postalCode'];
		$ownerID =$_GET['edit_id'];

		if(isset($suburb)){
			$stmt = $conn->prepare('UPDATE OWNER SET Address1=:add1,SuburbID=:subID, PostalCode=:pcode WHERE OwnerID=:id');
			$stmt->bindParam(':add1', $address1);
			$stmt->bindParam(':subID', $suburb);
			$stmt->bindParam(':pcode', $postalCode);
			$stmt->bindParam(':id', $ownerID);

		}
		if($stmt->execute()){
			?>
            <script>
				alert('Successfully Updated Address ...');
				//window.location.href='index.php';
			</script>
            <?php
		}
		else{
			$errMSG = "Sorry Could Not Updated Address !";
		}	

	}	
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Personal Details Modification</title>

</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<script type="text/javascript">

	$(document).ready(function()
	{
		$(".province").change(function()
		{
			var id=$(this).val();
			var dataString ='id='+ id;

			$.ajax
			({
				type: "POST",
				url: "getAddress.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".city").html(html);
				}
			});
		});

		$(".city").change(function()
		{
			var cID=$(this).val();
			var dataString ='cID='+ cID;

			$.ajax
			({
				type: "POST",
				url: "getAddress.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".suburb").html(html);
				}
			});
		});
	});
	</script>
<body>
	<main>
	<h3>Change Personal Details</h3>
	<form method="post">
	<table>
	<tr>
	<td><label>Name: <?php echo $_SESSION['FirstName']; ?> <?php echo $_SESSION['LastName']; ?></label></td>
	</tr>
	</table>
	<table>
	<tr>
	<td><label>Contact Details</label></td>
	</tr>
	<tr>
	<td><label>Contact Number:</label></td>
	<td><input type="text" name="contactNumber" class="contactNumber" value="<?php echo $_SESSION['ContactNumber']; ?>"/></td>
	</tr>
	<tr>
	<td><label>Email Address:</label></td>
	<td><input type="text" name="emailAddress" class="emailAddress" value="<?php echo $_SESSION['EmailAddress']; ?>"/></td>
	</tr>
	<tr>
	<td><input type="submit" name="save_contact_details" value="Save"/></td>
	</tr>
	</table>
	</form><br>
	<form method="post">
	<table>
	<tr><label>Address</label></tr>
	<tr>
	<td><input type="text" name="address1" value="<?php echo $_SESSION['Address1']; ?>"></td>
	</tr>
	<tr>
		<td><select name="province" class="province">
		<option value="">Select Province</option>
		<?php
			$sql="SELECT * FROM PROVINCE ORDER BY ProvinceName";
			$statement =$conn->prepare($sql);
			$statement->execute();
			while($row=$statement->fetch(PDO::FETCH_ASSOC)){
				?>
				<option value="<?php echo $row['ProvinceID']; ?>"><?php echo $row['ProvinceName']; ?></option>
		<?php
			}
		?>
		</select></td>
	</tr>
	<tr>
		<td><select name="city" class="city">
		<option value="">Select City</option>
		</select></td>
	</tr>
	<tr>
		<td><select name="suburb" class="suburb">
		<option value="">Select Suburb</option>
		</select></td>
	</tr>
	<tr>
		<td><input type="text" name="postalCode" value="<?php echo $_SESSION['PostalCode']; ?>"></td>
	</tr>
	<tr>
		<td><input type="password" name="password" placeholder="Password"></td>
	</tr>
	<tr>	
	<td><input type="submit" name="save_address" value="Save"/></td>
	</tr>
	</table>
	</form>
	</main>
</body>
</html>
