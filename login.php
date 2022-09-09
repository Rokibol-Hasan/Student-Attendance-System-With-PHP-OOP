<?php
include_once("lib/database.php");
include_once("lib/management.php");
$db = new Database();
$management = new Management();
$login = Session::get("managementLogin");
if ($login == true) {
    header("Location:index.php");
}
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
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" id="loginForm">
                                        <?php
                                        if (isset($_POST['login'])) {
                                            $managementLogin = $management->managementLogin($_POST);
                                        }
                                        ?>
                                        <?php
                                        if (isset($managementLogin)) {
                                            echo $managementLogin;
                                        }
                                        ?>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" type="text" name="email" placeholder="name@example.com" />
                                            <label for="email">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary" name="login" type="submit" value="Login" />
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="userregister.php">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>