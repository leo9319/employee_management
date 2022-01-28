<!DOCTYPE html>
<html>
<head>
    <title>Employee Management | Bar Chart</title>
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


</body>

<?php
    require '../layouts/footer_scripts.php';
?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>

    var month_data = "<?php echo date('m', strtotime($_POST["month_year"])); ?>";
    var year_data = "<?php echo date('Y', strtotime($_POST["month_year"])); ?>";

    $.ajax({
        url: "../../../app/bar_data.php",
        method: "POST",
        dataType:'json',
        data: ({month: month_data, year: year_data}),
        success: function(data) {

            // console.log(data);
            var employees = [];
            var attendance_counts = [];

            for(var i in data) {
                employees.push(data[i].name);
                attendance_counts.push(data[i].total);
            }

            var chartdata = {
                labels: employees,
                datasets : [
                    {
                        label: 'Total Attendances This Month',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        data: attendance_counts
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
                                labelString: 'Days attended'
                              }
                        }],
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Names'
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