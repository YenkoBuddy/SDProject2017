<?php
require_once 'connection.php';

	$sql = 'SELECT * FROM general';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$generalInfo = $stmt->fetchAll();
	$stmt->closeCursor();


foreach ($generalInfo as $generalInfo):
	$mission = $generalInfo['Mission'];
	$aboutUs = $generalInfo['AboutUs'];

endforeach;

?>
<!DOCTYPE html>
<html>
	<head>
		<title>About Us</title>
	</head>
	<body>
	<form align="center" >
		<h2>Our Mission</h2>
		<p><?php echo $mission ; ?></p><br>
		<h2>About Us</h2>
		<p><?php echo $aboutUs ; ?></p>
	</body>
	</form>
</html>
