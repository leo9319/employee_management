<!DOCTYPE html>
<html>
<head>
    <title>Employee Management | Individual Salary Chart</title>
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
        <h3 class="text-center">Generate Pie Chart</h3>
        <form method="POST" action="show_salary_pie.php">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name</label>
                        <select class="select2" name="employee_id" style="width: 1000px" required="">
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
                <button class="btn btn-success btn-block m-3" type="submit">Submit</button>
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