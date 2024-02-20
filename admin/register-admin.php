<?php
require_once "../inc/constants.inc.php";
require_once ABSPATH . "_config/dbconnect.php";
require_once ABSPATH . "classes/admin.class.php";
require_once ABSPATH . 'classes/site.class.php';
require_once ABSPATH . 'classes/user.class.php';
require_once ABSPATH . 'classes/form.class.php';
require_once ABSPATH . 'classes/encrypt.inc.php';


$SiteInfo      = new SiteInfo();
$User          = new User();
$Admin         = new Admin();

$Site           = $SiteInfo->showSiteInfo();
$users          = $User->showUsers();

$FAVICON    = $Site['favicon'];
$LOGO       = $Site['site_logo'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register on Online Devs</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= IMGURL.'logo/'.$FAVICON;?>" rel="icon">
    <link href="<?= IMGURL.'logo/'.$FAVICON;?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= ADM_URL ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= ADM_URL ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= ADM_URL ?>assets/css/style.css" rel="stylesheet">

    <?php

    $msg  = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if (isset($_POST['register'])) {
    
            $fname    = $_POST['fname'];
            $lname    = $_POST['lname'];
            $username = $_POST['username'];
            $email    = $_POST['email'];
            $pass     = $_POST['password'];
            $v_pass   = $_POST['v-password'];
            
            if ($pass == $v_pass) {
        
                $exist = $Admin->showAdminByEmail($email);
                if (count($exist) == 0) {
                    
                    $pass       = md5_encrypt($pass, ADMIN_PASS);
                    
                    $added = $Admin->addAdmin($fname, $lname, $username, $email, $pass);

                    if ($added != 0) {
                        session_start();
                        $_SESSION['logedin']    = true;
                        $_SESSION['username']   = $username;
                        $_SESSION['email']      = $email;
                        $_SESSION['userid']     = $added;

                        header("Location: dashboard.php");
                        exit;
                    }
                }else{
                    $msg = "User With this email is already Exist!";
                }

            }else{
                $msg = "Verify Password Does Not matched!";
            }
    
        }
    }

    ?>
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="../images/site-icons/icon.png" alt="">
                                    <!-- <span class="d-none d-lg-block">NiceAdmin</span> -->
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Admin Account</h5>
                                        <?php
                                        if ($msg == null) {

                                            echo '<p class="text-center small">Enter required details to create account</p>';
                                        }else{
                                            echo '<p class="text-center text-danger small">'.$msg.'</p>';
                                        }
                                        ?>
                                    </div>

                                    <form class="row g-3 needs-validation" action="<?php echo $_SERVER["PHP_SELF"]?>"
                                        method="post" novalidate>
                                        <div class="col-12 col-md-6">
                                            <label for="yourName" class="form-label">First Name</label>
                                            <input type="text" name="fname" class="form-control" id="yourFName"
                                                required>
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label for="yourName" class="form-label">Last Name</label>
                                            <input type="text" name="lname" class="form-control" id="yourLName"
                                                required>
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-person"></i></span>
                                                <input type="email" name="email" class="form-control" id="yourEmail"
                                                    required>
                                                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-person"></i></span>
                                                <input type="text" name="username" class="form-control"
                                                    id="yourUsername" maxlength="12" autocomplete="off" required>
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label for="yourPassword" class="form-label">Verify Password</label>
                                            <input type="password" name="v-password" class="form-control" id="vPassword"
                                                onkeyup="passwordCheck(this.value);" required>
                                            <div class="text-danger d-none" id="checkPass">Verify Password Does Not
                                                Matched!</div>
                                        </div>

                                        <!-- <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div> -->
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="register" type="submit" id="btn" onclick="show()">Create Account</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../plugins/sweetalert/sweetalert2.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
    const passwordCheck = (vPass) => {

        let pass = document.getElementById('password').value;
        let errorMsg = document.getElementById('checkPass');

        if (vPass == pass) {
            errorMsg.classList.add('d-none');
        } else {
            errorMsg.classList.remove('d-none');
        }
    }
    </script>

</body>

</html>