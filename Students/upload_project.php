<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include('../conn.php');
    include('../shared/header.php');
    include('nav.php');

    $project_path = getProjectPath();
    $group_id = $_SESSION['s_id'];

    if(isset($_POST['btnsubmit']))
    {
        $project_name = $_POST['project_name'];
        $student_group_id = $_SESSION['s_id'];
        if(isset($_FILES['project_file']))
        {
            $folder_location = "../project_file/";
            $file_name = $_FILES['project_file']['name'];
            $file_size = $_FILES['project_file']['size'];
            $file_tmp = $_FILES['project_file']['tmp_name'];
            $file_type = $_FILES['project_file']['type'];

            if (file_exists($folder_location.$file_name)) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Sorry, file already exists.";
        echo "</div>";
    }
            else if(move_uploaded_file($file_tmp, $folder_location.$file_name))
    {
        $query = "INSERT INTO project(project_name, file_name, student_group_id) 
                    VALUES('{$project_name}', '{$file_name}', {$student_group_id})";
        $result = mysqli_query($conn, $query);
        if($result)
        {
    ?>
</head>
<div class="alert alert-success" role="alert">
    File Uploaded Succesfully!
</div>
<?php
}
}
            else{
                ?>
                <div class="alert alert-danger" role="alert">
                    File Not Uploaded error occured!
                </div>
<?php
            }
}
}
?>
<body class="custom-bac">
    <div class="container bg-light m-5 p-5  h-75 min-vh-100">
        <h3 class="text-center">Upload Project File</h3>
        <div class="row">
            <div class="col-md-9 mx-auto">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Student Group Name:</label>
                        <input type="text" class="form-control"
                               value="<?php echo $_SESSION['name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Project Name:</label>
                        <input type="text" class="form-control" name="project_name" value="">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload File</label>
                        <input class="form-control" type="file"
                               name="project_file" id="formFile">
                    </div>
                    <input type="submit" value="Submit" name="btnsubmit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>
<?php include('../shared/footer.php'); ?>

</html>