<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/user.class.php";

$User   = new User();

$errMsg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['addBtn'])) {
     
    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $user    = $_POST['username'];
    $email   = $_POST['email'];
    $pass    = $_POST['password'];
    $v_pass  = $_POST['v-password'];
    $status  = 1;

    if ($pass == $v_pass) {
        $added  = $User->addUser($fname, $lname, $user, $email, $pass, $status);
        // var_dump($added);
        if ($added == true) {
            $errMsg   = "User Added!";
        }else {
            $errMsg   = "Insertion Failed!";
        }
    }else {
        $errMsg = "Verify Password Doesn't Matched!";
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.css">
</head>

<body class="p-2">
    <?php
  if ($errMsg != null) {
    echo '<div class="text-center text-primary bg-warning border-start border-primary border-4 mb-4 py-1 fw-semibold">
          '.$errMsg.'
          </div>';
  }
  ?>
    <form class="row g-3" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="col-12 col-sm-6">
            <div class="form-floating">
                <input type="text" class="form-control" name="fname" id="floatingName" placeholder="First Name"
                    required>
                <label for="floatingName">First Name</label>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="form-floating">
                <input type="text" class="form-control" name="lname" id="floatingName" placeholder="Last Name" required>
                <label for="floatingName">Last Name</label>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="form-floating">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                <label for="floatingName">Username</label>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="form-floating">
                <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" required>
                <label for="floatingName">Email Address</label>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="form-floating">
                <input type="text" class="form-control" name="password" id="password" placeholder="Password" required>
                <label for="floatingName">Password</label>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="form-floating">
                <input type="text" class="form-control" name="v-password" id="v-password" placeholder="Verify Password"
                    required>
                <label for="floatingName">Verify Password</label>
            </div>
        </div>

        <div class="text-end">

            <button type="button" class="btn btn-secondary" OnClientClick="javascript:close_window()">Cancel</button>
            <button type="submit" name="addBtn" class="btn btn-primary">Submit</button>

        </div>
    </form>

    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
</body>

</html>
<!-- class="btn-close" data-bs-dismiss="modal" aria-label="Close" -->