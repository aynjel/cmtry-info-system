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
                <!-- <li class="nav-item"> -->
                <!-- add new people button modal -->
                <!-- <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="modal" data-bs-target="#add-people-modal">
                        <i class="fas fa-plus-circle"></i>
                    </a> -->
                <!-- </li> -->
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
                                        <div class="dash-title">Plot Address</div>
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
                                    There are <?= $total; ?> plot address available
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
                                    <span class="badge bg-<?= $reserved->status == 'Contacted' ? 'warning' : ($reserved->status == 'Approved' ? 'success' : 'danger'); ?>"><?= $reserved->status; ?></span>
                                    <?php if ($reserved->status == 'Approved') {
                                        $sql = "SELECT * FROM tblpeople WHERE GRAVENO = '" . $reserved->graveno . "'";
                                        $mydb->setQuery($sql);
                                        $cur = $mydb->executeQuery();
                                        $isO_numrows = $mydb->num_rows($cur); ?>
                                        <?php if ($isO_numrows > 0) {
                                            $cur = $mydb->loadSingleResult(); ?>
                                            <span class="badge bg-info">Occupied by <?= $cur->FNAME; ?></span>
                                        <?php } else { ?>
                                            <span class="badge bg-danger">Vacant</span>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                                <div class="col-auto ms-auto d-print-none d-flex align-items-center gap-3">
                                    <?php if (isset($_GET['isEdit']) == 'true') { ?>
                                        <?php if ($reserved->status == 'Contacted') { ?>
                                            <a class="btn btn-sm btn-outline-info" href="index.php?q=reserved-plot&id=<?= $id; ?>&isEdit=true#fill-up">
                                                For this to be approved, you need to fill up the information below.
                                            </a>
                                        <?php } ?>
                                        <?php if ($reserved->status == 'Pending') { ?>
                                            <!-- <form method="POST">
                                                <?php if (isset($_POST['approve_reservation'])) {
                                                    $sql = "UPDATE tblreserve SET status = 'Approved' WHERE id = '$id'";
                                                    $mydb->setQuery($sql);
                                                    $cur = $mydb->executeQuery();

                                                    if ($cur) {
                                                        echo '<script>alert("Reservation Approved Successfully!")</script>';
                                                        echo '<script>window.location.href = "index.php?q=plot-location";</script>';
                                                    } else {
                                                        echo '<script>alert("Something went wrong!")</script>';
                                                        echo '<script>window.location.href = "index.php?q=plot-location";</script>';
                                                    }
                                                } ?>
                                                <button type="submit" name="approve_reservation" class="btn btn-sm btn-outline-success" onclick="return confirm('Are you sure you want to approve this reservation?')">
                                                    Approve Reservation
                                                </button>
                                            </form> -->

                                            <form method="POST">
                                                <?php if (isset($_POST['contact_reservation'])) {
                                                    $sql = "UPDATE tblreserve SET status = 'Contacted' WHERE id = '$id'";
                                                    $mydb->setQuery($sql);
                                                    $cur = $mydb->executeQuery();

                                                    if ($cur) {
                                                        echo '<script>alert("Reservation Contacted Successfully!")</script>';
                                                        echo '<script>window.location.href = "index.php?q=plot-location";</script>';
                                                    } else {
                                                        echo '<script>alert("Something went wrong!")</script>';
                                                        echo '<script>window.location.href = "index.php?q=plot-location";</script>';
                                                    }
                                                } ?>
                                                <button type="submit" name="contact_reservation" class="btn btn-sm btn-outline-warning" onclick="return confirm('Are you sure you want to set this reservation as contacted?')">
                                                    Set as Contacted
                                                </button>
                                            </form>
                                        <?php } ?>
                                        <form method="POST">
                                            <?php if (isset($_POST['decline_reservation'])) {
                                                $sql = "DELETE FROM tblreserve WHERE id = '$id'";
                                                $mydb->setQuery($sql);
                                                $cur = $mydb->executeQuery();

                                                if ($cur) {
                                                    echo '<script>alert("Reservation Declined Successfully!")</script>';
                                                    echo '<script>window.location.href = "index.php?q=plot-location";</script>';
                                                } else {
                                                    echo '<script>alert("Something went wrong!")</script>';
                                                    echo '<script>window.location.href = "index.php?q=plot-location";</script>';
                                                }
                                            } ?>
                                            <button type="submit" name="decline_reservation" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to decline this reservation?')">
                                                Decline Reservation
                                            </button>
                                        </form>
                                    <?php } ?>
                                    <a href="index.php?q=plot-location" class="btn btn-sm btn-outline-primary">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form method="POST" id="fill-up">
                                    <?php
                                    if (isset($_POST['add_deceased'])) {
                                        $name = isset($_POST['name']) ? $_POST['name'] : '';
                                        $born_date = isset($_POST['born_date']) ? $_POST['born_date'] : '';
                                        $died_date = isset($_POST['died_date']) ? $_POST['died_date'] : '';
                                        $burial_date = isset($_POST['burial_date']) ? $_POST['burial_date'] : '';

                                        $sql = "INSERT INTO tblpeople (FNAME, BORNDATE, DIEDDATE, BURIALDATE, GRAVENO, CATEGORIES, LOCATION) VALUES ('$name', '$born_date', '$died_date', '$burial_date', '" . $reserved->graveno . "', '" . $reserved->block . "', '" . $reserved->location . "')";
                                        $mydb->setQuery($sql);
                                        $cur = $mydb->executeQuery();

                                        if ($cur) {
                                            $sql = "UPDATE tblreserve SET status = 'Approved' WHERE id = '$id'";
                                            $mydb->setQuery($sql);
                                            $cur = $mydb->executeQuery();

                                            if ($cur) {
                                                echo '<script>alert("Deceased Person Added Successfully!")</script>';
                                                echo '<script>window.location.href = "index.php?q=plot-location";</script>';
                                            } else {
                                                echo '<script>alert("Something went wrong!")</script>';
                                                echo '<script>window.location.href = "index.php?q=plot-location";</script>';
                                            }
                                        } else {
                                            echo '<script>alert("Something went wrong!")</script>';
                                            echo '<script>window.location.href = "index.php?q=plot-location";</script>';
                                        }
                                    }
                                    ?>
                                    <div class="col-xl-12 col-sm-12 col-12">
                                        <?php if ($reserved->status == 'Contacted') { ?>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <h4>
                                                        <i class="fas fa-user me-1"></i> Deceased Person Information
                                                    </h4>
                                                    <p class="text-muted mb-3">For this to be approved, you need to fill up the information below.</p>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="name" placeholder="Ex. Juan Dela Cruz">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-3">
                                                    <div class="form-group">
                                                        <label>Born Date</label>
                                                        <input type="date" class="form-control" name="born_date">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-3">
                                                    <div class="form-group">
                                                        <label>Died Date</label>
                                                        <input type="date" class="form-control" name="died_date">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-3">
                                                    <div class="form-group">
                                                        <label>Burial Date</label>
                                                        <input type="date" class="form-control" name="burial_date">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
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
                                                    <label>Address</label>
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
                                        <?php if (isset($_GET['isEdit']) == 'true' && $reserved->status == 'Contacted') { ?>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <button type="submit" name="add_deceased" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-plus-circle me-1"></i> Add Deceased Person
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </form>
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

                <?php } elseif ($q == 'plot-location') { ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title">Reserve Plot</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover reserve-datatable">
                                            <thead class="thead-light">
                                                <tr>
                                                    <!-- <th>ID</th> -->
                                                    <th>Plot No.</th>
                                                    <th>Block No.</th>
                                                    <th>Address</th>
                                                    <th>Reserved Date</th>
                                                    <th>Status</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM tblreserve ORDER BY status DESC";
                                                $mydb->setQuery($sql);
                                                $cur = $mydb->executeQuery();
                                                $reserved = $mydb->loadResultList();

                                                if ($reserved) {
                                                    foreach ($reserved as $res) {
                                                        echo '<tr>';
                                                        // echo '<td>' . $res->id . '</td>';
                                                        echo '<td>' . $res->graveno . '</td>';
                                                        echo '<td>' . $res->block . '</td>';
                                                        echo '<td>' . $res->location . '</td>';
                                                        echo '<td>' . date_format(date_create($res->created_at), 'l, F d, Y') . '</td>';
                                                        if ($res->status == 'Contacted') {
                                                            echo '<td><span class="badge bg-warning text-dark">' . $res->status . '</span></td>';
                                                        } else if ($res->status == 'Approved') {
                                                            echo '<td><span class="badge bg-success">' . $res->status . '</span></td>';
                                                        } else {
                                                            echo '<td><span class="badge bg-danger">' . $res->status . '</span></td>';
                                                        }

                                                        // check if the plot is occupied or vacant
                                                        $sql = "SELECT * FROM tblpeople WHERE GRAVENO = '" . $res->graveno . "'";
                                                        $mydb->setQuery($sql);
                                                        $cur = $mydb->executeQuery();
                                                        $numrows = $mydb->num_rows($cur);

                                                        if ($numrows > 0) {
                                                            $cur = $mydb->loadSingleResult();
                                                            echo '<td class="text-right">';
                                                            echo '<a href="?q=reserved-plot&id=' . $res->id . '" class="btn btn-sm btn-outline-primary">';
                                                            echo '<i class="far fa-eye me-1"></i> View';
                                                            echo '</a>';
                                                            echo '</td>';
                                                        } else {
                                                            echo '<td class="text-right">';
                                                            echo '<a href="?q=reserved-plot&id=' . $res->id . '" class="btn btn-sm btn-outline-primary">';
                                                            echo '<i class="far fa-eye me-1"></i> View';
                                                            echo '</a>';
                                                            echo '<a href="index.php?q=reserved-plot&id=' . $res->id . '&isEdit=true" class="btn btn-sm btn-outline-primary">';
                                                            echo '<i class="far fa-edit me-1"></i> Edit';
                                                            echo '</a>';
                                                            echo '</td>';
                                                        }
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
                                echo '<table class="table table-hover table-center mb-0 person-list-datatable">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th>Plot No.</th>';
                                echo '<th>Block No.</th>';
                                echo '<th>Address</th>';
                                echo '<th>Name</th>';
                                echo '<th>Years Buried</th>';
                                echo '<th>Born</th>';
                                echo '<th>Died</th>';
                                echo '<th>Burial Date</th>';
                                echo '<th>Action</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';

                                foreach ($cur as $res) {

                                    $age = date_diff(date_create($res->BORNDATE), date_create($res->DIEDDATE))->y;

                                    echo '<tr>';
                                    echo '<td><span class="text-primary"># ';
                                    echo '<a href="index.php?q=map-info&name=' . $res->FNAME . '&id=' . $res->PEOPLEID . '" class="text-primary">' . $res->GRAVENO . '</a>';
                                    echo '</span></td>';
                                    echo '<td><span class="text-primary"># ' . $res->CATEGORIES . '</span></td>';
                                    echo '<td><span class="text-info">' . $res->LOCATION . '</span></td>';
                                    echo '<td><span class="text-primary text-uppercase">' . $res->FNAME . '</span></td>';
                                    if ($age == 0) {
                                        echo '<td><span class="text-primary">';
                                        if (date_diff(date_create($res->BORNDATE), date_create($res->DIEDDATE))->m == 0) {
                                            echo date_diff(date_create($res->BORNDATE), date_create($res->DIEDDATE))->d . ' days';
                                        } else {
                                            if (date_diff(date_create($res->BORNDATE), date_create($res->DIEDDATE))->m == 1) {
                                                echo date_diff(date_create($res->BORNDATE), date_create($res->DIEDDATE))->m . ' month';
                                            } else {
                                                echo date_diff(date_create($res->BORNDATE), date_create($res->DIEDDATE))->m . ' months';
                                            }
                                        }
                                        echo '</span></td>';
                                    } else {
                                        if ($age == 1) {
                                            echo '<td><span class="text-primary">' . $age . ' year</span></td>';
                                        } else {
                                            echo '<td><span class="text-primary">' . $age . ' years</span></td>';
                                        }
                                    }
                                    echo '<td>' . date_format(date_create($res->BORNDATE), 'F d, Y') . '</td>';
                                    echo '<td>' . date_format(date_create($res->DIEDDATE), 'F d, Y') . '</td>';
                                    echo '<td>' . date_format(date_create($res->BURIALDATE), 'F d, Y') . '</td>';
                                    echo '<td class="text-right">';
                                    echo '<div class="dropdown dropdown-action">';
                                    echo '<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                                    echo '<i class="fas fa-ellipsis-v"></i>';
                                    echo '</a>';
                                    echo '<ul class="dropdown-menu dropdown-menu-end">';
                                    echo '<li><a href="index.php?q=map-info&name=' . $res->FNAME . '&id=' . $res->PEOPLEID . '" class="dropdown-item"><i class="far fa-eye me-1"></i> View</a></li>';
                                    echo '<li><a href="index.php?q=edit-deceased&id=' . $res->PEOPLEID . '" class="dropdown-item"><i class="far fa-edit me-1"></i> Edit</a></li>';
                                    echo '</ul>';
                                    echo '</div>';
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
                                echo '<th>Plot Number</th>';
                                echo '<th>Block</th>';
                                echo '<th>Address</th>';
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
                            } ?>
                        </div>
                    </div>
                <?php } elseif ($q == 'reports') {
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
                <?php } elseif ($q == 'report-view' && isset($_GET['id'])) {
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
                <?php } elseif ($q == 'edit-deceased' && isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tblpeople WHERE PEOPLEID = '$id'";
                    $mydb->setQuery($sql);
                    $cur = $mydb->executeQuery();
                    $deceased = $mydb->loadSingleResult();

                    if (isset($_POST['deceased-update'])) {
                        $name = $_POST['FNAME'];
                        $born_date = $_POST['BORNDATE'];
                        $died_date = $_POST['DIEDDATE'];
                        $burial_date = $_POST['BURIALDATE'];


                        $sql = "UPDATE tblpeople SET FNAME = '$name', BORNDATE = '$born_date', DIEDDATE = '$died_date', BURIALDATE = '$burial_date' WHERE PEOPLEID = '$id'";
                        $mydb->setQuery($sql);
                        $cur = $mydb->executeQuery();

                        if ($cur) {
                            echo '<script>alert("Deceased Person Updated Successfully!")</script>';
                            echo '<script>window.location.href = "index.php?q=person-list";</script>';
                        } else {
                            echo '<script>alert("Something went wrong!")</script>';
                            echo '<script>window.location.href = "index.php?q=person-list";</script>';
                        }
                    }
                ?>
                    <form method="POST">
                        <div class="card">
                            <div class="card-header">
                                <div class="form-header text-start mb-0">
                                    <h4 class="mb-0">Edit Deceased Person</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="bank-inner-details">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="FNAME" value="<?= $deceased->FNAME; ?>">
                                            </div>
                                        </div>

                                        <!-- <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Address (Location)
                                            </label>
                                            <input 
                                            type="number" 
                                            class="form-control" 
                                            name="LOCATION"
                                            value="<?= $deceased->LOCATION; ?>"
                                            >
                                        </div>
                                    </div> -->

                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>
                                                    Born Date
                                                </label>
                                                <input type="date" class="form-control" name="BORNDATE" value="<?= $deceased->BORNDATE; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>
                                                    Died Date
                                                </label>
                                                <input type="date" class="form-control" name="DIEDDATE" value="<?= $deceased->DIEDDATE; ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>
                                                    Burial Date
                                                </label>
                                                <input type="date" class="form-control" name="BURIALDATE" value="<?= $deceased->BURIALDATE; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="bank-details-btn">
                                    <button type="submit" name="deceased-update" class="btn bank-save-btn">Update</button>
                                    <a href="index.php?q=person-list" class="btn bank-cancel-btn me-2">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>

                <?php } else {
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
                            $burial_date = $_POST['burial_date'];
                            $categories = $reserved->block;
                            $location = $reserved->location;

                            $sql = "INSERT INTO tblpeople (FNAME, GRAVENO, BORNDATE, DIEDDATE, CATEGORIES, LOCATION, BURIALDATE) VALUES ('$name', '$graveno', '$born_date', '$died_date', '$categories', '$location', '$burial_date')";
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

    <script>
        $(document).ready(function() {
            $('.reserve-datatable').DataTable({
                lengthMenu: [5, 10, 20, 50, 100, 200, 500],
                ordering: false
            });
            $('.person-list-datatable').DataTable({
                lengthMenu: [5, 10, 20, 50, 100, 200, 500],
            });
        });
    </script>

</body>

</html>