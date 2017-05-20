<?php
	error_reporting( ~E_NOTICE ); // avoid notice
    require_once 'config.php';
    session_start();
    $_SESSION['Empty'] = 'Empty';
    session_destroy();
    
        extract($taxiinfo);
        session_start();
        $_SESSION["RegNumber"] = $taxiinfo['RegNumber'];
        $_SESSION["Type"] = $taxiinfo['Type'];
        $_SESSION["Year"] = $taxiinfo['Year'];
        $_SESSION["Model"] = $taxiinfo['Model'];
        $_SESSION["Description"] = $taxiinfo['Description'];
        $_SESSION["StartRoute"] = $taxiinfo['StartRoute'];
        $_SESSION["EndRoute"] = $taxiinfo['EndRoute'];
        $_SESSION["LicenceDisc"] = $taxiinfo['LicenceDisc'];
        $_SESSION["InspectionReport"] = $userinfo['InspectionReport'];
    
        // REDIRECT TO PAGE
        header("Location: popup.php");// notification for pending 

    if(isset($_POST['btnNext']))
    {
        $regNumber = $_POST['regNumber'];
        $year = $_POST['year'];
        $model = $_POST['model'];// user name
        $description = $_POST['description'];
        $startRoute = $_POST['startRoute'];
        $endRoute = $_POST['endRoute'];
                
        if(empty($regNumber)){
            $errMSG = "Please enter the taxi registration number.";
        }
        else if(empty($year)){
            $errMSG = "Please select/enter the taxi year.";
        }
        else if(empty($model)){
            $errMSG = "Please enter the model of the taxi.";
        }
        else if(empty($description)){
            $errMSG = "Please enter the taxi description.";
        }
        else if(empty($routeStart)){
            $errMSG = "Please select a stating route for a taxi.";
        }
        else if(empty($routeEnd)){
            $errMSG = "Please select an ending route for a taxi.";
        }
        else if(empty($licenceDisc)){
            $errMSG = "Please select taxi Licence disc.";
        }
        else if(empty($inspectionReport)){
            $errMSG = "Please select taxi Licence disc.";
        }
        else
        {
            $upload_dir = 'taxiDocument/'; // upload directory
            $docExt = strtolower(pathinfo($licenceDisc,PATHINFO_EXTENSION));
        }
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('INSERT INTO Taxi(RegNo, Type, Year, Model, Description, StartRoute, EndRoute, LicenceDisc, InspectionReport) 
			VALUES(:regNumber, :type, :year, :model, :description, :startRoute, :endRoute, :licenceDisc, :inspectionReport)";
          
            $stmt->bindParam(':regNo',$regNumber);
            $stmt->bindParam(':type',$type);
            $stmt->bindParam(':year',$year);
            $stmt->bindParam(':model',$model);
            $stmt->bindParam(':description',$description);
            $stmt->bindParam(':startRoute',$startRoute);
            $stmt->bindParam(':endRoute',$endRoute);
            $stmt->bindParam(':licenceDisc',$licenceDisc)
            $stmt->bindParam(':inspectionReport',$inspectionReport)

            if($stmt->execute())
            {
                $successMSG = "new record succesfully inserted ...";
                header("refresh:5;driver.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting....";
            }
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
        <td> <input type="text" name="startRoute" placeholder="Stating Route" required="Yes" style="text-align: center"> </td>
        <!--&nbsp; &nbsp;--> 
        <td> <input type="text" name="endRoute" placeholder="Ending Route" required="Yes" style="text-align: center"> * </td>       
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

<div id="footer"><?php include_once('footer.php');?></div>
</body>
</html>