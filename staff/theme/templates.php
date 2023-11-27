<?php

// set query parameter by default to home
$q = isset($_GET['q']) ? $_GET['q'] : 'home';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?= $title; ?> | Cemetery Mapping and Information System</title>
    <link rel="shortcut icon" href="<?= web_root; ?>/template/assets/img/favicon.png">
    <link rel="stylesheet" href="<?= web_root; ?>/template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= web_root; ?>/template/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= web_root; ?>/template/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= web_root; ?>/template/assets/css/style.css">
</head>


<?php
if (isset($_SESSION['gcCart'])){
  if (count($_SESSION['gcCart'])>0) {
    $cart = '<label class="label label-danger">'.count($_SESSION['gcCart']) .'</label>';
  } 
} 
 ?>
</head>

<body class="nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme">
  <div class="main-wrapper">
    <div class="header header-one">
        <div class="header-left header-left-one">
            <a href="index.php" class="logo">
              Staff Panel
            </a>
            <a href="index.php" class="white-logo">
              Staff Panel
            </a>
            <a href="index.php" class="logo logo-small">
            Staff
            </a>
        </div>
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <a class="mobile_btn" id="mobile_btn">
            <i class="fas fa-bars"></i>
        </a>
        <ul class="nav nav-tabs user-menu">
          <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <i class="fas fa-user"></i>
                        <span class="status online"></span>
                    </span>
                    <span>Staff</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php"><i data-feather="user" class="me-1"></i>
                        Profile</a>
                    <a class="dropdown-item" href="login.php"><i data-feather="log-out" class="me-1"></i>
                        Logout</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"><span>Main</span></li>
                    <li class="submenu">
                        <a href="#">
                          <i data-feather="clipboard"></i>
                          <span>Manage Grave</span>
                          <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="invoices.php">Create Grave</a></li>
                            <li><a href="payments.php">View List of Grave</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                          <i data-feather="info"></i>
                          <span>Issue Reports</span>
                          <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <!-- <li><a href="invoices.php">Create Issue Report</a></li> -->
                            <li><a href="reports.php">View List of Issue Report</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-1">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">Deceased Person</div>
                                    <div class="dash-counts">
                                        <p>1,642</p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar bg-5" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted mt-3 mb-0">
                              3 person died this week
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-2">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">Available Plot</div>
                                    <div class="dash-counts">
                                        <p>3,642</p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar bg-6" role="progressbar" style="width: 65%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted mt-3 mb-0">
                              There are 3,642 available plots
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title">Recent Issue Reports</h5>
                            </div>
                            <div class="col-auto">
                                <a href="reports.php" class="btn-right btn btn-sm btn-outline-primary">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                          <div class="row">
                            <div class="col-auto">
                                <i class="fas fa-circle text-success me-1"></i> Suggetion
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-circle text-warning me-1"></i> Complaint
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-circle text-danger me-1"></i> Request
                            </div>
                          </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Issue</th>
                                        <th>Created</th>
                                        <th>Type</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0);" class="text-dark fw-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a>
                                        </td>
                                        <td>5 Nov 2020</td>
                                        <td><span class="badge bg-success-light">Suggestion</span></td>
                                        <td>
                                            <div class="dropdown dropdown-action text-right">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="javascript:void(0);" class="dropdown-item"><i
                                                                class="fas fa-eye m-r-5"></i> View</a></li>
                                                    <li><a href="javascript:void(0);" class="dropdown-item"><i
                                                                class="fas fa-edit m-r-5"></i> Edit</a></li>
                                                    <li><a href="javascript:void(0);" class="dropdown-item"><i
                                                                class="fas fa-trash-alt m-r-5"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
 
  <script src="<?= web_root; ?>/template/assets/js/jquery-3.6.0.min.js"></script>
  <script src="<?= web_root; ?>/template/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= web_root; ?>/template/assets/js/feather.min.js"></script>
  <script src="<?= web_root; ?>/template/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= web_root; ?>/template/assets/plugins/apexchart/apexcharts.min.js"></script>
  <script src="<?= web_root; ?>/template/assets/plugins/apexchart/chart-data.js"></script>
  <script src="<?= web_root; ?>/template/assets/js/script.js"></script>

</body>

</html>