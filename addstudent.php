<?php
include "inc/header.php";
include "lib/student.php";
?>
<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="attendence-card card card-default p-3">
                    <div class="card-title">
                        <div class="heading-text">
                            <h3>Add Student<h3>
                                    <hr class="line-indicator">
                        </div>
                        <h2>
                            <a class="btn btn-success" href="index.php"><i class="fa fa-list" aria-hidden="true"></i>
                                Go to Attendence</a>
                            <a class="btn btn-success pull-right" href="dateview.php "><i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                                View All</a>
                        </h2>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    $student = new Student();
                    if (isset($_POST['submit'])) {
                        $insertStudent = $student->insertStudent($_POST);
                    }

                    ?>
                    <form class="form-group card p-3" action="" method="post">
                        <?php
                        if (isset($insertStudent)) {
                            echo $insertStudent;
                        }
                        ?>
                        <div class="form-group">
                            <label for="name">Student Name</label>
                            <input type="text" class="form-control" placeholder="Enter Student Name" name="name" id="name" />
                            <label for="roll">Student Roll</label>
                            <input type="text" class="form-control" placeholder="Enter Student Roll" name="roll" id="roll" />
                            <input type="submit" class="btn btn-primary pull-right my-3" value="Add Student" name="submit" />
                        </div>
                    </form>
                </div>
            </div>
            <?php include "inc/right-sidebar.php"; ?>
        </div>
    </div>
</section>
<?php include "inc/footer.php"; ?>