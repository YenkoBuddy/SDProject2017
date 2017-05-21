<?php
	error_reporting(~E_NOTICE);
    require_once 'include/config.php';
    require_once 'include/connection.php';

    session_start();
 
    $regNumber = $_POST['RegNo'];
    $type = $_POST['Type'];


     if(isset($_POST['btnFinish']))
    {
        $firstname = $_POST['firstname'];
        $lastName = $_POST['lastName'];
        $idNo = $_POST['idNo'];
        $contactNumber = $_POST['contactNumber'];
        $email = $_POST['email'];
        $address1 = $_POST['address1'];
        $suburb = $_POST['suburb'];
        $res = $_POST['res'];
        $licence = $_POST['licence'];
        $prdp = $_POST['prdp'];
        $headshot = $_POST['headshot'];

        $stmt = $conn->prepare('INSERT INTO driver(FirstName, lastName, IDNo, ContactNumber, EmailAddress, Address1, SuburbID, ProofOfResidence, DriversLicence,PrDP, Photo) 
            VALUES(:firstname, :lastName, :idNo, :contactNumber, :email, :address1, :suburb, :res, :licence, :prdp, :headshot)');

            $stmt->bindParam(':firstname',$firstname);
            $stmt->bindParam(':lastName',$lastName);
            $stmt->bindParam(':idNo',$idNo);
            $stmt->bindParam(':contactNumber',$contactNumber);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':address1',$address1);
            $stmt->bindParam(':suburb',$suburb);
            $stmt->bindParam(':res',$res);
            $stmt->bindParam(':licence',$licence);
            $stmt->bindParam(':prdp',$prdp);
            $stmt->bindParam(':headshot',$headshot);

             if($stmt->execute())
            {
                $successMSG = "new record succesfully inserted ...";
                header("refresh:5;"); // redirects image view page after 5 seconds.
            }
            else
            {
                $errMSG = "error while inserting....";
            }
    }

   

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register Taxi</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
    <div id="header"><?php include('header.php');?></div>
<h1><b>Taxi Details</b></h1>
<label><?php echo $_SESSION['RegNo']; ?> <?php echo $_SESSION['Type']; ?>     
                </label>

<form method="post">
    <table>
        <tr>
            <td>
                <input type="text" name="firstname" placeholder="First Name" required="Yes" style="text-align: center"> 
            </td>
        <!--&nbsp; &nbsp;--> 
            <td> 
                <input type="text" name="lastName" placeholder="last Name" required="Yes" style="text-align: center"> * 
            </td><td></td>
        </tr>
        <tr>
            <td colspan="3"> 
                <input type="text" size="47" name="idNo" placeholder="ID Number" required="Yes"
        style="text-align: center"> *
            </td>
        </tr>
        <tr>
            <td colspan="3"> 
                <input type="text" size="47" name="contact" placeholder="Contact Number" required="Yes"
        style="text-align: center"> *
            </td>
        </tr>
        <tr>
            <td colspan="3"> <input type="text" size="47" name="email" placeholder="Email Address" required="Yes"
        style="text-align: center"> *</td>
    </tr>
    
    <tr>
        <td> 
            <select name="province" style="WIDTH: 150px" onfocus="this.style.width='100px'" onmouseout="this.style.width='150px'">
                <option>--Select Province--</option> 
            </select>
        </td> 
        <td> 
            <select name="city" style="WIDTH: 150px" onfocus="this.style.width='100px'" onmouseout="this.style.width='150px'">
                <option>--Select City--</option>
            </select>
        </td>       
        <td> 
            <select name="suburb" style="WIDTH: 150px" onfocus="this.style.width='100px'" onmouseout="this.style.width='150px'">
                <option>--Select Suburb--</option>
            </select>* 
        </td>       
    
    </tr>
    <tr>
        <td colspan="3"> <input type="text" size="47" name="address" placeholder="Email Address" required="Yes"
        style="text-align: center"> *</td>
    </tr>
    <tr>
        <td>Proof Of Residence: </td>
        <td><input type="file" name="roofOfResidence" value="Choose File"> * Type:PDF</td>
    </tr>
    <tr>
        <td>Drivers Licence: </td>
        <td><input type="file" name="licence" value="Choose File"> * Type:PDF</td>
    </tr>
    <tr>
        <td>PrDP: </td>
        <td><input type="file" name="prdp" value="Choose File" style="text-align: right;"> * Type:PDF</td>
    </tr>
    <tr>
        <td>Headshot: </td>
        <td><input type="file" name="headshot" value="Choose File" style="text-align: right;"> *Type:JPG, PNG, JPEG, IMG </td>
    </tr>
    <tr>
        <td><input type="submit" name="btnFinish" value="Finish"></td>
    </tr>
</table>

</form>
<?php if(isset($successMSG)){ ?>
            <span><?php echo $successMSG; ?></span>
<?php } ?>
<?php if(isset($errMSG)){ ?>
            <span><?php echo $errMSG; ?></span>
<?php } ?>
<div id="footer"><?php include_once('footer.php');?></div>
</body>
</html>