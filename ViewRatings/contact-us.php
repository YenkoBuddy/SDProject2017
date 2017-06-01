<?php
require_once 'connection.php';

$sql = 'SELECT * FROM general'; 
$stmt = $conn->prepare($sql);
$stmt->execute();
$generalInfo = $stmt->fetchAll();
$stmt->closeCursor();


foreach ($generalInfo as $generalInfo):
    $email = $generalInfo['EmailAddress'];
    $contactNumber = $generalInfo['ContactNumber'];

endforeach;
if(isset($_POST['submit']))
{
    $to      = 'yenkobuddy@gmail.com';
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $from = $_POST['name'];
    $email =$_POST['email'];
    //$headers = "From: Yenko Buddy Contact Us" . "\r\n" .
       // "Reply-To:".$email. "\r\n" .
       // "X-Mailer: PHP/" . phpversion();

    mail($to, $subject, $message);

    echo 'Email Sent.';
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Contact Us</title>
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
<h2> Contact Us</h2>
<section>
<form method="post">
<table>
	 <tr><td><input type="text" name="name" placeholder="Full Name" size="25"  required></td></tr>
	 <tr><td><input type="email" name="email" placeholder="Email Address" size="25" required></td></tr>
	 <tr><td><input type="text" name="subject" placeholder="Subject" size="25" required></td></tr>
	 <tr><td><textarea rows="17" cols="60" name="message" placeholder="Message" required></textarea></td></tr>
	 <tr><td colspan="2" align="right"><input type="submit" name="submit" value="Submit"></td></tr>
</table>
</form>
</section>
<aside>
<table>
<tr><td rowspan="3" valign="top"><i class="fa fa-map-marker fa-fw"></i></td>
<td><label>University Way</label></td></tr>
<tr><td><label>Port Elizabeth</label></td></tr>
<tr><td><label>6001</label></td></tr>
<tr><td><i class="fa fa-phone fa-fw"></i></td>
<td><label><?php echo $contactNumber?></label></td></tr>
<tr><td><i class="fa fa-envelope fa-fw"></i></td>
<td><label><?php echo $email?></label></td></tr>
</aside>
</body>
</html>