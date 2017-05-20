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
    	<title>Owner - Registration Site</title>
    	<!--<link rel="stylesheet" href="style.css">-->
    </head>
	<body>
		<div id="header"><?php include('header.php');?></div>
		
		<form method="POST" action="index.php">
        <div class="form-group">   
		  
		   <img src="./images/1.JPG">
		   <p><a href="">New Taxi & Driver Registration</a></p>
       
		</div>
    </form>
    <form method="POST" action="index.php">
        <div class="form-group">   
		   <img src="./images/1.JPG">
		   <p><a href="">Assign Taxi</a></p>
       
		</div>
    </form>

			<form method="POST" action="index.php">
        <div class="form-group">   
		   <img src="./images/1.JPG">
		   <p><a href="">View Ratings</a></p>
       
		</div>
    </form>
    </form>

			<form method="POST" action="index.php">
        <div class="form-group">   
		   <img src="./images/1.JPG">
       <p><a href="">Modify Driver Details</a></p>
		</div>
    </form>
    </form>

			<form method="POST" action="index.php">
        <div class="form-group">   
		   <img src="./images/1.JPG">
       <p><a href="">Modify Personal Details</a></p>
		</div>
    </form>
    </form>

			<form method="POST" action="index.php">
        <div class="form-group">   
		   <img src="./images/1.JPG">
       <p><a href="">Check Details</a></p>
		</div>
    </form>

		<div id="footer"><?php include_once('footer.php');?></div>
	</body>
</html>