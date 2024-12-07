<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title><?= $title; ?> | Cemetery Mapping and Information System</title>
  <link rel="shortcut icon" href="<?= web_root; ?>template/assets/img/favicon.ico">
  <link rel="stylesheet" href="<?= web_root; ?>/template/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= web_root; ?>/template/assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?= web_root; ?>/template/assets/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?= web_root; ?>/template/assets/css/style.css">
</head>


<?php
admin_confirm_logged_in();
?>

<?php
$query = "SELECT * FROM tbltransaction WHERE TRANSTATUS = 'Pending'";
$mydb->setQuery($query);
$cur = $mydb->executeQuery();
$rowscount = $mydb->num_rows($cur);
$res = isset($rowscount) ? $rowscount : 0;

if ($res > 0) {
  $order = '<label  class="label label-danger">' . $res . '</label>';
} else {
  $order = '<label class="label label-danger">' . $res . '</label>';
}
?>

<body class="nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme mini-sidebar">

  <div class="main-wrapper">

    <div class="header header-one">
      <div class="header-left header-left-one">
        <a href="#" class="logo">
          <img src="../../img/logo.jpg" alt="Cemetery Mapping">
        </a>
        <a href="#" class="white-logo">
          <img src="../../img/logo-white.jpg" alt="Cemetery Mapping">
        </a>
        <a href="#" class="logo logo-small">
          <img src="../../img/logo.jpg" alt="Cemetery" width="30" height="30">
        </a>
      </div>
      <a href="javascript:void(0);" id="toggle_btn">
        <i class="fas fa-bars"></i>
      </a>
      <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
      </a>
      <ul class="nav nav-tabs user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
          <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
            <span>
              Add New
              <i class="fas fa-plus"></i>
            </span>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo web_root; ?>admin/person/index.php?view=add"><i data-feather="user" class="me-1"></i> Person</a>
            <a class="dropdown-item" href="<?php echo web_root; ?>admin/category/index.php?view=add"><i data-feather="list" class="me-1"></i> Block</a>
          </div>
        </li>

        <li class="nav-item dropdown has-arrow main-drop">
          <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
            <span class="user-img">
              <img title="profile image" src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['U_NAME']; ?>background=random&color=000&rounded=true&size=32&bold=true&length=1&format=svg">
              <span class="status online"></span>
            </span>
            <span>
              <?php echo $_SESSION['U_NAME']; ?>
            </span>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo web_root; ?>admin/user/index.php?view=edit&id=<?php echo $_SESSION['USERID']; ?>"><i data-feather="user" class="me-1"></i>
              Profile</a>
            <a class="dropdown-item" href="<?php echo web_root; ?>admin/logout.php"><i data-feather="log-out" class="me-1"></i>
              Logout</a>
          </div>
        </li>
      </ul>
    </div>

    <div class="sidebar" id="sidebar">
      <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
          <ul>
            <?php
            // get document title
            $title = isset($title) ? $title : 'Person';
            // echo $title;
            ?>
            <li class="menu-title"><span>Main</span></li>
            <li <?php echo (isset($title) && $title == 'Person') ? 'class="active"' : ''; ?>>
              <a href="<?php echo web_root; ?>admin/person/index.php"><i data-feather="users"></i> <span>Deceased Persons</span></a>
            </li>
            <li <?php echo (isset($title) && $title == 'Section') ? 'class="active"' : ''; ?>>
              <a href="<?php echo web_root; ?>admin/category/index.php"><i data-feather="list"></i> <span>Block</span></a>
            </li>
            <?php if ($_SESSION['U_ROLE'] == 'Administrator') { ?>
              <li <?php echo (isset($title) && $title == 'Users') ? 'class="active"' : ''; ?>>
                <a href="<?php echo web_root; ?>admin/user/index.php"><i data-feather="users"></i> <span>Manage Users</span></a>
              </li>
              <li <?php echo (isset($title) && $title == 'Report') ? 'class="active"' : ''; ?>>
                <a href="<?php echo web_root; ?>admin/report/index.php"><i data-feather="list"></i> <span>Report</span></a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="usermodal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" data-dismiss="modal" type="button">×</button>

            <h4 class="modal-title" id="myModalLabel">Profile Image.</h4>
          </div>

          <form action="<?php echo web_root; ?>admin/user/controller.php?action=photos" enctype="multipart/form-data" method="post">
            <div class="modal-body">
              <div class="form-group">
                <div class="rows">
                  <div class="col-md-12">
                    <div class="rows">
                      <img title="profile image" width="500" height="360" src="<?php echo web_root . 'admin/user/' . $singleuser->USERIMAGE ?>">

                    </div>
                  </div><br />
                  <div class="col-md-12">
                    <div class="rows">
                      <div class="col-md-8">

                        <input type="hidden" name="MIDNO" id="MIDNO" value="<?php echo $_SESSION['USERID']; ?>">
                        <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> <input id="photo" name="photo" type="file">
                      </div>

                      <div class="col-md-4"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary" name="savephoto" type="submit">Upload Photo</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="page-wrapper">
      <div class="content container-fluid">

        <!-- <div class="row">
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
              <div class="card-body"> -->
        <?php check_message();  ?>
        <?php require_once $content; ?>

        <!-- </div>
            </div>
          </div>
        </div> -->

      </div>
    </div>

  </div>


  <!-- jQuery -->
  <script src="<?php echo web_root; ?>admin/jquery/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo web_root; ?>admin/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="<?php echo web_root; ?>admin/js/metisMenu.min.js"></script>

  <script src="<?= web_root; ?>template/assets/js/jquery-3.6.0.min.js"></script>
  <script src="<?= web_root; ?>template/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= web_root; ?>template/assets/js/feather.min.js"></script>
  <script src="<?= web_root; ?>template/assets/plugins/moment/moment.min.js"></script>
  <script src="<?= web_root; ?>template/assets/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?= web_root; ?>template/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= web_root; ?>template/assets/plugins/select2/js/select2.min.js"></script>
  <script src="<?= web_root; ?>template/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= web_root; ?>template/assets/plugins/datatables/datatables.min.js"></script>
  <script src="<?= web_root; ?>template/assets/plugins/apexchart/apexcharts.min.js"></script>
  <script src="<?= web_root; ?>template/assets/plugins/apexchart/chart-data.js"></script>
  <script src="<?= web_root; ?>template/assets/js/script.js"></script>

  <script type="text/javascript">
    $('.list-deceased-datatable').DataTable({
      lengthMenu: [5, 10, 20, 50, 100, 200, 500],
    });
    $(".select2").select2();

    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {
      "placeholder": "mm/dd/yyyy"
    });
    //Money Euro
    $("[data-mask]").inputmask();


    $(document).ready(function() {
      $('#dash-table').DataTable({
        responsive: true,
        "sort": false
      });

      $('#example').DataTable({
        responsive: true,
        "sort": false
      });

    });

    $(document).on("click", ".DESIGNID", function() {
      // var id = $(this).attr('id');
      var proid = $(this).data('id')
      // alert(proid)
      $(".modal-body #proid").val(proid)

    });


    $(document).on("change", ".POSDESIGNID", function() {
      var pid = document.getElementById("DESIGNID").value;
      // alert(pid)
      $.ajax({ //create an ajax request to load_page.php
        type: "POST",
        url: "controller.php?action=addtocart",
        dataType: "text", //expect html to be returned  
        data: {
          PID: pid
        },
        success: function(data) {
          // alert(data);
          $("#showcart").html(data);
        }

      });

    });

    $(document).on("focusout", ".cartqty", function() {
      var pid = $(this).data('id');
      var qty = document.getElementById(pid + 'qty').value;
      // alert(pid);
      // alert(qty);
      $.ajax({ //create an ajax request to load_page.php
        type: "POST",
        url: "controller.php?action=editcart",
        dataType: "text", //expect html to be returned  
        data: {
          PID: pid,
          QTY: qty
        },
        success: function(data) {
          // alert(data);
          $("#showcart").html(data);
        }
      });

    });

    $(document).on("click", ".delcart", function() {
      var pid = $(this).data('id');
      // alert(pid)
      $.ajax({ //create an ajax request to load_page.php
        type: "POST",
        url: "controller.php?action=deletecart",
        dataType: "text", //expect html to be returned  
        data: {
          PID: pid
        },
        success: function(data) {
          // alert(data);
          $("#showcart").html(data);
        }

      });

    });

    $(document).on("click", ".cartqty", function() {
      $(this).select();
    });



    $('.date_pickerfrom').datetimepicker({
      format: 'mm/dd/yyyy',
      startDate: '01/01/2000',
      language: 'en',
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0

    });


    $('.date_pickerto').datetimepicker({
      format: 'mm/dd/yyyy',
      startDate: '01/01/2000',
      language: 'en',
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0

    });

    $('#date_picker').datetimepicker({
      format: 'mm/dd/yyyy',
      language: 'en',
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0,
      changeMonth: true,
      changeYear: true,
      yearRange: '1945:' + (new Date).getFullYear()
    });
  </script>

</body>
<footer>
  <div style="text-align: center;">Copyrignt &copy; Cemetery Mapping and Information System</div>
</footer>

</html>