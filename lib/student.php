<?php
$file_path = realpath(dirname(__FILE__));
include_once($file_path . '/database.php');



class Student
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllStudent()
    {
        $query = "SELECT * FROM tbl_student ORDER BY id ASC";
        $getAllStudent = $this->db->select($query);
        return $getAllStudent;
    }


    public function deleteStudent($id)
    {
        $delQuery = "DELETE FROM tbl_student WHERE id = '$id'";
        $delStudent = $this->db->delete($delQuery);
        if ($delStudent) {
            $msg = "<div class='alert alert-success' role='alert'>Student deleted successfully</div>";
            return $msg;
        }
    }


    public function insertStudent($value)
    {
        $name = mysqli_real_escape_string($this->db->link, $value['name']);
        $roll = mysqli_real_escape_string($this->db->link, $value['roll']);
        if ($name == '' || $roll == '') {
            $msg = "<div class='alert alert-warning' role='alert'>Field Must Not Be Empty</div>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_student (name,roll) VALUES('$name','$roll')";
            $insertStudent = $this->db->insert($query);

            $addRollQuery = "INSERT INTO tbl_attendence (roll) VALUES ('$roll')";
            $insertStudent = $this->db->insert($addRollQuery);
            if ($insertStudent) {
                $msg = "<div class='alert alert-success' role='alert'>Student Added Successfully</div>";
                return $msg;
            } else {
                $msg = "<div class='alert alert-warning' role='alert'>Something went wrong</div>";
                return $msg;
            }
        }
    }
    public function insertAttendence($currentDate, $getAtt = array())
    {
        $getDateQuery = "SELECT  DISTINCT att_time FROM tbl_attendence";
        $getTime = $this->db->select($getDateQuery);
        while ($result = $getTime->fetch_assoc()) {
            $db_date = $result['att_time'];
            if ($currentDate == $db_date) {
                $msg = "<div class='alert alert-warning' role='alert'>Attendence Taken Already</div>";
                return $msg;
            }
        }
        foreach ($getAtt as $att_key => $att_value) {
            if ($att_value == 'present') {
                $stuQuery = "INSERT INTO tbl_attendence(roll,attendence,att_time) VALUES('$att_key','present',now())";
                $dataInsert = $this->db->insert($stuQuery);
            } elseif ($att_value == 'absent') {
                $stuQuery = "INSERT INTO tbl_attendence(roll,attendence,att_time) VALUES('$att_key','absent',now())";
                $dataInsert = $this->db->insert($stuQuery);
            }
        }
        if ($dataInsert) {
            $msg = "<div class='alert alert-success' role='alert'>Attendence Submitted</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-warning' role='alert'>Attendence Not Submitted</div>";
            return $msg;
        }
    }

    public function getDate(){
        $getDateQuery = "SELECT  DISTINCT att_time FROM tbl_attendence";
        $getTime = $this->db->select($getDateQuery);
        return $getTime;
    }

    public function getAllData($dt){
        $query = "SELECT tbl_student.name, tbl_attendence.*
        FROM tbl_student
        INNER JOIN tbl_attendence
        ON tbl_student.roll = tbl_attendence.roll
        WHERE att_time = '$dt'
        ";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateAttendence($dt, $attendence = array())
    {
        foreach ($attendence as $att_key => $att_value) {
            if ($att_value == 'present') {
                $query = "UPDATE tbl_attendence 
                SET
                attendence = 'present' WHERE roll = '$att_key' AND att_time = '$dt'
                ";
                $updateAttendence = $this->db->update($query);

            } elseif ($att_value == 'absent') {
                $query = "UPDATE tbl_attendence 
                SET
                attendence = 'absent' WHERE roll = '$att_key' AND att_time = '$dt'
                ";
                $updateAttendence = $this->db->update($query);


            }
        }
        if ($updateAttendence) {
            $msg = "<div class='alert alert-success' role='alert'>Attendence Updated</div>";
            return $msg;
        } else {
            $msg = "<div class='alert alert-warning' role='alert'>Attendence Not Updated</div>";
            return $msg;
        }
    }




}
