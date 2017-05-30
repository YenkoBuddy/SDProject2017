<?php


?>

<!DOCTYPE html
<html>
  <head>
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
    	$(document).ready(function(){
    		$.ajax
    		({
    			url : "data.php",
    			dataType: "JSON",
    			success : function(result){
    				google.charts.load('current', {
    					'packages' : ['corechart']
    				});
    				google.charts.setOnLoadCallback(function() {
    					drawChart(result);
    				});
    			}
    		});
    		function drawChart(result){
    			var data = new google.visualization.DataTable();
    			data.addColumn('string', 'Name');
    			data.addColumn('number', 'Amount');
    			var dataArray =[];
    			$.each(result, function(i, obj) {
    				dataArray.push([obj.DriversName, obj.AmountOfRatings]);
    			});
    			data.addRows(dataArray);

    			var piechart_options = {
    				title: 'Pie WIth',
    				width: 400,
    				height: 300
    			};
    			var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
    			piechart.draw(data, piechart_options);

    			var barchart_options ={
    				title: 'Bar with',
    				width : 400,
    				height : 300,
    				legend: 'none'
    			};
    			var barchart =new google.visualization.Barchart(document.getElementById('barchart_div'));
    			barchart.draw(data, barchart_options);
    			}
    		});


/*
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAxisTickColors);

function drawAxisTickColors() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Name of Driver');
      data.addColumn('number', 'Amount of Ratings');
      data.addColumn('number', 'Average Rating');

      data.addRows({$graph_data});
      var options = {
      	title: ' '
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
}
jQuery(document).ready(function(){
	jQuery(window).resize(function(){
		drawChart();
	})
})

      var options = {
        title: 'Overall Ratings of Drivers of <?php //echo $name; ?>',
        focusTarget: 'category',
        hAxis: {
          title: 'Name of Driver',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          },
          textStyle: {
            fontSize: 14,
            color: '#053061',
            bold: true,
            italic: false
          },
          titleTextStyle: {
            fontSize: 18,
            color: '#053061',
            bold: true,
            italic: false
          }
        },
        vAxis: {
          title: 'Number (1-10)',
          textStyle: {
            fontSize: 18,
            color: '#67001f',
            bold: false,
            italic: false
          },
          titleTextStyle: {
            fontSize: 18,
            color: '#67001f',
            bold: true,
            italic: false
          }
        }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }*/

    </script>
  </head>
  <body>
    <table class="columns">
    <tr>
    	<td><div id="piechart_div" style="border: 1px solid #ccc"></div></td>
    	<td><div id="barchart_div" style="border: 1px solid #ccc"></div></td>
    </tr>
    </table>

  </body>
</html>