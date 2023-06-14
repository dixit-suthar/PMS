<!DOCTYPE html>
<html lang="en">
<head>
<?php

include('../conn.php');
include('../shared/header.php');
include('nav.php');

?>
</head>
<body class="custom-bac">
<div class="container bg-light m-5 p-5  h-75 min-vh-100">
    <h1 class="text-capitalize mb-3">Welcome <?php echo $_SESSION['name'] ?></h1>    
    <div class="row">
        <div class="col-md-7">
            <div class="list-group">
                <a class="list-group-item list-group-item-action list-group-item-warning" aria-current="true">
                <h3>Upload Project</h3>
                </a>
                <a href="upload_project.php" class="list-group-item list-group-item-action list-group-item-light fw-bold">Click Here to Upload Project</a>
            </div>
        </div>
    </div>
</div>
</body>
<?php include('../shared/footer.php'); ?>
</html>