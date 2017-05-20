<!DOCTYPE html>
<html>
    <head>
    	<title>Registration Site</title>
    	<!--<link rel="stylesheet" href="style.css">-->
    </head>
	<body>
		<div id="header"><?php include('header.php');?></div>


	<h1>Create An Account</h1> 
	<table>
		<tr>
			<td>First Name:</td><td><input name="firstName" ng-model="firstName" required></td>
		</tr>
		<tr>
			<td>Last Name:</td><td><input type="text" ng-model="lastName"></td>
		</tr>
		<tr>
			<td>ID Number:</td><td><input type="text" ng-model="idNo"></td>
		</tr>
		<tr>
			<td>Street:</td><td><input type="text" ng-model="address1"></td>
		</tr>
		<tr>
			<td>City:</td>
			<td>
				<select name="city" id="city" ng-model="data.city">
					<option value="durban">Durban</option>
					<option value="port-elizabeth">Port Elizabeth</option>
					<option value="george">George</option>
				</select><br</td>
		</tr>
		<tr>
			<td>Suburb:</td>
			<td>
				<select name="suburb" id="suburb" ng-model="data.suburb">
					<option value="newland-west">Newlands West</option>
					<option value="summerstrand">Summerstrand</option>
					<option value="thembalethu">Thembalethu</option>
				</select><br</td>
		</tr>
		<tr>
			<td>Postal Code:</td><td><input type="text" ng-model="address2"></td>
		</tr>
		<tr>
			<td>Proof of Residence:</td><td><input type="file" file-model="proofOfAddress"></td>
		</tr>
		<tr>
			<td>Contact Number:</td><td><input type="text" ng-model="contactNo"></td>
		</tr>
		<tr>
			<td>Email Address:</td><td><input type="email" name="myAddress" ng-model="text">
    <span ng-show="myForm.myAddress.$error.email"></span></td>
		</tr>
		<tr>
			<td>Number of Taxis:</td><td><input type="text" ng-model="noOfTaxis"></td>
		</tr>
		<tr>
			<td>Password:</td><td><input type="text" ng-model="password"></td>
		</tr>
		<tr>
			<td><input type="checkbox" ng-model="checkboxModel.terms">Accept Terms & Conditions(Terms Link)</td>
		</tr>
		<tr>
			<td></td><td><button ng-click="myFunc()">Create Account</button></td>
		</tr>
		
	</table>


</div>
		<div id="footer"><?php include_once('footer.php');?></div>
	</body>
</html>