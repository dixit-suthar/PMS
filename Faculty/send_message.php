<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include('../conn.php');
    include('../shared/header.php');
    include('nav.php');

    if (isset($_POST['btnsend'])) {
        $f_id = $_SESSION['f_id'];
        $group_id = $_SESSION['group_id'];
        $message = $_POST['message'];

        $query = "INSERT INTO f_messages(f_id , group_id , message) VALUES({$f_id} , {$group_id} ,'{$message}')";
    
        $result = mysqli_query($conn, $query);
        if ($result) {

    ?>

</head>

<div class="alert alert-success" role="alert">
    Message Sent Successfully
</div>
<?php

} // end if
}
?>
<body class="custom-bac">
<div class="container bg-light p-3 rounded mt-5 min-vh-100">
    <div class="row p-5">
        <div class="col-md-8 mx-auto">
            <h3>Send Message</h3>
            <form method="post">
                <div class="form-floating">
                    <textarea name="message" class="form-control" placeholder="Leave a message here" style="height: 100px"></textarea>
                    <label>Message</label>
                </div>
                <label class="form-label fw-bolder">Send message to Student Group : <?php echo $_SESSION['group_name']; ?></label>
                <br>
                <button type="submit" name="btnsend" class="btn btn-success">Send</button>
            </form>
        </div>
    </div>

</div>
</body>
<?php include('../shared/footer.php'); ?>
</html>