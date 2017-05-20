<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Registration Site</title>
    	<link href="css/style.css" rel="stylesheet">
    </head>
	<body>
		<div id="header"><?php include('header.php');?></div>

			<h1>System Administrator Page</h1>

	
    <form method="POST" action="index.php"><!--I might not need this form-->
		<div class="form-group">
			<img src="./images/1.JPG">
       <p><a href="">Register Association</a></p>
		</div>
	<form/>
	<form method="POST" action="index.php">
	    <div class="form-group"><img src="./images/1.JPG">
       <p><a href="">Modify Association</a></p>		</div>
    <form/>		  
    <form method="POST" action="index.php">
        <div class="form-group">	<img src="./images/1.JPG">
       <p><a href="">View Existing Association(s)</a></p>
        </div>	
    <form/>
	<form method="POST" action="index">
        <div class="form-group">   <img src="./images/1.JPG">
       <p><a href="">Reister Association Administrator</a></p>
	    </div>
    </form>
	<form method="POST" action=".php">
        <div class="form-group">   <img src="./images/1.JPG">
       <p><a href="">Modify Association Administrator</a></p>
		</div>
    </form>
    <form method="POST" action=""><!--The action will tell where the to redirect when the button or the link is click-->
        <div class="form-group">   <img src="./images/1.JPG">
       <p><a href="">View Existing Adminstrator(s)</a></p>
		</div>
    </form>
	
    <form method="POST" action=""><!--The action will tell where the to redirect when the button or the link is click-->
        <div class="form-group">   <img src="./images/1.JPG">
       <p><a href="">View Drivers Registered under an Owner</a></p>
		</div>
    </form>

		<div id="footer"><?php include_once('footer.php');?></div>
	</body>
</html>