<?php
require_once 'connection.php';

if(isset($_POST['submit']))
{
    $aboutUS = $_POST['aboutUS'];
    $answer = $_POST['answer'];

        	$sql = "UPDATE faq SET Answer =:answer WHERE FaqID=1";
    		$stmt = $conn->prepare($sql);
    		$stmt->bindParam(':answer', $answer);

    		$stmt->execute();
    		if($stmt)
    		{

        		$msg = "new clerk succesfully inserted ...";
        		//header("refresh:3; association-registration-step1.php");
        		//header("refresh:5;association-registration-step1.php"); // redirects image view page after 5 seconds.
        	}
        	else
       	 	{
        		$msg = "error while inserting clerk....<br>";
        		print_r($stmt->errorCode());
        		print_r($stmt->errorInfo());
       	 	}
}
?>
<!DOCTYPE html>
<html>
<body>
<form method='post'>
    <textarea rows="17" cols="60" name="aboutUS"></textarea><br>
        <textarea rows="17" cols="60" name="answer">Answer</textarea><br>
	<button type="submit" name="submit">Submit</button></form>
</body>
</html>