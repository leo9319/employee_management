<!DOCTYPE html>
<html>
<head>
    <title>Talent Centric | Employees</title>
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
    include '../../../connection.php';
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, name, position, department, date_joined, address, nid, emergency_contact FROM employees";
    $result = $conn->query($sql);
?>

<div class="container">
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModalCenter">
      Add Employee
    </button>

    <table id="employees" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Department</th>
                <th>Date Joined</th>
                <th>Address</th>
                <th>NID</th>
                <th>Emergency Contact</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["position"] ?></td>
                        <td><?php echo $row["department"] ?></td>
                        <td><?php echo $row["date_joined"] ?></td>
                        <td><?php echo $row["address"] ?></td>
                        <td><?php echo $row["nid"] ?></td>
                        <td><?php echo $row["emergency_contact"] ?></td>
                    </tr>
            <?php
                    }
                } else {
                    echo "0 results";
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Department</th>
                <th>Date Joined</th>
                <th>Address</th>
                <th>NID</th>
                <th>Emergency Contact</th>
            </tr>
        </tfoot>
    </table>

    <?php
        $conn->close();
    ?>

    <?php
	    include '../layouts/footer.php';
	?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="../../../app/employee.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Full Name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" name="position" placeholder="Position" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Department</label>
                                <input type="text" name="department" placeholder="Department" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date Joined</label>
                                <input type="date" name="date_joined" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Emergency Contact</label>
                                <input type="text" name="emergency_contact" placeholder="Emergency Contact" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>NID</label>
                                <input type="text" name="nid" placeholder="NID" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" placeholder="Your Address Here..." class="form-control" required rows="2"></textarea>
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#employees').DataTable();
    } );
</script>
</body>
</html>