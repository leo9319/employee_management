<!DOCTYPE html>
<html>
<head>
    <title>Talent Centric | Bar Chart</title>
    <?php
        require '../layouts/header_style.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body>
<?php
    include '../layouts/top_nav.php';
?>

<div class="container">
    <div class="border rounded p-3" style="height: 250px">
        <h3 class="text-center">Generate Bar Chart</h3>
        <form method="POST" action="show_bar.php">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select Month</label>
                        <input type="month" name="month_year" class="form-control input-sm" required="">
                    </div>
                </div>
                <button class="btn btn-success btn-block m-3" type="submit" name="submit">Generate</button>
            </div>
        </form>
    </div>
</div>

    <?php
        include '../layouts/footer.php';
    ?>


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