<!DOCTYPE html>
<html>
<head>
    <title>Talent Centric | Salary Pie Chart</title>
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

    var employee_id_data = "<?php echo $_POST["employee_id"]; ?>";

    $.ajax({
        url: "../../../app/salary_pie_data.php",
        method: "POST",
        dataType:'json',
        data: ({employee_id: employee_id_data}),
        success: function(data) {

            var salaries = ["basic", "house", "medical", "conveyance", "food"];
            var distribution = [];

            for(var i in data[0]) {
                distribution.push(data[0][i]);
            }

            // console.log(distribution);

            var chartdata = {
                labels: salaries,
                datasets : [
                    {
                        label: 'Salary Distribution',
                        backgroundColor: ["red", "blue", "green", "orange", "yellow"], 
                        data: distribution
                    }
                ]
            };

            var ctx = document.getElementById('myChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'pie',
                data: chartdata,
            });
        },

        error: function(data) {
            console.log(data);
        }
    });



</script>
  
</body>
</html>