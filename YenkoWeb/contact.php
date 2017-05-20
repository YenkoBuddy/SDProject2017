<!DOCTYPE html>
<html>
    <head>
	    <title>Contact - Taxi Association WebPage</title>
		<!-- IE8 support of HTML5 elements and media queries -->
        <meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Website for Taxi Association Administrators to used to register members(users) and assigned, change and delete taxi driver. And also to check records of the users">
		<meta name="viewpoint" content="width=device-width, initial-scale=1">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
	<div id="header"><?php include('header.php');?></div>
	
		<div id="content">
			<div class="contact">
				<h1>Contact Us</h1>
				<!--<p>In case we will say something first</p>-->
				<form action="index.php" method="POST", class="message">
				<table>
					<tr>
						<td><input type="text" size="28" placeholder="First Name" value="Name" onFocus="this.select();" onMouseOut="javascript:return false;"/>
					</tr>
					<tr>
						<td><input type="text" size="28" placeholder="Email Address" value="Email" onFocus="this.select();" onMouseOut="javascript:return false;"/>
					</tr>
						<!--<input type="text" value="Subject" onFocus="this.select();" onMouseOut="javascript:return false;"/>-->
					<tr>
						<td><textarea cols="30" rows="8">
					</textarea></td>
					</tr>
					<tr>
						<td><input type="submit" value="Send"/></td>
					</tr>
				
				</form>
			</div>
			<div class="contact section">
				<p>For Inquiries Please Call: <span>073-488-5979</span></p>
				<p>Or you can visit us at: <span>Yenko Buddy<br>5 Aldywn Towers, Central Port Elizabeth</span></p>
			</div>
		</div>
	<div id="footer"><?php include_once('footer.php');?></div>	
</body>