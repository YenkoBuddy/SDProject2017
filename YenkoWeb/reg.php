<?PHP
require_once("./include/config.php");

if(isset($_POST['submitted']))
{
   if($web->RegisterUser())
   {
        $web->RedirectToURL("owner.php");
   }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Creating Account</title>

    <script type='text/javascript' src='scripts/validator.js'></script>
    <link rel="STYLESHEET" type="text/css" href="style/passwordwidget.css" />
    <script src="scripts/passwordwidget.js" type="text/javascript"></script>      
</head>
<body>

<!-- Form Code Start -->
<div id='web'>
<form id='register' action='<?php echo $web->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>


<div><span class='error'><?php echo $web->GetErrorMessage(); ?></span></div>

<table class="table">
<tr><div class='container'>

    <input type='text' name='fname' placeholder='FirstName' value='<?php echo $web->SafeDisplay('fname') ?>' maxlength="50" /><br/>
    <span id='register_name_errorloc' class='error'></span>
</div></tr>

<tr><div class='container'>
    <input type='text' name='lname' placeholder='LastName' value='<?php echo $web->SafeDisplay('lname') ?>' maxlength="50" /><br/>
    <span id='register_name_errorloc' class='error'></span>
</div></tr>
<tr><div class='container'>
    
        <input type='text' name='idNo' placeholder='ID Number' value='<?php echo $web->SafeDisplay('idNo') ?>' maxlength="50" /><br/>
    <span id='register_name_errorloc' class='error'></span>
</div></tr>
<tr>
<div class='container'>
    
    <input type='text' name='email' placeholder='Email Address' value='<?php echo $web->SafeDisplay('email') ?>' maxlength="50" /><br/>
    <span id='register_email_errorloc' class='error'></span>
</div></tr>
<tr>
<div class='container'>
    
    <input type='text' name='contact' placeholder='Contact Number' value='<?php echo $web->SafeDisplay('contact') ?>' maxlength="50" /><br/>
    <span id='register_name_errorloc' class='error'></span>
</div></tr>
<tr>
<div class='container'>
    
    <input type='text' name='address1' placeholder='Address1' value='<?php echo $web->SafeDisplay('address1') ?>' maxlength="50" /><br/>
    <span id='register_name_errorloc' class='error'></span>
</div></tr>
<tr>
<div class='container'>
    
    <input type='text' name='suburb' placeholder='Suburb' value='<?php echo $web->SafeDisplay('suburb') ?>' maxlength="50" /><br/>
    <span id='register_name_errorloc' class='error'></span>
</div></tr>
<tr>
<div class='container'>
    
    <input type='text' name='postalcode' placeholder='PostalCode' value='<?php echo $web->SafeDisplay('postalcode') ?>' maxlength="50" /><br/>
    <span id='register_name_errorloc' class='error'></span>
</div></tr>
<tr>
<div class='container'>
    
    <input type='text' name='username' placeholder='Username' value='<?php echo $web->SafeDisplay('username') ?>' maxlength="50" /><br/>
    <span id='register_username_errorloc' class='error'></span>
</div></tr>
<tr>
<div class='container' style='height:80px;'>
    
    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
    <noscript>
    <input type='password' name='password' placeholder='Password' maxlength="50" />
    </noscript>    
    <div id='register_password_errorloc' class='error' style='clear:both'></div>
</div></tr>


<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>
</table>
</form>

<script type='text/javascript'>

    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();
    
    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("username","req","Please provide a username");
    
    frmvalidator.addValidation("password","req","Please provide a password");

</script>
</body>
</html>