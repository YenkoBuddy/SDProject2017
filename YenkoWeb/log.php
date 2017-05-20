<?php
define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '0246085565');
define('DB_DATABASE', 'Yenko-Buddy');

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$username = msqli_real_escape_string($db, $_POST['username']);
	$password = msqli_real_escape_string($db, $_POST['password']);

	$sql = "SELECT id FROM OWNER WHERE username = '$username' and password ='$password'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array(result, MYSQLI_ASSOC);
	$active = $row['active'];

	$count = mysqli_num_rows($result);

	if($count == 1)
	{	
		session_register("username");
		$_SESSION['login_user'] = $username;

		header("location: owner.php");

	}
	else
	{	
		$error = "Your Username or Password is invalid";
	}



}
?>
