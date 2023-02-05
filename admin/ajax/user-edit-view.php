<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/user.class.php";

$User   = new User();

$errMsg = '';

$name = '';
$dsc  = '';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['id'])) {
     $userId   = $_GET['id'];

    $show  = $User->showUsserById($userId);
    
    $userId     = $show[0]['user_id'];
    $userFname  = $show[0]['fname'];
    $userLname  = $show[0]['lname'];
    $userName   = $show[0]['username'];
    $userEmail  = $show[0]['email'];
    $userPass   = $show[0]['password'];
    $userStatus = $show[0]['status'];
    $userEdited = $show[0]['edit_time'];
    $userRegs   = $show[0]['reg_time'];

    // $name = $show[0]['name'];
    // $dsc  = $show[0]['descreption'];

    // echo $url = $_SERVER['PHP_SELF'].'?id='.$catId;
    
  }


  
  $errMsg = '';

  if (isset($_GET['updateBtn'])) {
    
    $catId  = $_GET['cat-id'];
    $name   = trim($_GET['catName']);
    $dsc    = trim($_GET['catDsc']);
    
    $update  = $Category->updateCat($catId, $name, $dsc);
    // var_dump($added);
    if ($update == true) {
      $errMsg   = "Category Update!";
    }else {
      $errMsg   = "Updation Failed!";
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
    <form class="row g-3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="col-12 col-sm-6">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>">
            <div class="form-floating">
                <input value="<?php echo $userFname; ?>" type="text" class="form-control" name="userFname"
                    id="floatingName" placeholder="First Name" required>
                <label for="floatingName">First Name</label>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="form-floating">
                <input value="<?php echo $userLname; ?>" type="text" class="form-control" name="userLname"
                    id="floatingName" placeholder="Last Name" required>
                <label for="floatingName">Last Name</label>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="form-floating">
                <input value="<?php echo $userName; ?>" type="text" class="form-control" name="username"
                    id="floatingName" placeholder="Username" required>
                <label for="floatingName">Userame</label>
            </div>
        </div>
        
        <div class="col-12 col-sm-6">
            <div class="form-floating">
                <input value="<?php echo $userEmail; ?>" type="text" class="form-control" name="userEmail"
                    id="floatingName" placeholder="User Name" required>
                <label for="floatingName">Last Name</label>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option <?php if ($userStatus == 1) { echo 'selected'; } ?> value="1">Active</option>
                    <option <?php if ($userStatus == 0) { echo 'selected'; } ?> value="0">Suspended/Cancled</option>
                </select>
                <label for="floatingSelect">User Status</label>
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="form-floating">
                <input type="text" class="form-control" name="new-password"
                    id="floatingName" placeholder="New Password" minlength="12">
                <label for="floatingName">New Password</label>
            </div>
        </div>
        
        <div class="col-12 d-flex justify-content-evenly">
            <p>Last Edited: <br> <b><?php echo date("d-m-Y  : H:sa", strtotime($userEdited)); ?></b></p>
            <p>Registered: <br> <b><?php echo date("d-m-Y  : H:sa", strtotime($userRegs)); ?></b></p>
        </div>


        <div class="text-end">

            <!-- <button type="reset" class="btn btn-secondary"  OnClientClick="javascript:window.close()" >Cancel</button> -->
            <button type="submit" name="updateBtn" class="btn btn-primary">Update</button>

        </div>
    </form>

    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
</body>

</html>
<!-- class="btn-close" data-bs-dismiss="modal" aria-label="Close" -->