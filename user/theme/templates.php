<?php
$q = isset($_GET['q']) ? $_GET['q'] : 'person';


// get person details
if (isset($_GET['graveno'])) {
    $sql = "SELECT * FROM tblpeople WHERE GRAVENO = '" . $_GET['graveno'] . "'";
    $mydb->setQuery($sql);
    $cur = $mydb->executeQuery();
    $numrows = $mydb->num_rows($cur);//get the number of count
    if ($numrows > 0) {
        # code... 
        $cur = $mydb->loadResultList();

        foreach ($cur as $res) {
            $name = $res->FNAME;
            $born = $res->BORNDATE;
            $died = $res->DIEDDATE;
            $location = $res->LOCATION;
            $section = $res->CATEGORIES;
            $graveno = $res->GRAVENO;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?= $title; ?> | Cemetery Mapping and Information System</title>
    <link rel="shortcut icon" href="<?= web_root; ?>template/assets/img/favicon.ico">
    <link rel="stylesheet" href="<?= web_root; ?>template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= web_root; ?>template/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= web_root; ?>template/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= web_root; ?>template/assets/css/style.css">

    <style>
        .logo{
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            line-height: 40px;
            padding: 0 20px;
            display: inline-block;
            margin: 0;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="header header-one">
            <!-- text logo -->
            <a href="index.php" class="navbar-brand"><img src="<?= web_root; ?>/img/logo.jpg" alt="logo" width="50" height="50"> User Panel</a>
            <ul class="nav nav-tabs user-menu">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="?q=reserve"><i class="fas fa-user me-2"></i>
                            Reserve Burial
                        </a>
                        <a class="dropdown-item" href="report.php"><i class="fas fa-user me-2"></i>
                            Report Issues
                        </a>
                    </div>
                </li> -->
                <li class="nav-item">
                    <!-- profile picture end -->
                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="user-img">
                            <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['U_NAME']; ?>&background=random&color=000&rounded=true&size=32&bold=true&format=svg"
                                alt="profile-img" width="36" class="img-circle">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>
                            <?= $_SESSION['U_NAME']; ?>
                        </a>
                        <a class="dropdown-item text-danger" href="javascript:void(0);" data-bs-toggle="modal"
                            data-bs-target="#logout-modal"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="page-wrapper">
            <div class="content container-fluid">
                <?php check_message(); ?>

                <?php if ($_GET['q'] == 'reserve') { ?>
                <div class="row">
                    <div class="col-xl-12 d-flex">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Reservation Form</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <?php check_message(); ?>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Grave No.</label>
                                        <div class="col-md-10">
                                            <input required type="number" class="form-control" name="graveno" placeholder="Grave No.">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Name</label>
                                        <div class="col-md-10">
                                            <input required type="text" class="form-control" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Born Date</label>
                                        <div class="col-md-10">
                                            <input required type="date" class="form-control" name="born" placeholder="Born Date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Died Date</label>
                                        <div class="col-md-10">
                                            <input required type="date" class="form-control" name="died" placeholder="Died Date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Section</label>
                                        <div class="col-md-10">
                                            <select class="form-select" name="section">
                                                <?php 
                                                    $sql = "SELECT * FROM tblcategory";
                                                    $mydb->setQuery($sql);
                                                    $cur = $mydb->executeQuery();
                                                    $numrows = $mydb->num_rows($cur);//get the number of count
                                                    if ($numrows > 0) {
                                                        # code... 
                                                        $cur = $mydb->loadResultList();

                                                        foreach ($cur as $res) {
                                                            echo '<option value="'.$res->CATEGORIES.'">'.$res->CATEGORIES.'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Location</label>
                                        <div class="col-md-10">
                                            <select class="form-select" name="location">
                                                <option value="Sangi">Sangi</option>
                                                <option value="Luray">Luray</option>
                                                <option value="Dumlog">Dumlog</option>
                                                <option value="Carmen">Carmen</option>
                                                <option value="Canlumampao">Canlumampao</option>
                                                <option value="Poog">Poog</option>
                                                <option value="Ibo">Ibo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 row">
                                        <button type="submit" class="btn btn-primary btn-block" name="reserve">Reserve</button>
                                    </div>
                                </form>

                                <?php 
                                    if (isset($_POST['reserve'])) {
                                        # code...
                                        $sql = "INSERT INTO tblpeople (FNAME, BORNDATE, DIEDDATE, LOCATION, CATEGORIES, GRAVENO) VALUES ('".$_POST['name']."', '".$_POST['born']."', '".$_POST['died']."', '".$_POST['location']."', '".$_POST['section']."', '".$_POST['graveno']."')";
                                        $mydb->setQuery($sql);
                                        $cur = $mydb->executeQuery();
                                        if ($cur) {
                                            # code...
                                            message('Reservation Success!', 'success');
                                            redirect('index.php?q=person');
                                        }else{
                                            message('Something went wrong!', 'error');
                                            redirect('index.php?q=person');
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <?php if (!isset($_GET['graveno'])) { ?>
                    <div class="col-xl-12 d-flex">
                        <?php if ($q == 'person') {
                            include $content;
                        } ?>
                    </div>
                    <?php } ?>
                    <?php if(isset($_GET['graveno'])){ ?>
                    <div class="col-xl-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <a href="index.php?q=person" class="btn btn-primary btn-sm float-end">Back</a>
                                <h6 class="card-title mb-0">
                                    Person Details <small class="text-muted">
                                </h6>
                                <h5 class="card-title">
                                    Name: <?= $name; ?>
                                </h5>
                                <h5 class="card-title">
                                    Plot #: <?= $graveno ?>
                                </h5>
                                <h5 class="card-title">
                                    Block #: <?= $section ?>
                                </h5>
                                <h5 class="card-title">
                                    Date of Birth: <?= $born; ?>
                                </h5>
                                <h5 class="card-title">
                                    Date of Death: <?= $died; ?>
                                </h5>
                            </div>
                            <div class="card-body">
                                <?php
                                include '../map.php';
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <?php if ($_GET['q'] == 'view-reserve') {
                    include $content;
                } ?>
            </div>
        </div>

        <!-- logout modal -->
        <div class="modal custom-modal fade bank-details" id="logout-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="form-header text-start mb-0">
                            <h4 class="mb-0">Logout</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="bank-inner-details">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <h5>Are you sure you want to logout?</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="bank-details-btn">
                            <a href="logout.php" class="btn bank-save-btn">Logout</a>
                            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn bank-cancel-btn me-2">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>

</html>