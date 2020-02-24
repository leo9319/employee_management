<!DOCTYPE html>
<html>
<head>
    <title>Talent Centric | Attendance Pie Chart</title>
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
    var month_data = "<?php echo date('m', strtotime($_POST["month_year"])); ?>";
    var year_data = "<?php echo date('Y', strtotime($_POST["month_year"])); ?>";

    $.ajax({
        url: "../../../app/pie_data.php",
        method: "POST",
        dataType:'json',
        data: ({
        	employee_id: employee_id_data,
        	month: month_data,
        	year: year_data,
        }),
        success: function(data) {

            var daysInMonth = new Date(year_data, month_data, 0).getDate();

        	var labels = ["present", "not attendended (includes weekends)"];
            var attendance = [data[0]["present"], daysInMonth - data[0]["present"]];

            var chartdata = {
                labels: labels,
                datasets : [
                    {
                        label: 'Total Attendances This Month',
                        backgroundColor: ["orange", "blue"], 
                        data: attendance
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