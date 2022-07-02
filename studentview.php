<?php
include "inc/header.php";
include "lib/student.php";
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("form").submit(function() {
            var roll = true;
            $(':radio').each(function() {
                name = $(this).attr('name');
                if (roll && !$(':radio[name = "' + name + '"]:checked').length) {
                    $('.alert').show();
                    roll = false;
                }
            });
            return roll;
        });
    });
</script>
<?php
$student = new Student();
$dt = $_GET['dt'];
if (isset($_POST['submit'])) {
    $attendence = $_POST['attend'];
    $updateAttendence = $student->updateAttendence($dt, $attendence);
}

?>
<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="attendence-card card p-3 my-3">
                    <div class="card-title">
                        <?php
                        if (isset($updateAttendence)) {
                            echo $updateAttendence;
                        }
                        ?>
                        <div class='alert alert-danger' style="display:none" role='alert'>Alert: Attendence Missing!</div>
                        <div class="heading-text">
                            <h3>Manage Attendence<h3>
                                    <hr class="line-indicator">
                        </div>
                        <h2>
                            <a class="btn btn-success" href="dateview.php"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back</a>
                        </h2>
                    </div>
                    <div class="current-date text-center">
                        <strong>Date:<span><?php echo ' ' . $dt; ?></span></strong>
                    </div>
                </div>
                <div class="card p-3 my-3">
                    <form class="form-group" action="" method="post">
                        <table class="table table-striped">
                            <tr>
                                <th width="">Serial</th>
                                <th width="">Student Name</th>
                                <th width="">Student Roll</th>
                                <th width="">Student Attendence</th>
                            </tr>
                            <?php
                            $x = 1;
                            $getAllData = $student->getAllData($dt);
                            if ($getAllData) {
                                while ($result = $getAllData->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo  $x;
                                            $x++; ?></td>
                                        <td><?php echo $result['name']; ?></td>
                                        <td><?php echo $result['roll']; ?></td>
                                        <td>
                                            <input type="radio" class="form-check-input" name="attend[<?php echo $result['roll'] ?>]" value="present" <?php if ($result['attendence'] == 'present') {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>> P
                                            <input type="radio" class="form-check-input" name="attend[<?php echo $result['roll'] ?>]" value="absent" <?php if ($result['attendence'] == 'absent') {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>> A
                                        </td>
                                <?php }
                            } ?>
                                    </tr>
                        </table>

                        <button class="btn btn-primary pull-right" type="submit" name="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</button>
                    </form>
                </div>
            </div>
            <?php include "inc/right-sidebar.php"; ?>
        </div>
    </div>
</section>
<?php include "inc/footer.php"; ?>