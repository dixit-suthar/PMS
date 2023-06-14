<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../conn.php');
    include('../shared/header.php');
    include('nav.php');

    $query = "SELECT marks.group_id, marks.f_marks, marks.j_marks, project.project_name, 
       project.file_name from marks inner join project on project.student_group_id = marks.group_id ";
    $result = mysqli_query($conn, $query);

    $row_count = mysqli_num_rows($result);
    ?>
</head>

<body class="custom-bac">
<div class="container bg-white m-5 p-3 min-vh-100">
    <h3 class="text-center m-3">Evaluation</h3>
    <div>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Project Name</th>
                <th scope="col">File Name</th>
                <th scope="col">Marks By Faculty</th>
                <th scope="col">Marks By Jury</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if($row_count == 0)
            {
                ?>

                <h2>No Record Found!</h2>
                <?php
            }
            else{
            while($row = mysqli_fetch_assoc($result))
            {
                ?>
                <tr>
                    <th scope="row"><?php echo $row['group_id'] ?></th>
                    <td><?php echo $row['project_name'] ?></td>
                    <td><?php echo $row['file_name'] ?></td>
                    <td><?php echo $row['f_marks'] ?></td>
                    <td><?php echo $row['j_marks'] ?></td>
                </tr>
                <?php
            }
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
</body>
<?php include('../shared/footer.php'); ?>
</html>