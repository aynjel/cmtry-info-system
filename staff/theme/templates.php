<?php
error_reporting(0);
// set query parameter by default to home
$q = isset($_GET['q']) ? $_GET['q'] : 'home';

$sql = "SELECT * FROM tblpeople";
$mydb->setQuery($sql);
$cur = $mydb->executeQuery();
$deceased = $mydb->loadResultList();

$max = 300;

?>

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

</head>

<body>
    <div class="main-wrapper">
        <div class="header header-one">
            <!-- text logo -->
            <a href="index.php" class="navbar-brand"><img src="<?= web_root; ?>/img/logo.jpg" alt="logo" width="50" height="50"> Staff Panel</a>
            <ul class="nav nav-tabs user-menu">
                <li class="nav-item">
                    <!-- view map button -->
                    <a class="nav-link" href="index.php?q=map">
                        <i class="fas fa-map-marker-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- add new people button modal -->
                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="modal" data-bs-target="#add-people-modal">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-img">
                            <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['U_NAME']; ?>&background=random&color=000&rounded=true&size=32&bold=true&format=svg" alt="profile-img" width="36" class="img-circle">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>
                            <?= $_SESSION['U_NAME']; ?>
                        </a>
                        <a class="dropdown-item text-danger" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#logout-modal"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <!-- Deceased Person -->
                    <div class="col-xl-4 col-sm-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-1">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Deceased Person</div>
                                        <div class="dash-counts">
                                            <p><?= count($deceased); ?>
                                                <?php if ($_GET['q'] != 'person-list') { ?>
                                                    <a href="index.php?q=person-list" class="btn btn-sm btn-outline-primary ms-4">View
                                                        All</a>
                                                <?php } ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <?php
                                    $percent = (count($deceased) / $max) * 100;
                                    ?>
                                    <div class="progress-bar bg-5" role="progressbar" style="width: <?= $percent; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0">
                                    There are <?= count($deceased); ?> deceased person
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Plot Location -->
                    <div class="col-xl-4 col-sm-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <div class="dash-count">
                                        <?php
                                        $sql = "SELECT * FROM tblpeople";
                                        $mydb->setQuery($sql);
                                        $cur = $mydb->executeQuery();
                                        $plot = $mydb->loadResultList();
                                        $total = $max - count($plot);
                                        ?>
                                        <div class="dash-title">Plot Location</div>
                                        <div class="dash-counts">
                                            <p><?= $total; ?>
                                                <?php if ($_GET['q'] != 'plot-location' && $_GET['q'] != 'reserved-plot') { ?>
                                                    <a href="index.php?q=plot-location" class="btn btn-sm btn-outline-primary ms-4">View
                                                        All</a>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <?php
                                    $percent = $total / 100;
                                    ?>
                                    <div class="progress-bar bg-6" role="progressbar" style="width: <?= $percent; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0">
                                    There are <?= $total; ?> plot location available
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Reports Information -->
                    <div class="col-xl-4 col-sm-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-3">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-count">
                                            <?php
                                            $sql = "SELECT * FROM tblreport";
                                            $mydb->setQuery($sql);
                                            $cur = $mydb->executeQuery();
                                            $res = $mydb->loadResultList();
                                            $total = count($res);
                                            ?>
                                            <div class="dash-title">Reports Issue</div>
                                            <div class="dash-counts">
                                                <p><?= $total; ?>
                                                    <?php if ($_GET['q'] != 'reports' && $_GET['q'] != 'report-view') { ?>
                                                        <a href="index.php?q=reports" class="btn btn-sm btn-outline-primary ms-4">View
                                                            All</a>
                                                    <?php } ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <?php
                                    $percent = $total / 100;
                                    ?>
                                    <div class="progress-bar bg-6" role="progressbar" style="width: <?= $percent; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0">
                                    There are <?= $total; ?> reports issue
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($q == 'reserved-plot' && isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tblreserve WHERE id = '$id'";
                    $mydb->setQuery($sql);
                    $cur = $mydb->executeQuery();
                    $reserved = $mydb->loadSingleResult(); ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title">Reserved Plot Information</h5>
                                    <span class="badge bg-<?= $reserved->status == 'Pending' ? 'warning' : ($reserved->status == 'Approved' ? 'success' : 'danger'); ?>"><?= $reserved->status; ?></span>
                                </div>
                                <div class="col-auto">
                                    <a href="index.php?q=plot-location" class="btn btn-sm btn-outline-primary">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-sm-12 col-12">
                                    <div class="row">
                                        <p class="text-muted mb-3">Information about reserved plot.</p>
                                        <div class="col-lg-2 col-md-2">
                                            <div class="form-group">
                                                <label>Ref ID</label>
                                                <input type="text" class="form-control" value="<?= $reserved->id; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <div class="form-group">
                                                <label>Plot Number</label>
                                                <input type="text" class="form-control" value="<?= $reserved->graveno; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <div class="form-group">
                                                <label>Block</label>
                                                <input type="text" class="form-control" value="<?= $reserved->block; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control" value="<?= $reserved->location; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="text" class="form-control" value="<?= date_format(date_create($reserved->created_at), 'l, F d, Y'); ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <p class="text-muted mb-3">Information about the person who reserved the plot.</p>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" value="<?= $reserved->email; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="text" class="form-control" value="<?= $reserved->mobile_number; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <p class="text-muted mb-3">Update status of reserved plot.</p>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <form method="POST">
                                                    <label>Status</label>
                                                    <!-- form to update status -->
                                                    <?php
                                                    if (isset($_POST['status'])) {
                                                        $status = $_POST['status'];
                                                        $sql = "UPDATE tblreserve SET status = '$status' WHERE id = '$id'";
                                                        $mydb->setQuery($sql);
                                                        $cur = $mydb->executeQuery();

                                                        if ($cur) {
                                                            echo '<script>alert("Status Updated Successfully!")</script>';
                                                            echo '<script>window.location.href = "index.php?q=reserved-plot&id=' . $id . '#sel";</script>';
                                                        } else {
                                                            echo '<script>alert("Something went wrong!")</script>';
                                                            echo '<script>window.location.href = "index.php?q=reserved-plot&id=' . $id . '#sel";</script>';
                                                        }
                                                    }

                                                    // disable is if status is approved
                                                    if ($reserved->status == 'Approved') {
                                                        echo '<input type="text" class="form-control" value="' . $reserved->status . '" disabled>';
                                                    } else { ?>
                                                        <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="this.form.submit()" id="sel">
                                                            <option hidden selected>Select Status</option>
                                                            <option value="Contacted" <?= $reserved->status == 'Contacted' ? 'selected' : ''; ?>>Contacted</option>
                                                            <option value="Approved" <?= $reserved->status == 'Approved' ? 'selected' : ''; ?>>Approved</option>
                                                            <option value="Declined" <?= $reserved->status == 'Declined' ? 'selected' : ''; ?>>Declined</option>
                                                        </select>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- deceased person from reserved plot -->
                    <div class="row">
                        <div class="col-12">
                            <?php
                            $sql = "SELECT * FROM tblpeople WHERE GRAVENO = '" . $reserved->graveno . "'";
                            $mydb->setQuery($sql);
                            $cur = $mydb->executeQuery();
                            $numrows = $mydb->num_rows($cur); ?>
                            <?php if ($numrows > 0) {
                                $cur = $mydb->loadSingleResult(); ?>
                                
                                <div class="card flex-fill bg-white">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Deceased Person Information on this Plot</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Name: <?= $cur->FNAME; ?></li>
                                            <li class="list-group-item">Born Date: <?= date_format(date_create($cur->BORNDATE), 'l, F d, Y'); ?></li>
                                            <li class="list-group-item">Died Date: <?= date_format(date_create($cur->DIEDDATE), 'l, F d, Y'); ?></li>
                                            <li class="list-group-item">Years Buried: <?= date_diff(date_create($cur->BORNDATE), date_create($cur->DIEDDATE))->y; ?> years</li>
                                            <!-- <li class="list-group-item">Address: <?= $cur->LOCATION; ?></li> -->
                                        </ul>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>

                <?php } elseif($q == 'plot-location'){?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title">Reserved Plot</h5>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <a href="reports.php" class="btn-right btn btn-sm btn-outline-primary">
                                                View All
                                            </a>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover datatable">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Plot Number</th>
                                                    <th>Block</th>
                                                    <th>Location</th>
                                                    <th>Reserved Date</th>
                                                    <th>Status</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $sql = "SELECT * FROM tblreserve";
                                                $mydb->setQuery($sql);
                                                $cur = $mydb->executeQuery();
                                                $reserved = $mydb->loadResultList();
                                                
                                                if ($reserved) {
                                                    foreach ($reserved as $res) {
                                                        echo '<tr>';
                                                        echo '<td>' . $res->id . '</td>';
                                                        echo '<td>' . $res->graveno . '</td>';
                                                        echo '<td>' . $res->block . '</td>';
                                                        echo '<td>' . $res->location . '</td>';
                                                        echo '<td>' . date_format(date_create($res->created_at), 'l, F d, Y') . '</td>';
                                                        if ($res->status == 'Pending') {
                                                            echo '<td><span class="badge bg-warning">' . $res->status . '</span></td>';
                                                        } else if ($res->status == 'Approved') {
                                                            echo '<td><span class="badge bg-success">' . $res->status . '</span></td>';
                                                        } else {
                                                            echo '<td><span class="badge bg-danger">' . $res->status . '</span></td>';
                                                        }
                                                        echo '<td class="text-right">';
                                                        echo '<a href="?q=reserved-plot&id=' . $res->id .'" class="btn btn-sm btn-outline-primary">';
                                                        echo '<i class="far fa-eye me-1"></i> View';
                                                        echo '</a>';
                                                        echo '</td>';
                                                        echo '</tr>';
                                                    }
                                                } else {
                                                    echo '<tr>';
                                                    echo '<td colspan="7" style="text-align:center">No Record Found!</td>';
                                                    echo '</tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } elseif ($q == 'person-list') {
                    $location = isset($_POST['location']) ? $_POST['location'] : '';
                    $search = isset($_POST['search']) ? $_POST['search'] : '';
                    $sql = "SELECT * FROM tblpeople";
                    $mydb->setQuery($sql);
                    $cur = $mydb->executeQuery();
                    $numrows = $mydb->num_rows($cur); ?>
                    <div class="row">
                        <div class="col-12">
                            <?php if ($numrows > 0) {
                                # code... 
                                $cur = $mydb->loadResultList();

                                echo '<div class="card card-table">';
                                echo '<div class="card-header">';
                                echo '<div class="row">';
                                echo '<div class="col col-sm-12">';
                                echo '<h5 class="card-title">Deceased Person</h5>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="card-body">';
                                echo '<div class="table-responsive">';
                                echo '<table class="table table-hover table-center mb-0 datatable">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th>Plot Number</th>';
                                echo '<th>Block Number</th>';
                                echo '<th>Location</th>';
                                echo '<th>Name</th>';
                                echo '<th>Years Buried</th>';
                                echo '<th>Born</th>';
                                echo '<th>Died</th>';
                                // echo '<th></th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';

                                foreach ($cur as $res) {

                                    $age = date_diff(date_create($res->BORNDATE), date_create($res->DIEDDATE))->y;

                                    echo '<tr>';
                                    echo '<td><span class="text-primary"># ' . $res->GRAVENO . '</span></td>';
                                    echo '<td><span class="text-primary"># ' . $res->CATEGORIES . '</span></td>';
                                    echo '<td><span class="badge bg-info-light">' . $res->LOCATION . '</span></td>';
                                    echo '<td><span class="text-primary text-uppercase">' . $res->FNAME . '</span></td>';
                                    if ($age == 0) {
                                        echo '<td><span class="badge bg-danger-light">Less than a year</span></td>';
                                    } else {
                                        echo '<td><span class="text-primary">' . $age . ' years</span></td>';
                                    }
                                    echo '<td>' . date_format(date_create($res->BORNDATE), 'F d, Y') . '</td>';
                                    echo '<td>' . date_format(date_create($res->DIEDDATE), 'F d, Y') . '</td>';
                                    // echo '<td class="text-right">';
                                    // echo '<div class="table-action">';
                                    // echo '<a href="index.php?q=person-list&id=' . $res->ID . '" class="btn btn-sm bg-success-light">';
                                    // echo '<i class="fas fa-eye"></i>';
                                    // echo '</a>';
                                    // echo '<a href="index.php?q=person-list&id=' . $res->ID . '" class="btn btn-sm bg-info-light">';
                                    // echo '<i class="fas fa-edit"></i>';
                                    // echo '</a>';
                                    // echo '<a href="index.php?q=person-list&id=' . $res->ID . '" class="btn btn-sm bg-danger-light">';
                                    // echo '<i class="fas fa-trash-alt"></i>';
                                    // echo '</a>';
                                    // echo '</div>';
                                    // echo '</td>';
                                    echo '</tr>';
                                }

                                echo '</tbody>';
                                echo '</table>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            } else {
                                echo '<div class="card card-table">';
                                echo '<div class="card-body">';
                                echo '<div class="table-responsive">';
                                echo '<table class="table table-hover table-center mb-0">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th>Plot Number</th>';
                                echo '<th>Block</th>';
                                echo '<th>Location</th>';
                                echo '<th>Name</th>';
                                echo '<th>Age</th>';
                                echo '<th>Born</th>';
                                echo '<th>Died</th>';
                                echo '<th></th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                echo '<tr>';
                                echo '<td colspan="8" class="text-center">No Data Available</td>';
                                echo '</tr>';
                                echo '</tbody>';
                                echo '</table>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }?>
                        </div>
                    </div>
                <?php } else if ($q == 'reports') {
                    $sql = "SELECT * FROM tblreport";
                    $mydb->setQuery($sql);
                    $cur = $mydb->executeQuery();
                    $numrows = $mydb->num_rows($cur); ?>
                    <div class="row">
                        <div class="col-12">
                            <?php if ($numrows > 0) {
                                # code... 
                                $cur = $mydb->loadResultList();

                                echo '<div class="card card-table">';
                                echo '<div class="card-header">';
                                echo '<div class="row">';
                                echo '<div class="col col-sm-12">';
                                echo '<h5 class="card-title">Reports Issue</h5>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="card-body">';
                                echo '<div class="table-responsive">';
                                echo '<table class="table table-hover table-center mb-0 datatable">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th>Account Name</th>';
                                echo '<th>Issue</th>';
                                echo '<th>Type</th>';
                                echo '<th>Created</th>';
                                echo '<th>Status</th>';
                                echo '<th>Action</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';

                                foreach ($cur as $res) {
                                    echo '<tr>';
                                    $sql = "SELECT * FROM tbluseraccount WHERE USERID = '" . $res->user_id . "'";
                                    $mydb->setQuery($sql);
                                    $cur = $mydb->executeQuery();
                                    $user = $mydb->loadSingleResult();
                                    echo '<td>' . $user->U_NAME . '</td>';
                                    echo '<td>' . $res->issue . '</td>';
                                    echo '<td><span class="badge bg-danger">' . $res->report_type . '</span></td>';
                                    echo '<td>' . date_format(date_create($res->created_at), 'F d, Y') . '</td>';
                                    echo '<td>';
                                    if ($res->status == 'Pending') {
                                        echo '<span class="badge bg-warning">' . $res->status . '</span>';
                                    } else if ($res->status == 'Approved') {
                                        echo '<span class="badge bg-success">' . $res->status . '</span>';
                                    } else {
                                        echo '<span class="badge bg-danger">' . $res->status . '</span>';
                                    }
                                    echo '</td>';
                                    echo '<td class="text-right">';
                                    echo '<a href="?q=report-view&id=' . $res->id . '" class="btn btn-sm btn-outline-primary">';
                                    echo '<i class="far fa-eye me-1"></i> View';
                                    echo '</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }

                                echo '</tbody>';
                                echo '</table>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            } else {
                                echo '<div class="card card-table">';
                                echo '<div class="card-body">';
                                echo '<div class="table-responsive">';
                                echo '<table class="table table-hover table-center mb-0">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th>Issue</th>';
                                echo '<th>Type</th>';
                                echo '<th>Created</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                echo '<tr>';
                                echo '<td colspan="3" class="text-center">No Data Available</td>';
                                echo '</tr>';
                                echo '</tbody>';
                                echo '</table>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            } ?>
                        </div>
                    </div>
                <?php
                } else if ($q == 'report-view' && isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $status = isset($_POST['r-status']) ? $_POST['r-status'] : '';
                    $sql1 = "SELECT * FROM tblreport WHERE id = '$id'";
                    $mydb->setQuery($sql1);
                    $cur1 = $mydb->executeQuery();
                    $res = $mydb->loadSingleResult();

                    if (isset($_POST['r-status'])) {
                        $sql = "UPDATE tblreport SET status = '$status' WHERE id = '$id'";
                        $mydb->setQuery($sql);
                        $cur = $mydb->executeQuery();

                        if ($cur) {
                            echo '<script>alert("Status Updated Successfully!")</script>';
                            echo '<script>window.location.href = "index.php?q=report-view&id=' . $id . '";</script>';
                        } else {
                            echo '<script>alert("Something went wrong!")</script>';
                            echo '<script>window.location.href = "index.php?q=report-view&id=' . $id . '";</script>';
                        }
                    } ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title">Report Information</h5>
                                    <span class="badge bg-<?= $res->status == 'Pending' ? 'warning' : ($res->status == 'Approved' ? 'success' : 'danger'); ?>"><?= $res->status; ?></span>
                                </div>
                                <div class="col-auto">
                                    <a href="index.php?q=reports" class="btn btn-sm btn-outline-primary">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <p class="text-muted mb-3">Information about the report issue.</p>
                                <div class="form-group">
                                    <label>Issue</label>
                                    <fieldset disabled>
                                        <textarea class="form-control" rows="3"><?= $res->issue; ?></textarea>
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <label>Type of Report</label>
                                    <p><span class="badge bg-danger"><?= $res->report_type; ?></span></p>
                                </div>
                                <hr>
                                <p class="text-muted mb-3">Update status of report issue.</p>
                                <div class="form-group">
                                    <select name="r-status" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="this.form.submit()">
                                        <option hidden selected>Select Status</option>
                                        <option value="Pending" <?= $res->status == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Approved" <?= $res->status == 'Approved' ? 'selected' : ''; ?>>Approved</option>
                                        <option value="Declined" <?= $res->status == 'Declined' ? 'selected' : ''; ?>>Declined</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                } else {
                    include $q . '.php';
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

        <!-- add new people modal -->
        <div class="modal custom-modal fade bank-details" id="add-people-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <?php
                    if (isset($_POST['add'])) {
                        // get 1 from tblreserve
                        $sql = "SELECT * FROM tblreserve WHERE status = 'Approved' AND graveno = '" . $_POST['graveno'] . "'";
                        $mydb->setQuery($sql);
                        $cur = $mydb->executeQuery();
                        $reserved = $mydb->loadSingleResult();

                        if ($reserved) {
                            $graveno = $_POST['graveno'];
                            $name = $_POST['name'];
                            $born_date = $_POST['born_date'];
                            $died_date = $_POST['died_date'];
                            $categories = $reserved->block;
                            $location = $reserved->location;

                            $sql = "INSERT INTO tblpeople (FNAME, GRAVENO, BORNDATE, DIEDDATE, CATEGORIES, LOCATION) VALUES ('$name', '$graveno', '$born_date', '$died_date', '$categories', '$location')";
                            $mydb->setQuery($sql);
                            $cur = $mydb->executeQuery();

                            if ($cur) {
                                echo '<script>alert("Deceased Person Added Successfully!")</script>';
                                echo '<script>window.location.href = "index.php?q=person-list";</script>';
                            } else {
                                echo '<script>alert("Something went wrong!")</script>';
                                echo '<script>window.location.href = "index.php?q=person-list";</script>';
                            }
                        } else {
                            echo '<script>alert("Plot number is not yet approved!")</script>';
                        }
                    }
                    ?>
                    <form method="POST">
                        <div class="modal-header">
                            <div class="form-header text-start mb-0">
                                <h4 class="mb-0">Add New Deceased Person</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fas fa-times"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="bank-inner-details">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Plot Number (Applicable only for approved reserved plot)</label>
                                            <select class="form-control" name="graveno">
                                                <option selected hidden>Select Plot Number</option>
                                                <?php
                                                $sql = "SELECT * FROM tblreserve WHERE status = 'Approved' AND graveno NOT IN (SELECT GRAVENO FROM tblpeople)";
                                                $mydb->setQuery($sql);
                                                $cur = $mydb->executeQuery();
                                                $plot = $mydb->loadResultList();

                                                foreach ($plot as $p) {
                                                    echo '<option value="' . $p->graveno . '">PLOT NUMBER: ' . $p->graveno . ' - BLOCK: ' . $p->block . ' - LOCATION: ' . $p->location . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <hr>
                                        <h4>
                                            <i class="fas fa-user me-1"></i> Deceased Person Information
                                        </h4>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Ex. Juan Dela Cruz">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Born Date</label>
                                            <input type="date" class="form-control" name="born_date">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Died Date</label>
                                            <input type="date" class="form-control" name="died_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="bank-details-btn">
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn bank-cancel-btn me-2">Cancel</a>
                                <button type="submit" name="add" class="btn bank-save-btn">Add</button>
                            </div>
                        </div>
                    </form>
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