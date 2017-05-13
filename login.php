<?PHP
//require_once("config.php");
include("config.php");
session_start();

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
        $fgmembersite->RedirectToURL("login-home.php");
   }
}
?>

<!DOCTYPE html>
<html>
    <head>
    	<title>Login Page</title>
    	<link rel="stylesheet" type="text/css" href="style.css"/>
    	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    </head>
	<body>
		<div id="header"><?php include('header.php');?></div>
		<div id='site'>
		<!--<form id='login' action='<?php //echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
			-->
			<form id='login' action='' method='post' accept-charset='UTF-8'>
				
					<h3>Login</h3>

<!--						<input type='hidden' name='submitted' id='submitted' value='1'/>-->

							
<!--<div><span class='error'><?php //echo $fgmembersite->GetErrorMessage(); ?></span></div>-->
							<div><span class='error'></span></div>
							<div class='container'>
<!--<input type='text' name='username' id='username' placeholder="user name"> value='<?php //echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" />*<br/>-->
    						<input type='text' name='username' id='username' placeholder="user name" maxlength="50" />*<br/>
    						
    							<span id='login_username_errorloc' class='error'></span>
    						
    							<input type='password' name='password' id='password' placeholder="*********" maxlength="50" />*<br/>
    						
    							<span id='login_password_errorloc' class='error'></span>
							</div>

							<div class='container'>
    							<input type='submit' name='Submit/Login' value='Submit' />
							</div>
							<div class='short_explanation'><a href='reset-pwd.php'>Forgot Password?</a></div>
							<div class='short_explanation'><a href='signup.php'>Sign Up</a></div>

			
			</form>
			<script type='text/javascript'>
	// <![CDATA[

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username","req","Please provide your username");
    
    frmvalidator.addValidation("password","req","Please provide the password");

// ]]>
</script>
		</div>
		<div id="footer"><?php include_once('footer.php');?></div>
	</body>
</html>