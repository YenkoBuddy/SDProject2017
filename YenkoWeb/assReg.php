<!DOCTYPE html>
<html>
<head>
	<title>Register Association</title>
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
<div id="header"><?php include('header.php');?></div>
	<h1><b>Register Association</b></h1>
<form>
	<table>
	<tr>
		<td><input type="text" name="idNumber" style="text-align: center" placeholder="ID Number" required="Yes" size="45"> * </td>
	</tr>
	<tr>
		<td><input type="text" name="associationName" style="text-align: center" placeholder="Association Name" required="Yes" size="45"> * </td>
	</tr>
	<tr> 
	    <td><input type="text" name="contctPerson" style="text-align: center" placeholder="Contact Person" required="Yes" size="45"> * </td>
	</tr>
	<tr>
	    <td><input type="text" name="contactNumber" style="text-align: center" placeholder="Contact Number" required="Yes" size="45"> * </td>
	</tr>
	<tr>
	    <td><input type="button" name="b1next" value="Next" onclick="location.href='regAssociationAdmin.html'"></td>
	</tr>
	</table>
</form>
<div id="footer"><?php include_once('footer.php');?></div>
</body>
</html>