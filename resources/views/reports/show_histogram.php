<!DOCTYPE html>
<html>
<head>
    <title>Talent Centric | Attendance Histogram</title>
    <?php
        require '../layouts/header_style.php';
    ?>
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

</body>

<?php
    require '../layouts/footer_scripts.php';
?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>

	var year = "<?php echo $_POST["year"]; ?>";

    $.ajax({
        url: "../../../app/histogram_data.php",
        method: "POST",
        dataType:'json',
        data: ({ year: year }),
        success: function(data) {

            var months = [];
            var frequency = [];
            var month = new Array();

			month["01"] = "January";
			month["02"] = "February";
			month["03"] = "March";
			month["04"] = "April";
			month["05"] = "May";
			month["06"] = "June";
			month["07"] = "July";
			month["08"] = "August";
			month["09"] = "September";
			month["10"] = "October";
			month["11"] = "November";
			month["12"] = "December";

            for(var i in data) {
                months.push(month[[data[i].month]]);
                frequency.push(data[i].frequency);
            }

            var chartdata = {
                labels: months,
                datasets : [
                    {
                        label: 'Histogram Representation',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        data: frequency
                    }
                ]
            };

            var ctx = document.getElementById('myChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'frequency'
                              }
                        }],
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'months'
                              }
                        }]
                    }
                }
            });
        },

        error: function(data) {
            console.log(data);
        }
    });



</script>
  
</body>
</html>