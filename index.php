<?php
include "inc/header.php";
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
$currentDate = date('Y-m-d');
if (isset($_GET['delstu'])) {
  $id = $_GET['delstu'];
  $delStudent = $student->deleteStudent($id);
}

if (isset($_POST['submit'])) {
  $getAttend = $_POST['attend'];
  $insertAttendence = $student->insertAttendence($currentDate, $getAttend);
}

?>
<section class="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="attendence-card card card-default p-3 my-3">
          <div class="card-title">
            <?php
            if (isset($insertAttendence)) {
              echo $insertAttendence;
            }
            ?>
            <div class='alert alert-danger' style="display:none" role='alert'>Alert: Attendence Missing!</div>
            <div class="heading-text">
              <h3><i class="fa fa-list" aria-hidden="true"></i>
                Manage Attendence<h3>
                  <hr class="line-indicator">
            </div>
            <h2>
              <a class="btn btn-success" href="addstudent.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                Add Student</a>
              <a class="btn btn-success pull-right" href="dateview.php"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                View All</a>
            </h2>
          </div>
          <div class="current-date text-center">
            <strong>Date:<span><?php echo ' ' . $currentDate; ?></span></strong>
          </div>
        </div>
        <div class="card p-3 my-3">
          <?php
          if (isset($delStudent)) {
            echo $delStudent;
          }
          ?>
          <form class="form-group" action="" method="post">
            <table class="table table-striped">
              <tr>
                <th width="">Serial</th>
                <th width="">Student Name</th>
                <th width="">Student Roll</th>
                <th width="">Student Attendence</th>
                <th width="">Action</th>
              </tr>
              <?php
              $x = 1;
              $getStudent = $student->getAllStudent();
              if ($getStudent) {
                while ($result = $getStudent->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo  $x;
                        $x++; ?></td>
                    <td><?php echo $result['name']; ?></td>
                    <td><?php echo $result['roll']; ?></td>
                    <td>
                      <input type="radio" class="form-check-input" name="attend[<?php echo $result['roll'] ?>]" value="present"> P
                      <input type="radio" class="form-check-input" name="attend[<?php echo $result['roll'] ?>]" value="absent"> A
                    </td>
                    <td><a class="btn btn-danger" href="?delstu=<?php echo $result['id']; ?>">Remove</a></td>
                <?php }
              } ?>
                  </tr>
                  <!-- <tr>
                    <td colspan="5">
                      <input class="btn btn-primary pull-right" type="submit" name="submit" value="Submit">
                    </td>
                  </tr> -->
            </table>
            <input class="btn btn-primary pull-right" type="submit" name="submit" value="Submit">
          </form>
        </div>
      </div>
      <?php include "inc/right-sidebar.php"; ?>
    </div>
  </div>
</section>
<?php include "inc/footer.php"; ?>