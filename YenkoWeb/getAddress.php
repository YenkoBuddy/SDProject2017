<?php
include('connection.php');
if($_POST['id'])
{
 $id=$_POST['id'];
  
 $stmt = $conn->prepare("SELECT * FROM CITY WHERE ProvinceID=:id");
 $stmt->execute(array(':id' => $id));
 ?><option selected="selected">Select City:</option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
        <option value="<?php echo $row['CityID']; ?>"><?php echo $row['CityName']; ?></option>
        <?php
 }
}

if($_POST['cID'])
{
 $cID=$_POST['cID'];
 
 $stmt = $conn->prepare("SELECT * FROM SUBURB WHERE CityID=:cID");
 $stmt->execute(array(':cID' => $cID));
 ?><option selected="selected">Select Suburb :</option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {`
  ?>
  <option value="<?php echo $row['SuburbID']; ?>"><?php echo $row['SuburbName']; ?></option>
  <?php
 }
}


?>