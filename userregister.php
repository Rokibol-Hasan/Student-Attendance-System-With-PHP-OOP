<?php
include_once("lib/database.php");
include_once("lib/management.php");
$db = new Database();
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
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg my-5 ">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Registration</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" id="loginForm">
                                        <span style="color:red;font-size:18px">
                                            <?php
                                            if (isset($_POST['register'])) {
                                                $managementRegistration = $management->managementRegistration($_POST);
                                            }
                                            if (isset($managementRegistration)) {
                                                echo $managementRegistration;
                                            }
                                            ?>
                                        </span>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="name" type="text" name="name" placeholder="John Doe" />
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="row justify-content-between form-group">
                                            <div class="form-floating mb-3 col-md-6 flex-column d-flex">
                                                <input class="form-control" id="email" type="text" name="email" placeholder="john@example.com" />
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="form-floating mb-3 col-md-6 flex-column d-flex">
                                                <select name="roll" class="form-select" aria-label="Default select example">
                                                    <option selected>Select Roll</option>
                                                    <option value="1">Teacher</option>
                                                    <option value="2">Adminstration</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" type="password" name="password" placeholder="" />
                                            <label for="password">Password</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary" name="register" type="submit" value="Register" />
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">Already Have An Account? Sign in!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
