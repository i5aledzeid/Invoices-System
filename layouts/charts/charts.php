<?php
include '../../db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', { packages: ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Define the chart to be drawn.
            var data = new google.visualization.arrayToDataTable([
                ['الشهر', 'الأرباح', 'الخصومات'],
                <?php
                $query = "SELECT * FROM profits";
                $result = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_array($result)) {
                    $car_number = $data['month'];
                    $car_number2 = $data['salary'];
                    $car_number3 = $data['discounts']; ?>
                    ['<?php echo $car_number; ?>', <?php echo $car_number2; ?>, <?php echo $car_number3; ?>],
                    <?php
                }
                ?>
            ]);

            var options = {
                title: 'إحصائيات السنة 2023 م',
                curveType: 'function',
                legend: { position: 'button' }
            };
            
            // Instantiate and draw the chart. [PieChart]
            var chart = new google.visualization.LineChart(document.getElementById('myPieChart'));
            chart.draw(data, options);
        }
    </script>
    <style>
        #myPieChart {
            position: absolute;
            top: 50px;
            left: 300px;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="../../assets/icons/stocks_chart_graph_analytics_icon.ico">
    <title>Chart</title>
</head>

<body>
    <!-- Identify where the chart should be drawn. -->
    <div id="myPieChart" style="width: 800px; height: 500px;"></div>
</body>

</html>