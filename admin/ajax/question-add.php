<?php
require_once "../../_config/dbconnect.php";
require_once "../../classes/questions.class.php";
require_once "../../classes/categories.class.php";
require_once "../../classes/user.class.php";


$Question   = new Question();
$Category   = new Category();
$User       = new User();



$errMsg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['addBtn'])) {
     
    $subject   = $_POST['subName'];
    $dsc       = $_POST['dsc'];
    $catId     = $_POST['category-name'];
    $userId    = $_POST['asked-by'];
    $status    = 1;
  

    $added  = $Question->addQuestion($subject, $dsc, $catId, $userId, $status);
    // var_dump($added);
    if ($added == true) {
      $errMsg   = "Question Added!";
    }else {
      $errMsg   = "Insertion Failed!";
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
            <label for="category-name">Category Name</label>
            <select class="form-select mt-2" name="category-name" aria-label="Default select example">
                <?php 
                $cats = $Category->showCategories();
                foreach ($cats as $cat) {
                  ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
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
                <option value="<?php echo $user['user_id']; ?>"><?php echo $user['username']; ?></option>;
                <?php
                }
              ?>
            </select>
        </div>


        <div class="col-md-12">
            <div class="form-floating">
                <input type="text" class="form-control" name="subName" id="floatingName" placeholder="Category Name"
                    required>
                <label for="floatingName">Subject</label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" name="dsc" placeholder="Category Description" id="floatingTextarea"
                    style="height: 100px;"></textarea>
                <label for="floatingTextarea">Category Description</label>
            </div>
        </div>

        <div class="text-end">

            <!-- <button type="reset" class="btn btn-secondary"  OnClientClick="javascript:window.close()" >Cancel</button> -->
            <button type="submit" name="addBtn" class="btn btn-primary">Submit</button>

        </div>
    </form>

    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>
</body>

</html>
<!-- class="btn-close" data-bs-dismiss="modal" aria-label="Close" -->