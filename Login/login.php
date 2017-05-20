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

    if(isset($_POST['username'])){
    $sql_username="SELECT * FROM logins WHERE Username=:username";
    $stmt_username=$conn->prepare($sql_username);
    $stmt_username->bindParam(':username', $username);
    $stmt_username->execute(array(':username'=>$username));
    $uname = $stmt_username->fetch(PDO::FETCH_ASSOC);
    if(!$uname){
        $errMSG ="Incorrect username. Try Again.";
    }
    }
    
    if (isset($_POST['password'])){
    $sql_password="SELECT * FROM logins WHERE Password=:password";
    $stmt_password=$conn->prepare($sql_password);
    $stmt_password->bindParam(':password', $password);
    $stmt_password->execute(array(':password'=>$password));
    $pass = $stmt_password->fetch(PDO::FETCH_ASSOC);
    if(!$pass){
        $errMSG ="Incorrect password. Try Again.";
    }
    }

    $sql="SELECT * FROM logins WHERE Username=:username AND Password=:password";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute(array(':username'=>$username, ':password'=>$password));
    $userinfo = $stmt->fetch(PDO::FETCH_ASSOC);  
    if($userinfo) {
        extract($userinfo);
        session_start();
        $accesslevel=$userinfo['AccessLevel'];
        $_SESSION["LoginID"] =$userinfo['LoginID'];
        $_SESSION["AccessLevel"] =$accesslevel;
    }
        if ($accesslevel==1){
            header("Location:owner.php");
        }
        else if($accesslevel==2){
            header("Location:clerk.php");
        }
        else if($accesslevel==3){
            header("Location:admin.php");
        }


}

 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
    <div id="header"><?php include('header.php');?></div>
	<form method='post' >
	<h2>Login</h2>
		<table class="table table-bordered table-responsive">
    		<tr><td><input class="form-control" type="text" name="username" placeholder="Username" required autofocus/></td>
            <td><span class="requiredFeild">*</span></td></tr>
    		<tr><td><input class="form-control" type="password" name="password" placeholder="Password" required /></td>
            <td><span class="requiredFeild">*</span></td></tr>
    		<tr><td><button type="submit" name="login" class="btn btn-default">Login</button></td></tr>

    	</table>
	</form>
    <?php if(isset($errMSG)){ ?>
            <span class="login-error"><?php echo $errMSG; ?></span>
    <?php } ?>
</body>
</html>