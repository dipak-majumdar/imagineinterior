<?php
session_start();
require_once "../_config/adminSession.php";

require_once '../_config/dbconnect.php';
require_once '../inc/constants.inc.php';

require_once '../classes/services.class.php';
require_once '../classes/projects.class.php';
require_once '../classes/date-utility.class.php';

$page = $_SERVER['PHP_SELF'];

$Services       = new Services();
$Projects       = new Projects();
$DateUtility    = new DateUtility();

$childServices   = $Services->showChildServices();
// $users = $User->showUsers();


?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>Sub Services - <?php echo SITE_NAME?></title>
      <meta content="" name="description">
      <meta content="" name="keywords">

      <!-- Favicons -->
      <link href="<?php echo FAVICON_PATH;?>" rel="icon">
      <link href="<?php echo APPL_FAV_PATH;?>" rel="apple-touch-icon">
      
      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link
          href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

      <!-- Template Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet">
      <link href="assets/css/custom-style.css" rel="stylesheet">
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
              <h1><?php echo ucfirst(str_replace('.php', '', basename($page))); ?></h1>
              <nav>
                  <ol class="breadcrumb">
                      <?php 
                            $repWords = array('\\', '\'', '*', '?', '"', '<', '>', '|', '+', '-', '.php');
                            $locs = explode('/', str_replace($repWords, ' ', ucfirst($page)));
                            foreach ($locs as $loc) {
                                if ($loc != null) {
                                    echo '
                                    <li class="breadcrumb-item">
                                    '.ucfirst($loc).'
                                    </li>
                                    ';
                                }
                            }
                        ?>
                  </ol>
              </nav>
          </div>
          <!-- End Page Title -->


          <section class="section dashboard">
              <div class="card p-2">

                  <!-- Services  Section Start  -->
                  <div class="card-header d-flex justify-content-between">
                      <span>Total Services is: <?php echo count($childServices); ?></span>
                      <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#mainModal"
                          onclick="addChildService();" id="addService">Add New</button>
                  </div>

                  <!-- responsive table start -->
                  <div class="table-responsive">
                      <table class="table datatable img_table">
                          <thead>
                              <tr>
                                  <th scope="col">Icon</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Parent</th>
                                  <th scope="col">Dsc</th>
                                  <th scope="col">Projects</th>
                                  <th scope="col">Created</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                            foreach ($childServices as $cat) {
                                $service = $Services->showServiceById($cat['parent_id']);
                                $projCount = $Projects->showProjectByChildServiceId($cat['id']);
                                $parentService = '';
                                if ($service != null) {
                                    $parentService  = $service['name'];
                                }    
                            ?>
                              <tr class="<?php if ($cat['status'] == 0) {
                                echo "bg-danger text-light";
                            }?>">
                                  <td class="align-middle">
                                      <img src="../images/services/<?php echo $cat['icon'];?>" alt=""
                                          class="td_thumnail">
                                  </td>
                                  <td class="align-middle"><?php echo $cat['name'];?></td>
                                  <td class="align-middle">
                                      <?php
                                      echo $parentService;
                                      ?>
                                  </td>
                                  <td class="align-middle"><?php echo substr($cat['dsc'], 0, 20);?>..</td>
                                  <td class="align-middle"><?php echo count($projCount);?></td>
                                  <td class="align-middle"><?php echo $DateUtility->numDate($cat['added_on']);?></td>
                                  <td class="align-middle">
                                      <a href="javascript:void();" class="btn btn-sm badge bg-success me-2"
                                          data-bs-toggle="modal" data-bs-target="#mainModal"
                                          onclick="viewItemInModal('<?php echo $cat['id'];?>')"><i class="bi bi-eye"></i>
                                      </a>
                                      <span
                                          class="btn btn-sm badge <?php if($cat['status'] == 0){echo 'bg-primary'; }else{ echo 'bg-danger';}?> "
                                          id="<?php echo $cat['id']; ?>"
                                          onclick="statusUpdate(this)"><i
                                              class="bi <?php if($cat['status'] == 0){echo 'bi-toggle2-off'; }else{ echo 'bi-toggle-on';}?>"></i>
                                      </span>
                                      <a href="javascript:void();" class="btn btn-sm badge bg-danger ms-2"
                                          id="<?php echo $cat['id'];?>" onclick="delChild(this)">
                                          <i class="bi bi-trash2"></i>
                                      </a>
                                  </td>
                              </tr>

                              <?php
                            }
                        ?>
                          </tbody>
                      </table>
                  </div>
                  <!-- responsive table end -->
              </div>
              <!-- Services  Section Start -->

          </section>
      </main>
      <!-- End #main -->

      <!-- Modal -->
      <div class="modal fade" id="mainModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="modal-body">
                      <!-- ... -->
                  </div>
              </div>
          </div>
      </div>

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
              class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->
      <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
      <script src="assets/vendor/tinymce/tinymce.min.js"></script>
      <script src="../vendors/ajax.custom-lib.js"></script>
      <script src="../vendors/jQuery/jquery-3.6.0.js"></script>


      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>

      <script>
      const addChildService = () => {
          document.getElementById('modalLabel').innerText = `Add New Service Name`;
          let url = 'ajax/child-services-add.php';
          document.getElementById('modal-body').innerHTML =
              `<iframe width="99%" height="550px" frameborder="0" allowtransparency="true" src="${url}"></iframe>`;
      }


      const viewItemInModal = (id) => {
          document.getElementById('modalLabel').innerText = `View Service`;
          let viewUrl = `ajax/child-services-update.php?id=${id}`;
          // alert(viewUrl);
          document.getElementById('modal-body').innerHTML =
              `<iframe width="99%" height="500px" frameborder="0" allowtransparency="true" src="${viewUrl}"></iframe>`;
      }



      const statusUpdate = (t) => {
          if (confirm("Are You Sure?")) {
              childId = t.id;
              $.ajax({
                  url: "ajax/child-services-status-update.ajax.php",
                  type: "POST",
                  data: {
                    childId: childId
                  },
                  success: function(response) {
                    if (response == 'deactivated') {
                          let aTag = document.getElementById(t.id);
                          aTag.classList.remove('bg-danger');
                          aTag.classList.add('bg-primary');

                          let icon = aTag.childNodes[0].classList;
                          icon.remove("bi-toggle-on");
                          icon.add("bi-toggle2-off");

                          // console.log(icon);
                          let tr = aTag.parentElement.parentElement;
                          tr.classList.add('bg-danger');
                          tr.classList.add('text-light');

                    }else if(response == 'activated'){
                        let aTag = document.getElementById(t.id);
                          aTag.classList.add('bg-danger');
                          aTag.classList.remove('bg-primary');

                          let icon = aTag.childNodes[0].classList;
                          icon.add("bi-toggle-on");
                          icon.remove("bi-toggle2-off");

                          let tr = aTag.parentElement.parentElement;
                          // tr.classList.remove('bg-danger');
                          // tr.classList.remove('text-light');
                          tr.classList.remove('bg-danger');
                          tr.classList.remove('text-light');
                    }else{
                            alert('Updation Failed!');

                        }
                  }
              });
          }
      }

      // delete categories 
      const delChild = (t) => {
          childId = t.id;
          if (confirm("Are You Sure Want to Delete?")) {

              $.ajax({
                  url: "ajax/child-service-delete.ajax.php",
                  type: "POST",
                  data: {
                      childId: childId,
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