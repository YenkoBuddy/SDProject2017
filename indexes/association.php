<!DOCTYPE html>
<html>
    <head>
    	<title>Association Clerk Page</title>
    	<link href="css/style.css" rel="stylesheet">
    </head>
	<body>
		<div id="header"><?php include('header.php');?></div>
    <table>
      <tr>
        <td>
          <form method="POST" action="processApplication.php">
            <div class="form-group">
              <img src="./images/1.JPG">
              <p><a href="">Process Applications</a></p>
            </div>
          </form>
        </td>
        
        <td>
          <form method="POST" action="viewAllRatings.php">
            <div class="form-group">
              <img src="./images/1.JPG">
              <p><a href="">View Ratings</a></p>
            </div>
          </form>
        </td>
      </tr>
      
      <tr>
        <td>
          <form method="POST" action="ownerRecords.php">
            <div class="form-group">
              <img src="./images/1.JPG">
              <p><a href="">Taxi Owner Records</a></p>
            </div>
          </form>
        </td>
        
        <td>
          <form method="POST" action="driverRecords.php">
            <div class="form-group">
              <img src="./images/1.JPG">
              <p><a href="">Driver Records</a></p>
            </div>
          </form>
        </td>
        
        <td>
          <form method="POST" action="clerkProfile.php">
            <div class="form-group">
              <img src="./images/1.JPG">
              <p><a href="">My Profile</a></p>
            </div>
          </form>
        </td>
      </tr>  
    </table>
			

		<div id="footer"><?php include_once('footer.php');?></div>
	</body>
</html>