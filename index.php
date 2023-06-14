<?php
include('conn.php');
session_start();

if (isset($_SESSION['admin_id'])) {
    header('Location:Admin/index.php');
} else if (isset($_SESSION['s_id'])) {
    header('Location:Students/index.php');
} else if (isset($_SESSION['f_id'])) {
    header('Location:Faculty/index.php');
} else if (isset($_SESSION['j_id'])) {
    header('Location:Jury/index.php');
} else {

    $error_login = '';
    if (isset($_POST['btnsubmit'])) {
        $id = $_POST['id'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // if role is student
        if ($role == "student") {
            $query = "Select * from student_group WHERE group_id = {$id} and password = '{$password}'";
            if ($result = mysqli_query($conn, $query)) {
                $row_count = mysqli_num_rows($result);
                $data = mysqli_fetch_assoc($result);
            }

            if ($row_count == 0) {
                $error_login = 'Invalid Login';
            } else {
                $error_login = '';
                $_SESSION['s_id'] = $id;
                $_SESSION['name'] = $data['group_name'];
                $_SESSION['email'] = $data['email'];
                header('Location:Students/index.php');
            }
        }

        //if role is faculty
        else if ($role == "faculty") {
            $query = "Select * from faculty WHERE f_id = {$id} and password = '{$password}'";
            if ($result = mysqli_query($conn, $query)) {
                $row_count = mysqli_num_rows($result);
                $data = mysqli_fetch_assoc($result);
            }

            if ($row_count == 0) {
                $error_login = 'Invalid Login';
            } else {
                $error_login = '';
                $_SESSION['f_id'] = $id;
                $_SESSION['name'] = $data['f_name'];
                $_SESSION['email'] = $data['email'];
                header('Location:Faculty/index.php');
            }
        }

        //if role is jury
        else if ($role == "jury") {
            $query = "Select * from jury inner join faculty on jury.f_id = faculty.f_id WHERE jury.j_id = {$id} and faculty.password = '{$password}'";
            if ($result = mysqli_query($conn, $query)) {
                $row_count = mysqli_num_rows($result);
                $data = mysqli_fetch_assoc($result);
            }

            if ($row_count == 0) {
                $error_login = 'Invalid Login';
            } else {
                $error_login = '';
                $_SESSION['j_id'] = $id;
                $_SESSION['name'] = $data['f_name'];
                $_SESSION['email'] = $data['email'];
                header('Location:Jury/index.php');
            }
        }

        // if role is admin
        else if ($role == "admin") {
            
            $query = "Select * from admin WHERE username = '{$id}' and password = '{$password}'";
            // echo $query;
            // exit;
            if ($result = mysqli_query($conn, $query)) {
                $row_count = mysqli_num_rows($result);
                $data = mysqli_fetch_assoc($result);
                // print_r($row_count);
                // exit;
            }

            if ($row_count == 0) {
                $error_login = 'Invalid Login';
            } else {
                $error_login = '';
                $_SESSION['admin_id'] = $id;
                $_SESSION['name'] = $data['username'];
                header('Location:Admin/index.php');
            }
        } else {
            $error_login = 'Invalid Login';
        }
    }
    ?>

                <!DOCTYPE html>
                <html lang="en">

                <head>
        <?php include('shared/header.php'); ?>
                </head>

                <body>
                    <div class="container-flex">
                        <!-- navbar -->
                        <nav class="navbar navbar-light bg-warning">
                            <div class="container-fluid">
                                <a class="navbar-brand text-white fw-bold" href="#">
                                    <img src="./images/logo.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
                                    <span class="fs-4"> CGPIT (Chotubhai Gopalbhai Patel Institute Of Technology)</span>
                                </a>
                            </div>
                        </nav>
                        <!-- navbar end -->

                        <div class="container">
                            <br>
                            <h1 class="text-center">Project Managment System</h1>
                            <div class="row p-4">
                                <div class="col-md-8 box-bac border border-2 rounded mx-auto p-5 fw-bold">
                                    <h2 class="text-left pb-4">Login</h2>
                                    <form method="post">
                                        <div class="mb-3">
                                            <label class="form-label">Authantication ID : </label>
                                            <input type="text" class="form-control" required placeholder="ID" name="id">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password :</label>
                                            <input type="password" class="form-control" required placeholder="Password" name="password">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Role:</label>
                                            <select class="form-select" name="role" required>
                                                <option disabled selected>Select Role</option>
                                                <option value="student">Student</option>
                                                <option value="faculty">Faculty</option>
                                                <option value="jury">Jury</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                            <span class="fw-lighter text-danger">
                                    <?php echo $error_login ?>
                                            </span>
                                        </div>
                                        <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <footer>
            <?php include('./shared/footer.php'); ?>
                    </footer>
                </body>
    <?php
}
?>

</html>