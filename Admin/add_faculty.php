<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include('../conn.php');
    include('../shared/header.php');
    include('nav.php');

    echo "</head>";

    $student_query = "SELECT group_id, group_name from student_group";
    $student_result = mysqli_query($conn, $student_query);


    if (isset($_POST['btnsubmit'])) {

        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $branch = $_POST['branch'];
        $student_group = $_POST['student_group'];

        $query = "INSERT INTO `faculty`(`f_name`, `password`, `email`, `f_branch`, `student_group_id`)
     VALUES ('{$name}','{$password}','{$email}', '{$branch}' ,{$student_group})";

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
                <h3>Add Faculty</h3>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Faculty Name</label>
                        <input type="text" class="form-control" required placeholder="Name" name="name">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" placeholder="Password" required class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" placeholder="Email" required class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Branch</label>
                        <input type="text" placeholder="Branch" required class="form-control" name="branch">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Group:</label>
                        <select class="form-select" name="student_group">
                            <option disabled selected>Select Student Group to Assign</option>
                            <?php
                            while ($row = mysqli_fetch_assoc($student_result)) {
                            ?>
                                <option value="<?php echo $row['group_id']; ?>"><?php echo $row['group_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="btnsubmit">Add Faculty</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php include('../shared/footer.php'); ?>

</html>