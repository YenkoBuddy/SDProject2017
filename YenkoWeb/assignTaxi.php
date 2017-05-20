<!DOCTYPE html>
<html>
<head>
	<title>Assign Taxi</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div id="header"><?php include('header.php');?></div>
<h1><b>Assign Taxi </b></h1>
<table>
	<tr>
	<td>
	<select name="taxi">
		<option>-- Select Taxi --</option>		
	</select> 
	</td>	
		<td> --- </td>	
	<td>	 
	<select name="driver">
		<option>-- Select Driver --</option>		
	</td>
	</select>
	</tr>
	<tr>
	<td ><input type="button" name="btnAssign" value="Assign"></td>
	</tr>
</table>
<div id="footer"><?php include_once('footer.php');?></div>
</body>
</html>