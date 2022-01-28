<!DOCTYPE html>
<html>
<head>
    <title>Talent Centric | Daily Report</title>
    <?php
        require '../layouts/header_style.php';
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

</head>
<body>
<?php
    include '../layouts/top_nav.php';
?>

<?php
    include '../../../app/employee.php';
?>


<div class="container">
    <table id="attendance" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Day</th>
                <th>Date</th>
                <th>Attended</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $employee_id = $_POST["employee_id"];
                $month_year = $_POST["date"];
                $attendances = $obj->getAttendance($employee_id, $month_year);

                $attendances_array = array();

                foreach ($attendances as $key => $value) {
                    array_push($attendances_array, $value["date"]);
                }

                $date = $_POST["date"] . "-01";
                $end = $_POST["date"] . "-" . date('t', strtotime($date));;

                while(strtotime($date) <= strtotime($end)) {
            ?>

                    <tr>
                        <td><?php echo date('l', strtotime($date)); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($date)); ?></td>
                        <td>
                            <?php
                                if (in_array(date('Y-m-d', strtotime($date)), $attendances_array)) {
                                    echo "Yes";
                                }
                            ?>
                        </td>
                    </tr>
                    
            <?php
                $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                }

            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Day</th>
                <th>Date</th>
                <th>Attended</th>
            </tr>
        </tfoot>
    </table>

    </body>
    <?php
        require '../layouts/footer_scripts.php';
    ?>
    
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#attendance').DataTable({
                "pageLength": 31,
                "ordering": false
            });
        } );
    </script>
</body>
</html>