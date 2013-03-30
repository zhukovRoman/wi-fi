<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var info = <?php echo $model->getChartData();?>;
        var data = google.visualization.arrayToDataTable(info);

        var options = {
            title: 'Число показов рекламной компании'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<div id="chart_div" style="width: 900px; height: 500px; float:left"></div>

<?php //echo $model->getChartData(); ?>