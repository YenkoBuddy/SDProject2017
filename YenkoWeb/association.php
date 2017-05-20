<!DOCTYPE html>
<html>
    <head>
    	<title>Registration Site</title>
    	<link href="css/style.css" rel="stylesheet">
    </head>
	<body>
		<div id="header"><?php include('header.php');?></div>

			<form method="POST" action="index.php"><!--I might not need this form-->
		<div class="form-group">
			<img src="./images/1.JPG">
       <p><a href="">Process Applications</a></p>
		</div>
	<form/>
	<form method="POST" action="index.php">
	    <div class="form-group"><img src="./images/1.JPG">
       <p><a href="">Record Enquiries</a></p>		</div>
    <form/>		  
    <form method="POST" action="index.php">
        <div class="form-group">	<img src="./images/1.JPG">
       <p><a href="">View Ratings</a></p>
        </div>	
    <form/>
	<form method="POST" action="index">
        <div class="form-group">   <img src="./images/1.JPG">
       <p><a href="">My Profile</a></p>
	    </div>
    </form>
	

		<div id="footer"><?php include_once('footer.php');?></div>
	</body>
</html>