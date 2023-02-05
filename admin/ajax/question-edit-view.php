<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/questions.class.php";
require_once "../../classes/categories.class.php";
require_once "../../classes/user.class.php";


$Question   = new Question();
$Category   = new Category();
$User       = new User();

$errMsg = '';

$name = '';
$dsc  = '';
// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['id'])) {
     $catId   = $_GET['id'];

    $show  = $Question->showCatById($catId);
    // print_r($show);
    $id       = $show[0]['id'];
    $userId   = $show[0]['user_id'];
    $catId    = $show[0]['cat_id'];
    $name     = $show[0]['subject'];
    $dsc      = $show[0]['description'];
  }


  
  $errMsg = '';

  if (isset($_POST['updateBtn'])) {
    
    $id         = $_POST['ques-id'];
    $subject    = $_POST['subject'];
    $dsc        = $_POST['dsc'];
    $askedBy    = $_POST['asked-by'];
    $catId      = $_POST['category-name'];

    
    $update  = $Question->updateQues($id, $subject, $dsc, $askedBy, $catId);
    // var_dump($added);
    if ($update == true) {
      $errMsg   = "Category Update!";
    }else {
      $errMsg   = "Updation Failed!";
    }
  }

// }


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
    <form class="row g-3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="ques-id" value="<?php echo $id; ?>">

        <div class="col-12 col-sm-6">
            <label for="category-name">Category Name</label>
            <select class="form-select mt-2" name="category-name" aria-label="Default select example">
              <?php 
                $cats = $Category->showCategories();
                foreach ($cats as $cat) {
                  ?>
                  <option <?php if ($cat['id'] == $catId) { echo 'selected'; } ?> value="<?php echo $cat['id']; ?>" ><?php echo $cat['name']; ?></option>
                  <?php
                }
              ?>
            </select>
        </div>

        <div class="col-12 col-sm-6">
            <label for="asked-by">Asked By</label>
            <select class="form-select mt-2" name="asked-by" aria-label="Default select example">
              <?php 
                $users = $User->showUsers();
                foreach ($users as $user) {
                  ?>
                  <option <?php if ($user['user_id'] == $userId) { echo 'selected'; } ?> value="<?php echo $user['user_id']; ?>"><?php echo $user['username']; ?></option>;
                  <?php
                }
              ?>
            </select>
        </div>

        <div class="col-md-12">
            <div class="form-floating">
                <input value="<?php echo $name; ?>" type="text" class="form-control" name="subject" id="floatingName"
                    placeholder="Category Name" required>
                <label for="floatingName">Subject Name</label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" name="dsc" placeholder="Category Description" id="floatingTextarea"
                    style="height: 250px;"><?php echo $dsc; ?></textarea>
                <label for="floatingTextarea">Category Description</label>
            </div>
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