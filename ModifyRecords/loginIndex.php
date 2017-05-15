<?php
	error_reporting( ~E_NOTICE ); // avoid notice
    require_once 'connection.php';
    session_start();
    $_SESSION['Empty'] = 'Empty';
    session_destroy();
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql= "SELECT * FROM OWNER WHERE EmailAddress =:username AND Password = :password";
    $stmt_select = $conn->prepare($sql);
    $stmt_select->bindParam(':username', $username);
    $stmt_select->bindParam(':password', $password);
    $stmt_select->execute(array(':username'=>$username, ':password'=>$password));
    $userinfo = $stmt_select->fetch(PDO::FETCH_ASSOC);  
    if(!$userinfo) {
        $errMSG = "Incorrect Username OR Password, TRY AGAIN !";
    }
    else {
        // load details into session
        extract($userinfo);
        session_start();
        $_SESSION["OwnerID"] = $userinfo['OwnerID'];
        $_SESSION["FirstName"] = $userinfo['FirstName'];
        $_SESSION["LastName"] = $userinfo['LastName'];
        $_SESSION["IDNo"] = $userinfo['IDNo'];
        $_SESSION["EmailAddress"] = $userinfo['EmailAddress'];
        $_SESSION["ContactNumber"] = $userinfo['ContactNumber'];
        $_SESSION["Address1"] = $userinfo['Address1'];
        $_SESSION["SuburbID"] = $userinfo['SuburbID'];
        $_SESSION["PostalCode"] = $userinfo['PostalCode'];
        $_SESSION["NoOfTaxis"] = $userinfo['NoOfTaxis'];
        $_SESSION["AssociationID"] = $userinfo['AssociationID'];
        $_SESSION["Password"] = $userinfo['Password'];

        // REDIRECT TO PAGE
        header("Location: mainPage.php"); 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
            <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div id="header"><?php include('header.php');?></div>
<?php if(isset($errMSG)){ ?>
        <div class="alert alert-danger">
        	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
    <?php } ?>
	<form method='post' >
	<h2>Login</h2>
		<table class="table table-bordered table-responsive">
    		<tr><td><input class="form-control" type="text" name="username" placeholder="Username / Email" required autofocus/></td></tr>
    		<tr><td><input class="form-control" type="password" name="password" placeholder="Password" /></td></tr>
    		<tr><td><button type="submit" name="login" class="btn btn-default" required>Login</button></td></tr>

    	</table>
	</form>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>