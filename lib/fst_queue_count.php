<?php

######################################
## FST Queue Count for CRC Dashboard #
######################################

// data points for counter historical data
$q_data = array(324,284,317,298);

// value of dynamic queue count
$q_count = '+3';

//a way to get PHP to handle "pre" type text formatting and output, but conveniently also allow variables within it…
$google_chart = <<<HTMLEND
	<div class="qc_graph">
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Week');
        data.addColumn('number', 'Cases');
        data.addRows(4);
        data.setValue(0, 0, '9/26');
        data.setValue(0, 1, $q_data[0]);
        data.setValue(1, 0, '10/3');
        data.setValue(1, 1, $q_data[1]);
        data.setValue(2, 0, '10/10');
        data.setValue(2, 1, $q_data[2]);
        data.setValue(3, 0, '10/17');
        data.setValue(3, 1, $q_data[3]);

        var chart = new google.visualization.LineChart(document.getElementById('90-day_count_history'));
        chart.draw(data, {width: 400, height: 240, title: 'Queue Performance'});
      }
    </script>
    </div>
	<div id="90-day_count_history"></div>
HTMLEND;

echo $google_chart; 										# spit out the javascript
echo '<div class="qc_count"><h1>'.$q_count.'</h1></div>';	# echo the queue count with CSS

?> 