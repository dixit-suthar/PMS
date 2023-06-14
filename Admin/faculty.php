<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../conn.php');
    include('../shared/header.php');
    include('nav.php');

    $query = "SELECT faculty.f_id , faculty.f_name, faculty.email, faculty.f_branch , 
       student_group.group_name FROM faculty INNER JOIN student_group 
           on faculty.student_group_id = student_group.group_id";

    $result = mysqli_query($conn, $query);

    $row_count = mysqli_num_rows($result);
    ?>
</head>

<body class="custom-bac">
    <div class="container bg-white m-5 p-3 min-vh-100">
    <h3 class="text-center m-3">Faculty Details</h3>
    <div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email Id</th>
                <th scope="col">Branch</th>
                <th scope="col">Student Group Assigned</th>
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
                <th scope="row"><?php echo $row['f_id'] ?></th>
                <td><?php echo $row['f_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['f_branch'] ?></td>
                <td><?php echo $row['group_name'] ?></td>
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