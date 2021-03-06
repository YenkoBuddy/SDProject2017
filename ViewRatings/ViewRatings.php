<?php
$ownerID=8;
require_once('connection.php');

$sql1="SELECT taxi.OwnerID, COUNT(Rating) AS OwnerRatings , ROUND(AVG(Rating),1) AS OwnerAverage FROM journey, taxi WHERE taxi.OwnerID =:ownerID AND taxi.RegNo = journey.RegNo GROUP BY taxi.OwnerID";

$stmt1 = $conn->prepare($sql1);
$stmt1->bindParam(':ownerID', $ownerID);
$stmt1->execute();
$ownerRatingsInfo= $stmt1->fetchAll();
$stmt1->closeCursor();

foreach ($ownerRatingsInfo as $ownerRatingsInfo):
	$ownerAverage = $ownerRatingsInfo['OwnerAverage'];
	$ownerRatings = $ownerRatingsInfo['OwnerRatings'];
endforeach;

$sql="SELECT DISTINCT driver.DriverID ,CONCAT(driver.FirstName,' ',driver.LastName) AS DriversName,COUNT(journey.DriverID) AS AmountOfRatings , ROUND(AVG(Rating),1) AS AverageRating FROM journey, driver, taxi, taxi_driver WHERE taxi.OwnerID =:ownerID AND taxi.RegNo = taxi_driver.RegNo AND driver.DriverID = taxi_driver.DriverID AND driver.DriverID = journey.DriverID GROUP BY DriversName";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':ownerID', $ownerID);
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

          // the following line will be used to slice the Pie chart

          $temp[] = array('h' => (string) $r['DriversName']); 

          // Values of each slice

          $temp[] = array('h' => (int) $r['AmountOfRatings']); 
          $temp[] = array('h' => (int) $r['AverageRating']); 

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
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

	        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
                google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

          // Create data table out of JSON data loaded from server.
          var data = new google.visualization.DataTable(<?=$jsonTable?>);
          var options = {
               title: 'Ratings of Drivers',
              is3D: 'true',
              width: 600,
              height: 350,
              {hAxis: { format:'decimal'} }
            };
          // Instantiate and draw our chart, passing in some options.
         
          var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
        </script>
</head>
<body>


<section>
<table border="1" width="140" height="400" class="center-text">
<tr rowspan="2"><td>
<label>Average Rating</label><br>
<label class="figures"><?php echo $ownerAverage ?></label>
</td></tr>
<tr><td>
<label>Ratings</label><br>
<label class="figures"><?php echo $ownerRatings ?></label>
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