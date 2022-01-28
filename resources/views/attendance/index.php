<!DOCTYPE html>
<html>
<head>
    <title>Employee Management | Attendance</title>
    <?php
        require '../layouts/header_style.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body>
<?php
    include '../layouts/top_nav.php';
?>

<?php
    include '../../../app/employee.php';
?>

<div class="container">
    <div class="border rounded p-3" style="height: 250px">
        <h3 class="text-center">Register Attendance</h3>
        <form method="POST" action="../../../app/attendance.php">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <select class="select2" name="employee_id" style="width: 500px" required="">
                        <?php
                            $all_employees = $obj->index("employees");

                            foreach ($all_employees as $employee) {
                        ?>
                                <option value="<?php echo $employee["id"] ?>"><?php echo $employee["name"] ?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date Attended</label>
                        <input type="date" name="date" class="form-control input-sm" required="">
                    </div>
                </div>
                <button class="btn btn-success btn-block m-3" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

    </body>
    <?php
        require '../layouts/footer_scripts.php';
    ?>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    
</body>
</html>