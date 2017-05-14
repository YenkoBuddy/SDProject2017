<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
</head>
<body>

<h1><b> Create Account </b></h1>

<form>
	<table>
		<tr>
			<td> <input type="text" name="firstName" placeholder="First Name" required="Yes" size="22" style="text-align: center"> * </td>
		    <!--&nbsp; &nbsp;--> 
			<td> <input type="text" name="lastName" placeholder="Last Name" required="Yes" size="24" style="text-align: center"> * </td>			
		</tr>
		<tr>
			<td colspan="2"><input type="text" name="idNumber" placeholder="ID Number" required="Yes" size="53" style="text-align: center"> * </td>
		</tr>
		<tr>
			<td colspan="2"><input type="text" name="contactNummber" placeholder="Contact Number" required="Yes" size="53" style="text-align: center"> * </td>
		</tr>
		<tr>
			<td colspan="2"><input type="text" name="email" placeholder="E-mail Address" required="Yes" size="53" style="text-align: center"> * </td>
		</tr>		
		<tr>
			<td colspan="2"><input type="text" name="numberOfTaxis" placeholder="Number Of Taxi's" size="53" style="text-align: center"> *</td>
		</tr>
		</table>
<table>
	<tr>
	<td>
	<select name="province">
		<option>-- Select Province --</option>		
	</select> 
	</td>
	<td>	 
	<select name="city">
		<option>-- Select City --</option>		
	</select> 
	</td>
	<td>
	<select name="suburb">
		<option>-- Select Suburb --</option> 		
	</select> *
	</td>
</tr>

<tr>
	<td colspan="3"><input type="text" name="streetAddress" placeholder="Street Address" required="Yes" style="text-align: center;" size="53"> * </td>
</tr> 
 
<tr>
	<td colspan="3"><input type="password" placeholder="Password" required="Yes" style="text-align: center;" size="53"> * </td>
</tr>
 
<tr>
	<td colspan="3"><input type="password" name="confirmPassword" placeholder="Confirm Password" required="Yes" style="text-align: center;" size="53"> * </td>
</tr>

<tr>
	<td><input type="submit" value="Finish"></td>
</tr>
</table>
</form>



</body>
</html>