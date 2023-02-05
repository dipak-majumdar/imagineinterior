  <!-- ======================================================
  * Author Name : Dipak Majumdar
  * Author URL  :
  * Site        : onlinedevs.com
  * Year        : 20222
  ======================================================== -->

  <?php
session_start();
require_once "../_config/adminSession.php";

require_once '../_config/dbconnect.php';
require_once '../inc/constants.inc.php';

// require_once '../classes/categories.class.php';
require_once '../classes/user.class.php';

$page = 'user';

$User   = new User();
// $User       = new User();

$users   = $User->showUsers();
// $users = $User->showUsers();


?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>Categories - <?php echo SITE_NAME?></title>
      <meta content="" name="description">
      <meta content="" name="keywords">

      <!-- Favicons -->
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link
          href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
      <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
      <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

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

      <!-- ======= Header ======= -->
      <?php require_once 'partials/top-bar.php';?>
      <!-- End Header -->

      <!-- ======= Sidebar ======= -->
      <?php require_once 'partials/sidebar.php';?>
      <!-- ====== End Sidebar ===== -->

      <main id="main" class="main">


          <div class="pagetitle">
              <h1><?php echo ucfirst($page); ?></h1>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active"><?php echo ucfirst($page); ?></li>
                  </ol>
              </nav>
          </div>
          <!-- End Page Title -->


          <section class="section dashboard">
              <div class="card p-2">
                  <div class="card-header d-flex justify-content-between">
                      <span>Total Users is: <?php echo count($users)?> </span>
                      <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#mainModal"
                          onclick="addUser();" id="addUser">Add New</button>
                  </div>
                  <div class="table-responsive">
                      <!-- Table with stripped rows -->
                      <table class="table datatable">
                          <thead>
                              <tr>
                                  <th scope="col">SL</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Username</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Created</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php

                    $sl = 1; 
                        foreach ($users as $user) { 
                    ?>
                              <tr class="<?php if ($user['status'] == 0) {
                                echo "bg-danger text-light";
                            }?>">
                                  <th scope="row"><?php echo $sl++;?></th>
                                  <td><?php echo $user['fname'].' '.$user['lname'];?></td>
                                  <td><?php echo $user['username'];?></td>
                                  <td><?php echo $user['email'];?></td>
                                  <td><?php echo date("d-m-Y", strtotime($user['reg_time']));?></td>
                                  <td>
                                      <a href="javascript:void();" class="btn btn-sm badge bg-success me-2"
                                          data-bs-toggle="modal" data-bs-target="#mainModal"
                                          onclick="catView('<?php echo $user['user_id'];?>')"><i class="bi bi-eye"></i>
                                      </a>
                                      <a href="javascript:void();"
                                          class="btn btn-sm badge <?php if($user['status'] == 0){echo 'bg-primary'; }else{ echo 'bg-danger';}?> "
                                          id="<?php echo $user['user_id']; ?>"
                                          <?php if($user['status'] != 0){ echo 'onclick="cancelUser(this)"';}else { echo 'onclick="activeUser(this)"';}?>><i
                                              class="bi <?php if($user['status'] == 0){echo 'bi-toggle2-off'; }else{ echo 'bi-toggle-on';}?>"></i>
                                      </a>
                                      <a href="javascript:void();" class="btn btn-sm badge bg-danger ms-2"
                                          id="<?php echo $user['user_id'];?>" onclick="userDel(this)">
                                          <i class="bi bi-trash2"></i>
                                      </a>
                                  </td>
                              </tr>

                              <?php
                            }
                        ?>
                          </tbody>
                      </table>
                      <!-- End Table with stripped rows -->
                  </div>
              </div>
          </section>

      </main><!-- End #main -->

      <!-- Modal -->
      <div class="modal fade" id="mainModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="modal-body">
                      ...
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
              </div>
          </div>
      </div>

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
              class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->
      <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- <script src="assets/vendor/chart.js/chart.min.js"></script> -->
      <!-- <script src="assets/vendor/echarts/echarts.min.js"></script> -->
      <!-- <script src="assets/vendor/quill/quill.min.js"></script> -->
      <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
      <script src="assets/vendor/tinymce/tinymce.min.js"></script>
      <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
      <!-- <script src="../plugins/ajax.custom-lib.js"></script> -->
      <script src="../plugins/jQuery/jquery-3.6.0.js"></script>

      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>

      <script>
      const addUser = () => {
          document.getElementById('modalLabel').innerText = `Add New User`;
          let url = 'ajax/user-add.php';
          document.getElementById('modal-body').innerHTML =
              `<iframe width="99%" height="300px" frameborder="0" allowtransparency="true" src="${url}"></iframe>`;
      }


      const catView = (id) => {
          document.getElementById('modalLabel').innerText = `View & Edit User`;
          let viewUrl = `ajax/user-edit-view.php?id=${id}`;
          // alert(viewUrl);
          document.getElementById('modal-body').innerHTML =
              `<iframe width="99%" height="360px" frameborder="0" allowtransparency="true" src="${viewUrl}"></iframe>`;
      }



      const cancelUser = (t) => {

          if (confirm("Are You Sure?")) {
              // apntID = $(this).data("id");
              userId = t.id;

              $.ajax({
                  url: "ajax/user-cancel.php",
                  type: "POST",
                  data: {
                      userId: userId,
                      status: 0
                  },
                  success: function(data) {
                      // alert(data);
                      if (data == 1) {
                          let aTag = document.getElementById(t.id);
                          aTag.classList.remove('bg-danger');
                          aTag.classList.add('bg-primary');

                          aTag.setAttribute("onClick", "activeUser(this);");

                          let icon = aTag.childNodes[0].classList;

                          icon.remove("bi-toggle-on");
                          icon.add("bi-toggle2-off");

                          let tr = aTag.parentElement.parentElement;
                          tr.classList.add('bg-danger');
                          tr.classList.add('text-light');

                      } else {
                          alert('Updation Failed!');
                      }
                  }
              });
          }
      }


      const activeUser = (t) => {

          if (confirm("Are You Sure?")) {
              // apntID = $(this).data("id");
              userId = t.id;

              $.ajax({
                  url: "ajax/user-cancel.php",
                  type: "POST",
                  data: {
                      userId: userId,
                      status: 1
                  },
                  success: function(data) {
                      if (data == 1) {
                          let aTag = document.getElementById(t.id);
                          aTag.classList.add('bg-danger');
                          aTag.classList.remove('bg-primary');
                          aTag.setAttribute("onClick", "cancelUser(this);");

                          let icon = aTag.childNodes[0].classList;

                          icon.add("bi-toggle-on");
                          icon.remove("bi-toggle2-off");

                          let tr = aTag.parentElement.parentElement;
                          tr.classList.remove('bg-danger');
                          tr.classList.remove('text-light');

                      } else {
                          alert('Updation Failed!');
                      }
                  }
              });
          }
      }


      // delete categories 
      const userDel = (t) => {
        userId = t.id;
          if (confirm("Are You Sure Want to Delete?")) {

              $.ajax({
                  url: "ajax/user-delete.php",
                  type: "POST",
                  data: {
                      userId: userId,
                  },
                  success: function(data) {

                      if (data.includes('true')) {
                          let aTag = document.getElementById(t.id);

                          let tr = aTag.parentElement.parentElement;
                          tr.style.display = 'none';
                      } else {
                          alert('Can Not Deleted!');
                      }
                  }
              });
          }
      }
      </script>

  </body>

  </html>