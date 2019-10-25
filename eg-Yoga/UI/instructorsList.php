<?php
    require_once '../classes/User.php';
    require_once 'adminTop.php';
    $user = new User;
    $instructors = $user->getInstructorInfomation();
?>
<body>
    <div class="w-75 mx-auto">
        <h2 class="py-2">Instructors</h2>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Instructor ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Detail</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($instructors as $row):?>
                <tr class="">
                    <th class="in_width text-center"><?php echo $row["instructor_id"] ?></th>
                    <td class="in_width"><?php echo $row["instructor_Fname"] ?></td>
                    <td class="in_width"><?php echo $row["instructor_Lname"] ?></td>
                    <td class="">
                        <div id="accordion">
                        <?php
                            $instructor_id = $row["instructor_id"];
                            ?>
                            <div class="card card-outline" id="headingOne<?php echo $instructor_id ?>">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne<?php echo $instructor_id ?>" aria-expanded="true" aria-controls="collapseOne">
                                    >> View detail
                                    </button>
                                </h5>
                                <div id="collapseOne<?php echo $instructor_id ?>" class="collapse" aria-labelledby="headingOne<?php echo $instructor_id ?>" data-parent="#accordion">
                                    <div class="card-body">
                                        <?php echo $row["instructor_detail"] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="in_edit">
                        <a href="editInstructor.php?instructorID=<?php echo $instructor_id ?>" class="btn btn-sm btn-success cursor">
                            Edit
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a href="addNewInstructor.php" class="btn btn-primary btn-lg w-100 my-4">ADD New Instructor</a>
    </div>
</body>
</html>