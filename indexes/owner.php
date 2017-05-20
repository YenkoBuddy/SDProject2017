<?php 

    require_once("./include/config.php");

    if(!$web->CheckLogin())
    {
        $web->RedirectToURL("owner.php");
        exit;
    }

?>

<!DOCTYPE html>
<html>
    <head>
    	<title>Taxi Owner Page</title>
    	<!--<link rel="stylesheet" href="style.css">-->
    </head>
	<body>
		<div id="header"><?php include('header.php');?></div>
		<table>
            <tr>
                <td>
                    <form method="POST" action="taxiAndDriverRegistration.php">
                        <div class="form-group">   
                            <img src="./images/1.JPG">
                            <p><a href="">New Taxi & Driver Registration</a></p>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="POST" action="assign.php">
                        <div class="form-group">   
                            <img src="./images/1.JPG">
                            <p><a href="">Assign Taxi</a></p>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="POST" action="viewRatings.php">
                        <div class="form-group">   
                            <img src="./images/1.JPG">
                            <p><a href="">View Ratings</a></p>
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form method="POST" action="modifyDriver.php">
                        <div class="form-group">   
                            <img src="./images/1.JPG">
                            <p><a href="">Modify Driver Details</a></p>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="POST" action="modifyOwner.php">
                        <div class="form-group">   
                            <img src="./images/1.JPG">
                            <p><a href="">Modify Personal Details</a></p>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="POST" action="checkDetails.php">
                        <div class="form-group">   
                            <img src="./images/1.JPG">
                            <p><a href="">Check Details</a></p>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
		
		<div id="footer"><?php include_once('footer.php');?></div>
	</body>
</html>