<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    
    include('../conn.php');
    include('../shared/header.php');
    include('nav.php');

    $query = "SELECT student_group.group_id, student_group.group_name, student_group.email, student_group.phone_number , student_group.year, student_group.branch , faculty.f_name FROM faculty INNER JOIN student_group on faculty.student_group_id = student_group.group_id WHERE faculty.student_group_id = student_group.group_id";
    $result = mysqli_query($conn, $query);

    $row_count = mysqli_num_rows($result);
    ?>
</head>

<body class="custom-bac">
    <div class="container bg-light m-5 p-5  h-75 min-vh-100">
        <h3 class="text-center mb-3">Students Group</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Group Name</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Phonee Number</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Faculty Assigned</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($row_count == 0) {
                ?>

                    <h2>No Record Found!</h2>
                <?php
                }
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['group_id'] ?></th>
                        <td><?php echo $row['group_name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone_number'] ?></td>
                        <td><?php echo $row['branch'] ?></td>
                        <td><?php echo $row['f_name'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<?php include('../shared/footer.php'); ?>

</html>