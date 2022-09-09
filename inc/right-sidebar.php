<div class="col-md-3">
    <div class="profile-sidebar">
        <div class="right-sidebar-title title">
            <h6 class="">Profile</h6>
        </div>
        <div class="profile-inner card">
            <div class="profile-icon">
                <i class="fa fa-3x fa-user-circle" aria-hidden="true"></i>
            </div>
            <div class="profile-description">
                <div class="profile-name">
                    <h3><?php echo Session::get("managementName") ?></h3>
                </div>
                <div class="profile-designation">
                    <p><i>
                            <?php
                            $roll = Session::get("managementRoll");
                            if ($roll == "1") {
                                echo "Teacher";
                            } elseif ($roll == "2") {
                                echo "Adminstrator";
                            }

                            ?>


                        </i></p>
                </div>
            </div>
            <?php
            if (isset($_GET['action']) && $_GET['action'] == "logout") {
                Session::destroy();
                header("Location:login.php");
            }
            ?>
            <div class="log">
                <ul>
                    <li>
                        <?php
                        $login = Session::get("managementLogin");
                        if ($login == false) { ?>
                            <a href="login.php">Login</a>
                        <?php } else { ?>
                            <a href="?action=logout">Logout</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="new-sign-up my-3">

            <?php if ($login == false) { ?>
                <h5><a href="userregister.php">Register Here</a></h5>
            <?php } ?>
        </div>
    </div>
</div>