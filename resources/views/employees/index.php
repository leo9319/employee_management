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



<?php
    require '../layouts/footer_scripts.php';
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#employees').DataTable();
    } );
</script>
</body>
</html>