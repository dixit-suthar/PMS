<!DOCTYPE html>
<html lang="en">
<head>
<?php

include('../conn.php');
include('../shared/header.php');
include('nav.php');

$query = "SELECT student_group.group_id, student_group.group_name FROM faculty
 INNER JOIN student_group on faculty.student_group_id = student_group.group_id WHERE
 faculty.student_group_id = student_group.group_id AND faculty.f_id = {$_SESSION['f_id']};";
 $result = mysqli_query($conn,$query);
$group = mysqli_fetch_assoc($result);

$_SESSION['group_id'] = $group['group_id'];
$_SESSION['group_name'] = $group['group_name'];

?>
</head>
<body class="custom-bac">
<div class="container bg-light m-5 p-5  h-75 min-vh-100">
    <h1 class="text-capitalize mb-3">Welcome <?php echo $_SESSION['name'] ?></h1>
    
    <h4>You are Assigned to student Group : <span class="text-warning text-capitalize"> <?php echo $group['group_name']; ?> </span></h4>
        <br>
    <div class="row">
        <div class="col-md-7">
            <div class="list-group">
                <a class="list-group-item list-group-item-action list-group-item-warning" aria-current="true">
                <h3>Select View to Display Data</h3>
                </a>
                <a href="student.php" class="list-group-item list-group-item-action list-group-item-light fw-bold">View Students Group</a>
            </div>
        </div>
    </div>
</div>
</body>
<?php include('../shared/footer.php'); ?>
</html>