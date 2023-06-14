<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include('../conn.php');
    include('../shared/header.php');
    include('nav.php');

    $query = "Select faculty_message , time from messages";
    $result = mysqli_query($conn,$query);

    ?>
</head>

<body class="custom-bac">
    <div class="container bg-light m-5 p-5  h-75 min-vh-100">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <h3 class="text-capitalize mb-3">Message From Admin</h3>
                <?php
                
                while($message = mysqli_fetch_assoc($result))
                {
                    if($message['faculty_message'] == "")
                    {
                        continue;
                    }
                ?>
                <label class="form-label"><?php echo $message['time']; ?></label>
                <div class="alert alert-warning" role="alert">
                <?php
                    echo $message['faculty_message']; 
                 ?>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
<?php include('../shared/footer.php'); ?>

</html>