<?php
	session_start();
    $_SESSION['Empty'] = 'Empty';
    session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
    	<title>Yenko Web design | Welcome</title>
    	<link rel="stylesheet" href="style.css">
    </head>
    <script type="text/javascript">

	$(document).ready(function()
	{
		$(".province").change(function()
		{
			var id=$(this).val();
			var dataString ='id='+ id;

			$.ajax
			({
				type: "POST",
				url: "getAddress.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".city").html(html);
				}
			});
		});

		$(".city").change(function()
		{
			var cID=$(this).val();
			var dataString ='cID='+ cID;
			$.ajax
			({
				type: "POST",
				url: "getAddress.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".suburb").html(html);
				}
			});
		});
	});
	
	
</script>
	<body>
		<div id="header"><?php include('header.php');?></div>
		<section id="showcase">
			<div>
				<h2>Yenko Buddy Aim</h2>
				<h3>
					Yenko Buddy aims to provide a mobile application to help, <br/>
					make sure passengers are safe or feeling safe <br/>
					when they are using taxis to commute from point A to point B.<br/> 
					Yenko Buddy your security friend below is a link <br/>
					for passengers to download the mobile application:  <br/>
					<span><a href="www.yenkomate.com" class="btn">Try It Now!</a>
					<b>Download for free</b></span>    
				</h3>
			</div>
		</section>
		
		<section id="boxes">	
			<div class="container">
				<form method="POST" action="adminlogin.php">
					<div class="box">
					<img src="./images/1.JPG">
					<h2>Association Administrator</h2>
					<p>Associations registration, modification and viewing of details.</p>
					<button type="button" onclick="window.location.href=('adminlogin.php')">Association</button>
					</div>
				</form>
				<form method="POST" action="login">
					<div class="box">
					<img src="./images/1.JPG">
					<h2>Owner</h2>
					<p>Registered taxis under which owner, Keep tabs on taxi and driver information And what’s needed from owner.</p>
					<button type="button" onclick="window.location.href=('login.php')">Owner</button>
					</div>
				</form>
				<form method="POST" action="adminlogin">
					<div class="box">
					<img src="./images/1.JPG">
					<h2>System Administrator</h2>
					<p>Approve applications (registrations) View registered owners, taxis and drivers.</p>
					</div>
					<button type="button" onclick="window.location.href=('adminlogin.php')">System Admin</button>
				</form>
			</div>
		</section>
	
		<div id="footer"><?php include_once('footer.php');?></div>
	</body>
</html>