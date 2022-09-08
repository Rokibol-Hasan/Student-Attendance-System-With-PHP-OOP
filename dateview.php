<?php
include "inc/header.php";
?>
<?php
$currentDate = date('Y-m-d');
?>
<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="attendence-card card card-default p-3 my-3">
                    <div class="card-title">
                        <div class="heading-text">
                            <h3><i class="fa fa-calendar" aria-hidden="true"></i>
                                See Attendance By Date<h3>
                                    <hr class="line-indicator">
                        </div>
                        <h2>
                            <a class="btn btn-info pull-right" href="index.php"><i class="fa fa-list" aria-hidden="true"></i>
                                Go To Attendance</a>
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
                                        <td><a class="btn btn-info" href="studentview.php?dt=<?php echo $result['att_time'] ?>"><i class="fa fa-eye" aria-hidden="true"></i>
                                                View</a></td>
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