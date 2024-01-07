<?php
$id = $_GET['id'];

$sql = "SELECT * FROM tblpeople WHERE PEOPLEID = '$id'";
$mydb->setQuery($sql);
$res = $mydb->loadSingleResult();

$sql1 = "SELECT * FROM tblreserve WHERE graveno = '$res->GRAVENO'";
$mydb->setQuery($sql1);
$reserve = $mydb->loadSingleResult();
?>

<div class="col-xl-12 d-flex">
	<div class="content container-fluid">
		<div class="card invoices-tabs-card">
			<div class="card-body card-body pt-0 pb-0">
				<div class="invoices-items-main-tabs">
					<div class="row align-items-center">
						<div class="col-lg-12 col-md-12">
							<div class="invoices-items-tabs">
								<ul>
									<li><a href="?q=map" class="active">Map</a></li>
									<li><a href="?q=view-reserve">Reserve Plot</a></li>
									<li><a href="?q=report">Report Issues</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card card-table">
			<div class="card-header">
				<h4 class="card-title">
                    Information of <?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>
				</h4>
				<a href="index.php?q=map-info&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>" class="btn btn-primary btn-sm">Back</a>
			</div>
			<div class="card-body">
                <ul class="list-unstyled px-5 py-3">
                    <li class="row">
                        <div class="col-md-4">Name:</div>
                        <div class="col-md-8"><?php echo $res->FNAME; ?></div>
                    </li>
                    <li class="row">
                        <div class="col-md-4">Address:</div>
                        <div class="col-md-8"><?php echo $res->LOCATION; ?></div>
                    </li>
                    <li class="row">
                        <div class="col-md-4">Date of Birth:</div>
                        <div class="col-md-8"><?php echo $res->BORNDATE; ?></div>
                    </li>
                    <li class="row">
                        <div class="col-md-4">Date of Death:</div>
                        <div class="col-md-8"><?php echo $res->DIEDDATE; ?></div>
                    </li>
                    <li class="row">
                        <div class="col-md-4">Burial Date:</div>
                        <div class="col-md-8"><?php echo $res->BURIALDATE; ?></div>
                    </li>
                    <li class="row">
                        <div class="col-md-4">Plot No:</div>
                        <div class="col-md-8"><?php echo $res->GRAVENO; ?></div>
                    </li>

                </ul>
			</div>
		</div>
	</div>
</div>