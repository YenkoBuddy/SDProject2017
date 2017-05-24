<?php
require_once 'connection.php';
error_reporting(~E_NOTICE);
session_start();
//generate username and password
function randomUsername($length,$count, $characters) {
  
    $symbols = array();
    $the_username = array();
    $used_symbols = '';
    $uname = '';
 
    $symbols["lower_case"] = 'abcdefghjkmnopqrstuvwxyz';
    $symbols["upper_case"] = 'ABCDEFGHJKMNOPQRSTUVWXYZ';
    $symbols["numbers"] = '234567890';
 
    $characters = explode(",",$characters); // get characters types to be used for the passsword
    foreach ($characters as $key=>$value) {
        $used_symbols .= $symbols[$value]; // build a string with all characters
    }
    $symbols_length = strlen($used_symbols) - 1; //strlen starts from 0 so to get number of characters deduct 1
     
    for ($u = 0; $u < $count; $u++) {
        $uname = '';
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $symbols_length); // get a random character from the string with all characters
            $uname .= $used_symbols[$n]; // add the character to the password string
        }
        $the_username[] = $uname;
    }
     
    return $the_username; // return the generated password
}
function randomPassword($length,$count, $characters) {

// $length - the length of the generated password
// $count - number of password to be generated
// $characters - types of characters to be used in the password
 
// define variables used within the function    
    $symbols = array();
    $the_password = array();
    $used_symbols = '';
    $pass = '';
 
// an array of different character types    
    $symbols["lower_case"] = 'abcdefghjklmnopqrstuvwxyz';
    $symbols["upper_case"] = 'ABCDEFGHJKLMNOPQRSTUVWXYZ';
    $symbols["numbers"] = '234567890';
    $symbols["special_symbols"] = '!?~@#-_+<>[]{}';
 
    $characters = explode(",",$characters); // get characters types to be used for the passsword
    foreach ($characters as $key=>$value) {
        $used_symbols .= $symbols[$value]; // build a string with all characters
    }
    $symbols_length = strlen($used_symbols) - 1; //strlen starts from 0 so to get number of characters deduct 1
     
    for ($p = 0; $p < $count; $p++) {
        $pass = '';
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $symbols_length); // get a random character from the string with all characters
            $pass .= $used_symbols[$n]; // add the character to the password string
        }
        $the_password[] = $pass;
    }
     
    return $the_password; // return the generated password
}

$gen_username = randomUsername(8,1,"lower_case,upper_case,numbers");
$gen_password = randomPassword(7,1,"lower_case,upper_case,numbers,special_symbols");

foreach ($gen_username as $gen_username) {
    $username = $gen_username;;
}
foreach ($gen_password as $gen_password) {
    $password = $gen_password;;
}
$accesslevel ="2";
$associationID = $_POST['association'];

    if(isset($_POST['submit']) AND isset($associationID))
    {

        if(isset($username) AND isset($password))
        {
            $sql2 = "INSERT INTO logins(Username, Password, AccessLevel) VALUES(:username, :password, :accesslevel)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bindParam(':username', $username);
            $stmt2->bindParam(':password', $password);
            $stmt2->bindParam(':accesslevel', $accesslevel);
            $stmt2->execute();

            $sql3 = "SELECT * FROM logins WHERE Username = :username AND Password=:password";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->bindParam(':username', $username);
            $stmt3->bindParam(':password', $password);
            $stmt3->bindParam(':accesslevel', $accesslevel);
            $stmt3->execute(array(':username'=>$username, ':password'=>$password));
            $loginInfo = $stmt3->fetch(PDO::FETCH_ASSOC);
            if(!$loginInfo)
            {
                $msg = "Couldn't get login info.";
            }
        else
        {
            extract($loginInfo);
            session_start();
            $_SESSION["LoginID"] = $loginInfo['LoginID'];
            $loginID = $_SESSION["LoginID"];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $emailAddress = $_POST['emailAddress'];
            $contactNumber = $_POST['contactNumber'];
            $sql = "INSERT INTO association_clerk(FirstName, LastName, EmailAddress, ContactNumber, AssociationID, LoginID) VALUES(:firstName, :lastName, :emailAddress,:contactNumber, :associationID, :loginID)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':emailAddress', $emailAddress);
            $stmt->bindParam(':contactNumber', $contactNumber);
            $stmt->bindParam(':associationID', $associationID);
            $stmt->bindParam(':loginID', $loginID);
            $stmt->execute();
            if($stmt)
            {

                $msg = "new clerk succesfully inserted ...";
                header("refresh:3; clerk-registration.php");
                //header("refresh:5;association-registration-step1.php"); // redirects image view page after 5 seconds.
            }
            else
            {
                $msg = "error while inserting clerk....<br>";
                print_r($stmt->errorCode());
                print_r($stmt->errorInfo());
            }
        }


    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Association Clerk Registration</title>
</head>
<body>
<form method='post'>
    <table>
    <tr><td><select name="association">
            <option value="">--Select Association--</option>
             <?php
                $sql =" SELECT * FROM association ORDER BY AssociationName";
                $stmt =$conn->prepare($sql);
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <option value="<?php echo $row['AssociationID']; ?>"><?php echo $row['AssociationName']; ?></option>
            <?php
                }
            ?>
            </select>
    </td></tr>    
    <tr><td><input class="form-control" type="text" name="firstName" placeholder="First Name"></td><td><input type="text" name="lastName" placeholder="Last Name" /></td></tr>
    <tr><td colspan="2"><input class="form-control" type="text" name="emailAddress" placeholder="Email Address"  size="46" /></td></tr>
    <tr><td colspan="2" ><input class="form-control" type="text" name="contactNumber" placeholder="Contact Number"  size="46" /></td></tr>
    <tr><td><button type="submit" name="submit" class="btn">Submit</button></td></tr>
    </table>
</form>
        <?php if(isset($msg)){ ?>
            <span ><?php echo $msg; ?></span>
    <?php } ?>
</body>
</html>
