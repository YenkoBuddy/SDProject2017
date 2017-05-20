
<!DOCTYPE html>
<html>
    <head>
    	<title>Login Page</title>
    	<!-- Bootstrap -->
 	  	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/style.css" rel="stylesheet">
    	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    </head>
	<body>
		<div id="header"><?php include('header.php');?></div>

		<h3><span>Login</span></h3>
			<div class="block-margin-top">
				<?php

					$errors = array
					(
						1=>"Invalid username or password, Try again",
						2=>"Please login to access this area"
					);

					$error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

					if ($error_id == 1)
					{	
						echo '<p class="text-error">'.$errors[$error_id].'</p>';
					}
					elseif ($error_id == 2)
					{
						echo '<p class="text-error">'.$errors[$error_id].'</p>';
					}
				?>
			
			<form action="authenticate.php" method="POST" class="form-login" role="form">
				<table>
					<tr>
						<input type="text" name="username" class="form-control" placeholder="Username" required autofocus/>*<br/>
 					</tr>
 					<tr>   						
    					<input type="password" name="password" class="form-control" id='password' placeholder="*********" required/>*<br/>
   					</tr>
					<tr>
						<button type="submit" name="submit" class="login">Login</button>
						
					</tr>
					<div class="reset">
						<a href='reset-pwd.php'>Forgot Password?</a>
					</div>
				</table>
			</form>
			</div>

	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
    	<script src="js/bootstrap.min.js"></script>
		
		<div id="footer"><?php include_once('footer.php');?></div>
	</body>
</html>