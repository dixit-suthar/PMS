<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include('../conn.php');
    include('../shared/header.php');
    include('nav.php');
    $st_query = "SELECT group_name FROM student_group where group_id = {$_SESSION['group_id']}";
    $st_result = mysqli_query($conn, $st_query);
    $st_name = mysqli_fetch_assoc($st_result);
    if (isset($_POST['btnsubmit'])) {

        $f_marks = $_POST['marks'];
        if ($f_marks < 0 || $f_marks > 100) {
    ?>
            <div class="alert alert-danger" role="alert">
                Please Enter marks Between 0 to 100
            </div>
            <?php
        } else {
            $query = "INSERT INTO `marks`(`group_id`, `f_marks`) VALUES ( {$_SESSION['group_id']} , {$f_marks} )";
            $result = mysqli_query($conn, $query);
            if ($result) {
            ?>
</head>


    <div class="alert alert-success" role="alert">
        Marks Added Successfully
    </div>
<?php

            } // end if
        }
    }
?>
<body class="custom-bac">
<div class="container bg-light border-start border-end rounded mt-5 min-vh-100">
    <div class="row p-5">
        <div class="col-md-8 mx-auto">
            <h3>Add Marks</h3>
            <form method="post">
                <div class="row">
                    <div class="col-md-3">
                    <div class="mb-3">
                    <label class="form-label fw-bolder"> Student Group :</label>
                </div>
                    </div>
                    <div class="col-md-4">
                    <div class="mb-3">
                    <label class="form-label fw-bolder text-capitalize">  <?php echo $st_name['group_name']; ?></label>
                </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label fw-bolder mt-1"> Enter Marks :</label>
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="marks" placeholder="Enter Marks" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" name="btnsubmit" class="btn btn-primary">Add Marks</button>
            </form>
        </div>
    </div>

</div>
</body>
<?php include('../shared/footer.php'); ?>
</html>