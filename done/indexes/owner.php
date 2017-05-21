<!DOCTYPE html>
<html>
    <head>
    	<title>Taxi Owner Page</title>
    	<!--<link rel="stylesheet" href="style.css">-->
    </head>
	<body>
		<div id="header"><?php include('header.php');?></div>
        <label>Taxi Owner</label>
		<table>
            <tr>
                <td>
                    <form method="POST" action="taxiAndDriverRegistration.php">
                        <div class="form-group">   
                            <img src="./images/reg.png">
                            <p><a href="">New Taxi & Driver Registration</a></p>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="POST" action="assign.php">
                        <div class="form-group">   
                            <img src="./images/assign.png">
                            <p><a href="">Assign Taxi</a></p>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="POST" action="viewRatings.php">
                        <div class="form-group">   
                            <img src="./images/ratings.png">
                            <p><a href="">View Ratings</a></p>
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form method="POST" action="modifyDriver.php">
                        <div class="form-group">   
                            <img src="./images/modify.png">
                            <p><a href="">Modify Driver Details</a></p>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="POST" action="modifyOwner.php">
                        <div class="form-group">   
                            <img src="./images/modify.png">
                            <p><a href="">Modify Personal Details</a></p>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="POST" action="checkDetails.php">
                        <div class="form-group">   
                            <img src="./images/details.png">
                            <p><a href="">Check Details</a></p>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
		
		<div id="footer"><?php include_once('footer.php');?></div>
	</body>
</html>