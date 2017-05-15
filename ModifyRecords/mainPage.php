
<?php
	require_once 'connection.php';
	error_reporting( ~E_NOTICE );// avoid notice
	session_start();
	$firstName = $_POST['FirstName'];
	$ownerID = $_POST['OwnerID'];

	      
?>
<!DOCTYPE html>
<html>
<head>
	<title>Owner Main Page</title>
</head>
<body>
<form method="post">
	<table class="table table-bordered table-responsive">
		<tr>
        <td><label class="control-label">Welcome <?php echo $_SESSION['FirstName']; ?> </label></td>
    	</tr>
		<tr>
        <td><button type="submit" name="edit" class="btn btn-default">Edit</button></td>
    	</tr>
    	<tr>
    	<td>
        <p>
    	<span>
           <a class="btn btn-info" href="modIndex.php?edit_id=<?php echo $_SESSION['OwnerID']; ?>">Edit</a> 
        </span>
        </p>
        </td>
        </tr>
	</table>
</form>

</body>
</html>