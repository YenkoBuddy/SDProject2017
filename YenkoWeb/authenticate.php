<?php 
	require 'connection.php';

	session_start();

	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$db = mysqli_connect('localhost', 'root', '', '');

		if (!$db)
		{
			echo "Cannot connect to the database";
			exit;
		}
	
	echo $username ." : ".$password;

	$sql = "SELECT * FROM MEMBER WHERE username=:username AND Password=:password";

	$query = $conn->prepare($sql); //error 1 when login

	$query->execute(array(':username' => $username, ':password' => $password));

}
	if($query->rowCount() == 0)
	{
		header('Location: index.php?eer=1');
	}else{

		$row = $query->fetch(PDO::FETCH_ASSOC);

		session_regenerate_id();
		$_SESSION['sess_user_id'] = $row['id'];
		$_SESSION['sess_username'] = $row['username'];
        $_SESSION['sess_userrole'] = $row['role'];

        echo $_SESSION['sess_userrole'];
		session_write_close();

		if( $_SESSION['sess_userrole'] == "admin")
		{
			header('Location: systemAdmin.php');
		}
		elseif($_SESSION['sess_userrole'] == "owner")
		{
			header('Location: owner.php');
		}
		else
		{
			header('Location: clerk.php');
		}
		
		
	}


?>