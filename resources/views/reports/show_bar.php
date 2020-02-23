<!DOCTYPE html>
<html>
<head>
    <title>Talent Centric | Bar Chart</title>
    <?php
        require '../layouts/header_style.php';
    ?>
    <style type="text/css">
    	#chart-container {
    		width: 640px;
    		height: auto;
    	}
    </style>

</head>
<body>
<?php
    include '../layouts/top_nav.php';
?>

<div class="container">

	<canvas id="myChart" width="400" height="200"></canvas>

</div>

<?php
    include '../layouts/footer.php';
?>

<!-- SELECT EXTRACT(monthname FROM date) "Month", COUNT(*) AS total FROM attendances WHERE YEAR(date) = '2020' GROUP BY MONTH(date) -->

</body>

<?php
    require '../layouts/footer_scripts.php';
?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Days Atteneded',
            data: [12, 19, 3, 5, 2, 99],
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
  
</body>
</html>