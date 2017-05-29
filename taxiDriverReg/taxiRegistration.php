<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register Taxi</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
    <div id="header"><?php include('header.php');?></div>
<h1><b>Taxi Details</b></h1>
<form method="post" action="driverRegistration.php">
    <table>
    <tr>
        <td> <input type="text" name="regNo" placeholder="Registration Number" required="Yes" style="text-align: center"> </td>
        <!--&nbsp; &nbsp;--> 
        <td> <input type="text" name="type" placeholder="Type" required="Yes" style="text-align: center"> * </td>       
    </tr>
    <tr>
        <td> 
            <select name="year" style="WIDTH: 170px" onfocus="this.style.width='100px'" onmouseout="this.style.width='170px'"><option>Select Year<?php
                    $aa = date('Y');
                    foreach (range(2000, $aa) as $key => $value) 
                    {
                        echo "<option>".$value."</option>";
                        
                    }

                ?></option>
                
            </select>
        </td>
        <td> <input type="text" name="model" placeholder="Model" required="Yes"
        style="text-align: center"> *</td>
    </tr>
    
    <tr>
        <td colspan="2"><input type="text" size="46" name="description" placeholder="Description" required="Yes" style="text-align: center"> * 
        </td>
    </tr>
    <tr>
        <td> <select name="startPoint" style="WIDTH: 170px" onfocus="this.style.width='100px'" onmouseout="this.style.width='170px'"><option>Starting Point</option> </select></td> 
        <td> <select name="endPoint" style="WIDTH: 170px" onfocus="this.style.width='100px'" onmouseout="this.style.width='170px'"><option>Ending Point</option></select>* </td>       
    </tr>
    <tr>
        <td>Motor Vehicle Licence Disc: </td>
        <td><input type="file" name="licenceDisc" value="Choose File"> *</td>
    </tr>
    <tr>
        <td>Vehicle Inspection Report: </td>
        <td><input type="file" name="inspectionReport" value="Choose File" style="text-align: right;"> * </td>
    </tr>
    <tr>
        <td><input type="submit" name="btnNext" value="Next"></td>
    </tr>
</table>

</form>
<div id="footer"><?php include_once('footer.php');?></div>
</body>
</html>