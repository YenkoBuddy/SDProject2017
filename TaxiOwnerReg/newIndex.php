<?php

	/*$provinceQuery = "SELECT * FROM PROVINCE";
    #$cityQuery= "SELECT CITY.CityID, CITY.CityName FROM CITY LEFT JOIN PROVINCE ON CITY.ProvinceID =PROVINCE.Province";
    $province = $conn->query($provinceQuery);
    $provinceID = $GET['ProvinceID'];
    if(isset($GET['province'])){
    	$cityQuery = "SELECT CityID, CityName FROM CITY WHERE CITY.ProvinceID = $provinceID";
    	$city = $conn->prepare($userQuery);
    	$city->execute([$provinceID]);
    }
    $city =$conn->query($cityQuery);
      try{
				foreach($conn->query($sql) as $row){
					echo "nt".$row['ProvinceID']."nt".$row['ProvinceName']."nn";
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
				die();
			}
			echo "";
    */
?>
<!DOCTYPE html>
<html>
<head>
	<title>Owner Registration</title>
</head>
	

	<?php
	require_once "connection.php"; 
	?>
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
	<form action='createAccount.php' method='post' >
		<h2>Create Account</h2>
		<select name="association" required autofocus>
            <option value="">--Select Association--</option>
             <?php
                $sql =" SELECT * FROM association ORDER BY AssociationName";
                $stmt =$conn->prepare($sql);
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <option value="<?php echo $row['AssociationID']; ?>"><?php echo $row['AssociationName']; ?></option>
            <?php
                }
            ?>
        </select><br>
		<input type="text" name="firstName" placeholder="First Name" required ><br>
		<input type="text" name="lastName" placeholder="Last Name" required><br>
		<input type="username" name="username" placeholder="Username" required><br>
		<input type="text" name="idNo" placeholder="ID Number" required><br>
		<input type="text" name="emailAddress" placeholder="Email Address" required><br>
		<input type="text" name="contactNumber" placeholder="Contact Number" required><br>
		<input type="text" name="address1" placeholder="Street Address" required><br>

		<select name="province" class="province" required>
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
		</select><br>
		
		<select name="city" class="city" required>
		<option value="">Select City</option>
		</select><br>

		<select name="suburb" class="suburb" required>
		<option value="">Select Suburb</option>
		</select><br>

		<input type="password" name="password" placeholder="Password" required><br>
		<input type="password" name="confirmPassword" placeholder="Confirm Password" required><br>
		<input type="checkbox" name="termsAndConditions">Accept Terms & Conditions(Terms Link)<br>
		<input type="submit" name="submit" value="Create Account">
	</form>
</main>
</body>
</html>
