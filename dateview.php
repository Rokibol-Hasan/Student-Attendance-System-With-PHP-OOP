<?php
include "inc/header.php";
include "lib/student.php";
?>
<?php
$currentDate = date('Y-m-d');
$student = new Student();
?>
<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="attendence-card card card-default p-3 my-3">
                    <div class="card-title">
                        <div class="heading-text">
                            <h3>Manage Attendence<h3>
                            <hr class="line-indicator">
                        </div>
                        <h2>
                            <a class="btn btn-info pull-right" href="index.php">View All</a>
                        </h2>
                    </div>
                    <div class="current-date text-center">
                        <strong>Date:<span><?php echo ' ' . $currentDate; ?></span></strong>
                    </div>
                </div>
                <div class="card p-3 my-3">
                    <form class="form-group" action="" method="post">
                        <table class="table table-striped">
                            <tr>
                                <th>Serial</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $x = 1;
                            $getDate = $student->getDate();
                            if ($getDate) {
                                while ($result = $getDate->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo  $x;
                                            $x++; ?></td>
                                        <td><?php echo $result['att_time']; ?></td>
                                        <td><a class="btn btn-info" href="studentview.php?dt=<?php echo $result['att_time'] ?>">View</a></td>
                                <?php }
                            } ?>
                                </tr>
                        </table>
                    </form>
                </div>
            </div>
            <?php include "inc/right-sidebar.php"; ?>
        </div>
    </div>
</section>
<?php include "inc/footer.php"; ?>