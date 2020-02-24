<!DOCTYPE html>
<html>
<head>
    <title>Talent Centric | Salary Bar Chart</title>
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

    $.ajax({
        url: "../../../app/salary_data.php",
        method: "GET",
        dataType:'json',
        success: function(data) {

            var employees = [];
            var gross_salary = [];

            for(var i in data) {
                employees.push(data[i].name);
                gross_salary.push(data[i].gross_salary);
            }

            var chartdata = {
                labels: employees,
                datasets : [
                    {
                        label: 'Gross Salaries',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        data: gross_salary
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
                                labelString: 'Gross Salary'
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