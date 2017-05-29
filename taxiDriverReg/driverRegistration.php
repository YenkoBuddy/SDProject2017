<?php

        require_once 'include/connection.php';
    
        $regNo = filter_input(INPUT_POST, 'regNo');
        $type = filter_input(INPUT_POST,'type');
        $year = filter_input(INPUT_POST,'year');
        $model = filter_input(INPUT_POST,'model');
        $description = filter_input(INPUT_POST,'description');
        $ownerID = "9";
        $route="1";
        $licenceDisc = filter_input(INPUT_POST,'licenceDisc');
        $inspectionReport = filter_input(INPUT_POST,'inspectionReport');
        $status = filter_input(INPUT_POST, 'status')

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register Taxi</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
<body>
    <div id="header"><?php include('header.php');?></div>

<form method="post" action="taxiDriverReg.php">
    <input type="hidden" name="regNo" value="<?php echo $regNo ?>">
    <input type="hidden" name="type" value="<?php echo $type ?>">
    <input type="hidden" name="year" value="<?php echo $year ?>">
    <input type="hidden" name="model" value="<?php echo $model ?>">
    <input type="hidden" name="description" value="<?php echo $description ?>">
    <input type="hidden" name="route" value="<?php echo $route ?>">
    <input type="hidden" name="ownerID" value="<?php echo $ownerID ?>">
    <input type="hidden" name="licenceDisc" value="<?php echo $licenceDisc ?>">
    <input type="hidden" name="inspectionReport" value="<?php echo $inspectionReport ?>">
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
                <input type="text" size="47" name="contactNumber" placeholder="Contact Number" required="Yes"
        style="text-align: center"> *
            </td>
        </tr>
        <tr>
            <td colspan="3"> <input type="text" size="47" name="email" placeholder="Email Address" required="Yes"
        style="text-align: center"> *</td>
    </tr>
    </tr>
        <tr>
            <td colspan="3"> <input type="text" size="47" name="address1" placeholder="Street Address" required="Yes"
        style="text-align: center"> *</td>
    </tr>
    
    <tr>
        <td> 
            <select name="province" style="WIDTH: 150px" onfocus="this.style.width='100px'" onmouseout="this.style.width='150px'">
                <option>--Select Province--</option> 
                <?php
                    $sql="SELECT * FROM PROVINCE ORDER BY ProvinceName";
                    $statement =$conn->prepare($sql);
                    $statement->execute();
                    while($row=$statement->fetch(PDO::FETCH_ASSOC)){
                ?>
                <option value="<?php echo $row['ProvinceID']; ?>"><?php echo $row['ProvinceName']; ?></option>
        <?php
            }
        ?>
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
    <input type="hidden" name="status" value="<?php echo $status ?>">
    <tr>
        <td><input type="submit" name="btnFinish" value="Finish"></td>
    </tr>
</table>

</form>
<div id="footer"><?php include_once('footer.php');?></div>
</body>
<script type="text/javascript">

    $(document).ready(function()
    {
        $(".province").change(function()
        {
            var id=$(this).val();
            var dataString ='id='+ id;

            $.ajax
            ({
                type: "POST",
                url: "getAddress.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $(".city").html(html);
                }
            });
        });

        $(".city").change(function()
        {
            var cID=$(this).val();
            var dataString ='cID='+ cID;
            $.ajax
            ({
                type: "POST",
                url: "getAddress.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $(".suburb").html(html);
                }
            });
        });
    });
    
    
</script>
</html>