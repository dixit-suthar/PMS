<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include('../conn.php');
    include('../shared/header.php');
    include('nav.php');

    $admin_msg_query = "Select time, student_message from messages";
    $admin_result = mysqli_query($conn,$admin_msg_query);
 
    $f_msg_query = "Select time, message from f_messages where group_id = {$_SESSION['s_id']}";
    $f_result = mysqli_query($conn,$f_msg_query);
    ?>
</head>

<body class="custom-bac">
    <div class="container bg-light m-5 p-5  h-75 min-vh-100">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <h3 class="text-capitalize mb-3">Message From Admin</h3>
                <?php
                
                while($admin_messages = mysqli_fetch_assoc($admin_result))
                {
                    if($admin_messages['student_message'] == NULL)
                    {
                        continue;
                    }
                ?>
                <label class="form-label"><?php echo $admin_messages['time']; ?></label>
                <div class="alert alert-warning" role="alert">
                <?php
                    echo $admin_messages['student_message']; 
                 ?>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-7 mx-auto">
                <h3 class="text-capitalize mb-3">Message From Faculty</h3>
                <?php
                while($f_messages = mysqli_fetch_assoc($f_result))
                {
                ?>
                    <label class="form-label "> <?php echo $f_messages['time']; ?></label>
                <div class="alert alert-warning" role="alert">
                    <?php echo $f_messages['message']; ?> 
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
<?php include('../shared/footer.php'); ?>

</html>