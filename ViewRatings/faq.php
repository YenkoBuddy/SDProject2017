<?php
require_once('connection.php');

	$sql = 'SELECT * FROM faq ORDER BY DatePosted';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$faq = $stmt->fetchAll();
	$stmt->closeCursor();


?>

<!DOCTYPE html>
<html>
<head>
<title>FAQ</title>
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
	<h2>Frequently Asked Questions</h2>
	<form class="faq-form">
	<?php foreach ($faq as $faq):?>
		<div data-role="collapsible">
			<h4><?php echo $faq['Description']; ?></h4>
			<ul data-role="listview">
				<li><?php echo $faq['Answer']; ?>
				</li>
			</ul>
		</div>
	<?php endforeach;?>
	</form>

</body>
</html>
