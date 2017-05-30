<?php
$ownerID=8;
require_once('connection.php');

$sql1 = "SELECT CONCAT(FirstName,' ',LastName) AS OwnersName FROM owner WHERE OwnerID=:ownerID";
$stmt1 = $conn->prepare($sql1);
$stmt1->bindParam(':ownerID', $ownerID);
$stmt1->execute();
$ownerInfo= $stmt1->fetchAll();
$stmt1->closeCursor();
foreach ($ownerInfo as $row) {
    $name = $row['OwnersName'];

}

$sql="SELECT DISTINCT driver.DriverID ,CONCAT(driver.FirstName,' ',driver.LastName) AS DriversName,COUNT(journey.DriverID) AS AmountOfRatings , ROUND(AVG(Rating),1) AS AverageRating FROM journey, driver, taxi, taxi_driver WHERE taxi.OwnerID =:ownerID AND taxi.RegNo = taxi_driver.RegNo AND driver.DriverID = taxi_driver.DriverID AND driver.DriverID = journey.DriverID GROUP BY DriversName";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':ownerID', $ownerID);
$stmt->execute();
$results= $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($results);

/*
$graph_data = array();

foreach ($ratingsInfo as $result) {
	$graph_data[] = array($result['DriversName'], $result['AmountOfRatings'], $result['AverageRating']);
}
$graph_data =json_encode($graph_data);
*/
?>