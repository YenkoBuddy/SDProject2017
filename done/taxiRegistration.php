<?php
	error_reporting(~E_NOTICE);
    require_once 'include/config.php';
    require_once 'include/connection.php';

    session_start();
    
    session_destroy();
    
    if(isset($_POST['btnNext']))
    {
        $regNumber = $_POST['regNumber'];
        $type = $_POST['type'];
        $year = $_POST['year'];
        $model = $_POST['model'];
        $description = $_POST['description'];
        $ownerID = "9";
        $route="1";
        $licenceDisc = $_POST['licenceDisc'];
        $inspectionReport = $_POST['inspectionReport'];
    
            $stmt = $conn->prepare('INSERT INTO taxi(RegNo, Type, Year, Model, Description, OwnerID, RouteID /*, LicenceDisc, InspectionReport*/) 
            VALUES(:regNumber, :type, :year, :model, :description, :ownerID, :route /*:licenceDisc, :inspectionReport*/)');
          
            $stmt->bindParam(':regNumber',$regNumber);
            $stmt->bindParam(':type',$type);
            $stmt->bindParam(':year',$year);
            $stmt->bindParam(':model',$model);
            $stmt->bindParam(':description',$description);
            $stmt->bindParam(':ownerID',$ownerID);
            $stmt->bindParam(':route', $route);
/*$stmt->bindParam(':licenceDisc',$licenceDisc);
            $stmt->bindParam(':inspectionReport',$inspectionReport);
*/
            $stmt->execute();
            if($stmt)
            {
                $successMSG = "new record succesfully inserted ...";
                session_start();
                $_SESSION['RegNo'] = $regNumber;
                $_SESSION['Type'] = $type;
                header("Location:driverRegistration.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting....";
            }     
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register Taxi</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
    <div id="header"><?php include('header.php');?></div>
<h1><b>Taxi Details</b></h1>
<form method="post">
    <table>
    <tr>
        <td> <input type="text" name="regNumber" placeholder="Registration Number" required="Yes" style="text-align: center"> </td>
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
<?php if(isset($successMSG)){ ?>
            <span><?php echo $successMSG; ?></span>
<?php } ?>
<?php if(isset($errMSG)){ ?>
            <span><?php echo $errMSG; ?></span>
<?php } ?>
<div id="footer"><?php include_once('footer.php');?></div>
</body>
</html>