<?php
$associationID=1;
require_once('connection.php');

$sql1="SELECT owner.AssociationID, COUNT(Rating) AS AssociationRatings, ROUND(AVG(Rating),1) AS AssociationAverage FROM journey, taxi, owner WHERE owner.AssociationID =:associationID AND taxi.OwnerID = owner.OwnerID AND taxi.RegNo = journey.RegNo GROUP BY owner.AssociationID";

$stmt1 = $conn->prepare($sql1);
$stmt1->bindParam(':associationID', $associationID);
$stmt1->execute();
$assocRatingsInfo= $stmt1->fetchAll();
$stmt1->closeCursor();

foreach ($assocRatingsInfo as $assocRatingsInfo):
	$associationAverage = $assocRatingsInfo['AssociationAverage'];
	$associationRatings = $assocRatingsInfo['AssociationRatings'];
endforeach;

$sql="SELECT DISTINCT owner.AssociationID, driver.DriverID ,CONCAT(driver.FirstName,' ',driver.LastName) AS DriversName,COUNT(journey.DriverID) AS AmountOfRatings , ROUND(AVG(Rating),1) AS AverageRating FROM journey, driver, taxi, taxi_driver, association, owner WHERE owner.AssociationID =:associationID AND taxi.OwnerID =owner.OwnerID AND taxi.RegNo = taxi_driver.RegNo AND driver.DriverID = taxi_driver.DriverID AND driver.DriverID = journey.DriverID GROUP BY driver.DriverID ORDER BY DriversName";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':associationID', $associationID);
$stmt->execute();
$ratingsInfo= $stmt->fetchAll();


      $rows = array();
      $table = array();
      $table['cols'] = array(

        // Labels for your chart, these represent the column titles.
        /* 
            note that one column is in "string" format and another one is in "number" format 
            as pie chart only required "numbers" for calculating percentage 
            and string will be used for Slice title
        */

        array('label' => 'Drivers Name', 'type' => 'string'),
        array('label' => 'Amount of Ratings', 'type' => 'number'),
        array('label' => 'Average Rating', 'type' => 'number')


    );
        /* Extract the information from $result */
        foreach($ratingsInfo as $r) {

          $temp = array();

          // the following line will be used to create a bars on the chart

          $temp[] = array('v' => (string) $r['DriversName']); 

          // Values of each slice

          $temp[] = array('v' => (int) $r['AmountOfRatings']);
          $temp[] = array('v' => (int) $r['AverageRating']); 
 
          $rows[] = array('c' => $temp);
        }

    $table['rows'] = $rows;

    // convert data into JSON format
    $jsonTable = json_encode($table);

?>
<!DOCTYPE html>
<html>
<head>
   <title>View Ratings/Reviews</title>
    <link rel="stylesheet" type="text/css" href="main.css" />


	</style>
	        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
                google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

          // Create our data table out of JSON data loaded from server.
          var data = new google.visualization.DataTable(<?=$jsonTable?>);
          var options = {
               title: 'Ratings of Drivers',
              is3D: 'true',
              width: 600,
              height: 350
            };
          // Instantiate and draw our chart, passing in some options.
          // Do not forget to check your div ID
          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
        </script>
</head>
<body>


<section>
<table border="1" width="140" height="400" class="center-text">
<tr rowspan="2"><td>
<label>Average Rating</label><br>
<label class="figures"><?php echo $associationAverage ?></label>
</td></tr>
<tr><td>
<label>Ratings</label><br>
<label class="figures"><?php echo $associationRatings ?></label>
</td></tr>
<tr rowspan="2"><td>
<label>Reviews</label><br>
<label class="figures">0000</label>
</td></tr>
<tr rowspan="2"><td>
<label>Emergencies</label><br>
<label class="figures">0000</label>
</td></tr>
</table>
</section>

<section>
	<div id="chart_div"></div>

</section>


<table border="1" width="600" height="100" class="center-text">
	
	<th>Driver Name</th>
	<th>Emergencies</th>
	<th>Ratings</th>
	<th>Average Rating</th>
	<?php foreach ($ratingsInfo as $ratingsInfo): ?>
	<tr>
	<td><?php echo $ratingsInfo['DriversName']; ?></td>
	<td>None Yet</td>
	<td><label><?php echo $ratingsInfo['AmountOfRatings']; ?></label></td>
	<td><?php echo $ratingsInfo['AverageRating']; ?></td></tr>
	<?php endforeach; ?>

</table>

</body>
</html>