<?php
require_once('connection.php');


      /* select all the weekly tasks from the table googlechart */
      $ownerID =8;
      $sql ="SELECT DISTINCT driver.DriverID ,CONCAT(driver.FirstName,' ',driver.LastName) AS DriversName,COUNT(journey.DriverID) AS AmountOfRatings , ROUND(AVG(Rating),1) AS AverageRating FROM journey, driver, taxi, taxi_driver WHERE taxi.OwnerID =:ownerID AND taxi.RegNo = taxi_driver.RegNo AND driver.DriverID = taxi_driver.DriverID AND driver.DriverID = journey.DriverID GROUP BY DriversName";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':ownerID', $ownerID);
      $stmt->execute();
      $result= $stmt->fetchAll();
      /*
          ---------------------------
          example data: Table (googlechart)
          --------------------------
          weekly_task     percentage
          Sleep           30
          Watching Movie  10
          job             40
          Exercise        20       
      */

//echo json_encode($results);


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
        array('label' => 'Amount of Ratings', 'type' => 'number')

    );
        /* Extract the information from $result */
        foreach($result as $r) {

          $temp = array();

          // the following line will be used to slice the Pie chart

          $temp[] = array('v' => (string) $r['DriversName']); 

          // Values of each slice

          $temp[] = array('v' => (int) $r['AmountOfRatings']); 
          $rows[] = array('c' => $temp);
        }

    $table['rows'] = $rows;

    // convert data into JSON format
    $jsonTable = json_encode($table);
    //echo $jsonTable;


    ?>


    <html>
      <head>
        <!--Load the Ajax API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

          // Create our data table out of JSON data loaded from server.
          var data = new google.visualization.DataTable(<?=$jsonTable?>);
          var options = {
               title: 'My Weekly Plan',
              is3D: 'true',
              width: 800,
              height: 600
            };
          // Instantiate and draw our chart, passing in some options.
          // Do not forget to check your div ID
          var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
        </script>
      </head>

      <body>
        <!--this is the div that will hold the pie chart-->
        <div id="chart_div"></div>
      </body>
    </html>