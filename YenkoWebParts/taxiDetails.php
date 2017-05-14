<!DOCTYPE html>
<html>
<head>
	<title>Taxi Details</title>
</head>
<body>

<h1><b>Taxi Details</b></h1>
<table>
	<tr>
		<td> <input type="text" name="regNumber" placeholder="Registration Number" required="Yes" style="text-align: center"> </td>
	    <!--&nbsp; &nbsp;--> 
		<td> <input type="text" name="type" placeholder="Type" required="Yes" style="text-align: center"> * </td>		
	</tr>
	<tr>
		<td> <input type="text" name="year" placeholder="Year" required="Yes"
		style="text-align: center"></td>
		<td> <input type="text" name="model" placeholder="Model" required="Yes"
		style="text-align: center"> *</td>
	</tr>
	<tr>
		<td colspan="3"><input type="text" name="Description" placeholder="Description" required="Yes" style="text-align: center"> * 
		</td>
	</tr>
	<tr>
		<td>Moto Vehicle Licence Disc: </td>
		<td><input type="button" name="btnChoose1" value="Choose File"> *</td>
	</tr>
	<tr>
		<td>Vehicle Inspection Report: </td>
		<td><input type="button" name="btnChoose2" value="Choose File" style="text-align: right;"> * </td>
	</tr>
	<tr>
		<td><input type="button" name="btnNext" value="Next"></td>
	</tr>
</table>


</body>
</html>