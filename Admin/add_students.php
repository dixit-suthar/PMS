<!DOCTYPE html>
<html lang="en">
<head>
<?php

include('../conn.php');
include('../shared/header.php');
include('nav.php');

echo "</head>";
if (isset($_POST['btnsubmit'])) {
    $group_name = $_POST['group_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $year = $_POST['year'];
    $branch = $_POST['branch'];

    $query = "INSERT INTO `student_group`(`group_name`, `password`, `email`, `phone_number`, `year`, `branch`)
     VALUES ('{$group_name}','{$password}','{$email}','{$phone_number}','{$year}','{$branch}')";

    $result = mysqli_query($conn, $query);
    if ($result) {

?>
        <div class="alert alert-success" role="alert">
            Data Entered Successfully
        </div>
<?php
    } //end if
}
?>
<body class="custom-bac">    
<div class="container m-5 p-3 bg-light min-vh-100">
    <div class="row mt-4 pt-2 text-dark ">
        <div class="mx-auto col-md-8">
            <h3>Add Student Group</h3>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Group Name :</label>
                    <input type="text" class="form-control" required placeholder="Group Name" name="group_name">

                </div>
                <div class="mb-3">
                    <label class="form-label">Password :</label>
                    <input type="password" placeholder="Password" required class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email :</label>
                    <input type="email" placeholder="Email" required class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number :</label>
                    <input type="number" placeholder="Phone Number" required class="form-control" name="phone_number">
                </div>
                <div class="mb-3">
                    <label class="form-label">Year :</label>
                    <input type="number" placeholder="Year" required class="form-control" name="year">
                </div>
                <div class="mb-3">
                    <label class="form-label">Branch :</label>
                    <input type="text" placeholder="Branch" required class="form-control" name="branch">
                </div>
                <button type="submit" class="btn btn-primary" name="btnsubmit">Add Student</button>
            </form>
        </div>
    </div>
</div>
</body>
<?php include('../shared/footer.php'); ?>
</html>