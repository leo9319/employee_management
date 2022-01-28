<!DOCTYPE html>
<html>
<head>
    <title>Employee Management | Home</title>
    <?php
	    require 'resources/views/layouts/header_style.php';
	?>
</head>
<body>
<?php
    include 'resources/views/layouts/top_nav.php';
?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Demo for Employers</h1>
</div>

<div class="container">
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Employee</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Shows all the Employee Data</li>
                    <li>Can Add New Employee</li>
                    <li>Can View Address</li>
                    <li>Searchable Data</li>
                </ul>
                <a href="/resources/views/employees/index.php" class="btn btn-lg btn-block btn-outline-primary">Go to Page</a>
            </div>
        </div>
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Attendance</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Can Create Report</li>
                    <li>Visial represeantation of data</li>
                    <li>Can Add Attendances</li>
                    <li>Tabular Format</li>
                </ul>
                <a href="/resources/views/attendance/index.php" class="btn btn-lg btn-block btn-outline-success">Go to Page</a>
            </div>
        </div>
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Salary</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    <li>View Employee Salary</li>
                    <li>Visual Representaion of Data</li>
                    <li>Can View Salary Distribution</li>
                    <li>Data Entry</li>
                </ul>
                <a href="/resources/views/salary/index.php" class="btn btn-lg btn-block btn-outline-info">Go to Page</a>
            </div>
        </div>
    </div>
</div>

<?php
    include 'resources/views/layouts/footer_scripts.php';
?>
</body>
</html>