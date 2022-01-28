<!DOCTYPE html>
<html>
<head>
    <title>Employee Management | Salaries</title>
    <?php
        require '../layouts/header_style.php';
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
    <button type="button" class="btn btn-success mb-2 float-right" data-toggle="modal" data-target="#exampleModalCenter">
      Add Salary
    </button>

    <table id="salaries" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Basic</th>
                <th>House</th>
                <th>Medical Allowance</th>
                <th>Conveyance</th>
                <th>Food Allowance</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $salaries = $obj->getSalaries("salaries");

                foreach ($salaries as $salary) {
            ?>

                    <tr>
                        <td><?php echo $salary["name"] ?></td>
                        <td><?php echo number_format($salary["basic"]) ?></td>
                        <td><?php echo number_format($salary["house"]) ?></td>
                        <td><?php echo number_format($salary["medical_allowance"]) ?></td>
                        <td><?php echo number_format($salary["conveyance"]) ?></td>
                        <td><?php echo number_format($salary["food_allowance"]) ?></td>
                    </tr>
                    
            <?php

                }

            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Basic</th>
                <th>House</th>
                <th>Medical Allowance</th>
                <th>Conveyance</th>
                <th>Food Allowance</th>
            </tr>
        </tfoot>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Salary</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="../../../app/salary.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Name</label>
                                <br>
                                <select class="select2 form-control" name="employee_id" style="width: 460px" required="">
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
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Basic</label>
                                <input type="number" name="basic" placeholder="Basic Salary" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Food</label>
                                <input type="number" name="food_allowance" placeholder="Food Allowance" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>House</label>
                                <input type="number" name="house" placeholder="House Allowance" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Medical Allowance</label>
                                <input type="number" name="medical_allowance" placeholder="Medical Allowance" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Conveyance</label>
                                <input type="number" name="conveyance" placeholder="Conveyance" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    </body>
    <?php
        require '../layouts/footer_scripts.php';
    ?>
    
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#salaries').DataTable();
        } );

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    
</body>
</html>