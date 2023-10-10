<?php
if (session_start()) {
  if (isset($_SESSION['logedin'])) {
    header("Location: dashboard.php");
    exit;
  }
}

require_once "../inc/constants.inc.php";

require_once ABSPATH . '_config/dbconnect.php';

require_once ABSPATH . 'classes/site.class.php';
require_once ABSPATH . 'classes/user.class.php';
require_once ABSPATH . 'classes/admin.class.php';
require_once ABSPATH . 'classes/form.class.php';


$SiteInfo      = new SiteInfo();

$Site           = $SiteInfo->showSiteInfo();

$FAVICON    = $Site['favicon'];
$LOGO       = $Site['site_logo'];


require_once '../classes/admin.class.php';
require_once '../classes/services.class.php';
require_once '../classes/user.class.php';
require_once '../classes/site.class.php';


$Admin      = new Admin();
$Services   = new Services();
$User       = new User();

$errMsg = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  if (isset($_POST['loginBtn'])) {
    
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if (!filter_var($user, FILTER_VALIDATE_EMAIL)) {
      $userData  = $Admin->showAdminByuser($user);
      // var_dump($userData);
    }else{
      $userData = $Admin->showAdminByEmail($user);
      // var_dump($userData);
    }
    if ((count($userData) == 1 && count($userData) != 0)) {
      if (password_verify($pass, $userData[0]['password'])) {
        
        session_start();
        $_SESSION['logedin']    = true;
        $_SESSION['username']   = $userData[0]['username'];
        $_SESSION['email']      = $userData[0]['email'];
        $_SESSION['userid']     = $userData[0]['id'];

        header("Location: dashboard.php");
        exit;
      }else {
        $errMsg = "Incorrect Password";
      }
    }else {
      $errMsg = "Invalid username or email";
    }
    
  }
  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Login - <?php echo SITE_NAME?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= IMGURL.'logo/'.$FAVICON;?>" rel="icon">
    <link href="<?= IMGURL.'logo/'.$FAVICON;?>" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="../images/site-icons/icon.png" alt="">
                                    <span class="d-none d-lg-block"></span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <?php
                      if ($errMsg != null) {
                        echo '<p class="text-center text-danger text-small">'.$errMsg.'</p>';
                      }
                    ?>
                                    </div>

                                    <form class="row g-3 needs-validation" action="<?php echo $_SERVER["PHP_SELF"]?>"
                                        method="post" novalidate>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-person"></i></span>
                                                <input type="text" name="username" class="form-control"
                                                    id="yourUsername" required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>

                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="bi bi-key"></i></span>
                                                <input type="password" name="password" class="form-control"
                                                    id="yourPassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="loginBtn"
                                                type="submit">Login</button>
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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>