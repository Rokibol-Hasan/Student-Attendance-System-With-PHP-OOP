<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/session.php");
Session::checkLogin();
include_once($filepath . "/../lib/database.php");
?>
<?php

class Management
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function managementRegistration($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "<span class='error'>   Email Is Not Valid </span>";
            return $msg;
        }
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        $roll = mysqli_real_escape_string($this->db->link, $data['roll']);
        if ($name == '' || $email == '' || $password == '' || $roll == '') {
            $msg = "<span class='error'>   Field Must Not Be Empty </span>";
            return $msg;
        }
        $mailQuery = "SELECT * FROM tbl_management WHERE email = '$email' LIMIT 1";
        $mailCheck = $this->db->select($mailQuery);
        if ($mailCheck != false) {
            $msg = "<span class='error'>   This Email Already Exist </span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_management (name,email,password,roll)VALUES('$name','$email','" . MD5($password) . "','$roll' )";
            $insertmanagement = $this->db->insert($query);
            if ($insertmanagement) {
                echo "<script>alert('Registration successfull, Please login to your account.');window.location='login.php'</script>";
            }
        }
    }

    public function managementLogin($data)
    {
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = md5($data['password']);
        if ($email == '' || $password == '') {
            $msg = "<span class='error'> Field Must Not Be Empty </span>";
            return $msg;
        } else {
            $query = "SELECT * FROM tbl_management WHERE email = '$email' AND password = '" . MD5($password) . "'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("managementLogin", true);
                Session::set("managementId", $value['id']);
                Session::set("managementName", $value['name']);
                Session::set("managementRoll", $value['roll']);
                header("Location:index.php");
            } else {
                $msg = "<span class='error'>   Email Or Password Not Matched </span>";
                return $msg;
            }
        }
    }
    public function updatemanagementById($id, $data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "<span class='error'>   Email Is Not Valid </span>";
            return $msg;
        }
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        $roll = mysqli_real_escape_string($this->db->link, $data['roll']);
        if ($name == '' || $email == '' || $password == '' || $roll == '') {
            $msg = "<span class='error'>   Field Must Not Be Empty </span>";
            return $msg;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = "<span class='error'>   Email Is Not Valid </span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_management SET
            name = '$name',
            email = '$email',
            password = '" . MD5($password) . "',
            roll = '$roll'
            WHERE id = '$id' ";
            $updatemanagement = $this->db->update($query);
            if ($updatemanagement) {
                header("Location:profile.php");
            } else {
                $msg = "<span class='success'>Profile Not Updated </span>";
                return $msg;
            }
        }
    }
    public function getmanagementById($managementId)
    {
        $managementId = Session::get("managementId");
        $query = "SELECT * FROM tbl_management WHERE id = '$managementId'";
        $getmanagementInfo = $this->db->select($query);
        return $getmanagementInfo;
    }
    public function getmanagementInfo()
    {
        $managementId = Session::get("managementId");
        $query = "SELECT * FROM tbl_management WHERE id = '$managementId'";
        $getmanagementInfo = $this->db->select($query);
        return $getmanagementInfo;
    }
}
