<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include('../conn.php');
    include('../shared/header.php');
    include('nav.php');

    echo "</head>";

    if (isset($_POST['btnsend'])) {
        $message = $_POST['message'];
        $message_to = $_POST['message_to'];
        $admin_id = $_SESSION['admin_id'];
        if ($message_to == "faculty") {
            $query = "INSERT INTO messages(admin_id , faculty_message) VALUES({$admin_id} , '{$message}')";
        } else if ($message_to == "student") {
            $query = "INSERT INTO messages(admin_id , student_message) VALUES({$admin_id} , '{$message}')";
        } else if ($message_to == "both") {
            $query = "INSERT INTO messages(admin_id , faculty_message, student_message) VALUES({$admin_id} , '{$message}', '{$message}')";
        }
        $result = mysqli_query($conn, $query);
        if ($result) {

    ?>
            <div class="alert alert-success" role="alert">
                Message Sent Successfully
            </div>
    <?php
        } // end if
    }
    ?>

<body class="custom-bac">

    <div class="container bg-light m-5 p-5 h-75 min-vh-100">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3>Send Message</h3>
                <form method="post">
                    <div class="form-floating">
                        <textarea name="message" class="form-control" placeholder="Leave a message here" style="height: 100px"></textarea>
                        <label>Message</label>
                    </div>
                    <label class="form-label fw-bolder">Send message to:</label>
                    <select class="form-select" name="message_to">
                        <option disabled selected>Message to</option>
                        <option value="faculty">Faculty</option>
                        <option value="student">Student</option>
                        <option value="both">Both</option>
                    </select>
                    <br>
                    <button type="submit" name="btnsend" class="btn btn-success">Send</button>
                </form>
            </div>
        </div>

    </div>
</body>
<?php include('../shared/footer.php'); ?>
</html>