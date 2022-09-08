<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/session.php");
Session::init();
include_once($filepath . "/../lib/database.php");
include_once($filepath . "/../lib/student.php");
include_once($filepath . "/../lib/management.php");
spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});
$db = new Database();
$student = new Student();
$management = new Management();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sudent Attendence</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery.min.js"> </script>
</head>

<body>
    <section class="header">
        <header>
            <nav class="nav justify-content-center navbar navbar-dark bg-primary">
                <div class="header-text">
                    <h1>Student Attendence System</h1>
                </div>
            </nav>
        </header>
    </section>