<?php 
$per_page = 10; // Number of records per page

$search = isset($_POST['search']) ? $_POST['search'] : "";
$location = isset($_GET['location']) ? $_GET['location'] : '';

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
									<li><a href="?q=person">Deceased Person</a></li>
									<li><a href="?q=view-reserve" class="active">Reserved Plot</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="card invoices-tabs-card">
            <div class="card-body card-body pt-0 pb-0">
                <div class="invoices-main-tabs border-0 pb-0">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="invoices-settings-btn invoices-settings-btn-one">
                                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#reserve-plot-modal">
                                    <i data-feather="plus-circle"></i> Reserve Plot 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-12">
				<div class="card card-table">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-stripped table-hover datatable">
								<thead class="thead-light">
									<tr>
										<th>ID</th>
										<th>PLOT NUMBER</th>
										<th>DATE RESERVED</th>
										<th>STATUS</th>
									</tr>
								</thead>
								<tbody>
									<?php
                                    $sql = "SELECT * FROM tblreserve";
                                    $mydb->setQuery($sql);
                                    $cur = $mydb->loadResultList();
					
									if ($cur) {
                                        foreach ($cur as $res) {
                                            echo '<tr>'; 
                                            echo '<td>' . $res->id . '</td>';
                                            echo '<td>' . $res->graveno . '</td>';
                                            echo '<td>' . date_format(date_create($res->created_at), 'l, F d, Y') . '</td>';
                                            if ($res->status == 'Pending') {
                                                echo '<td><span class="badge bg-warning">' . $res->status . '</span></td>';
                                            } else if ($res->status == 'Approved') {
                                                echo '<td><span class="badge bg-success">' . $res->status . '</span></td>';
                                            } else if ($res->status == 'Cancelled') {
                                                echo '<td><span class="badge bg-danger">' . $res->status . '</span></td>';
                                            } else if ($res->status == 'Contacted') {
                                                echo '<td><span class="badge bg-info">' . $res->status . '</span></td>';
                                            }else{
                                                echo '<td><span class="badge bg-danger">' . $res->status . '</span></td>';
                                            }
                                            echo '</tr>';
										}
									}else{
                                        echo '<tr>'; 
                                        echo '<td colspan="7" style="text-align:center">No Record Found!</td>'; 
                                        echo '</tr>'; 
									}?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal custom-modal fade bank-details" id="reserve-plot-modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <?php 
            if (isset($_POST['reserve'])) {
                $plot_no = $_POST['plot_no'];
                $location = $_POST['location'];
                $block = $_POST['block'];
                $mobile_number = $_POST['mobile_number'];
                $email = $_POST['email'];

                // check in database if plot number is already reserved
                $sql = "SELECT * FROM tblreserve WHERE graveno = '$plot_no' AND status = 'Approved'";
                $mydb->setQuery($sql);
                $cur = $mydb->loadResultList();
                
                if ($cur) {
                    message("Plot number is already reserved!", "error");
                } else {
                    $sql = "INSERT INTO tblreserve (graveno, location, block, mobile_number, email) VALUES ('$plot_no', '$location', '$block', '$mobile_number', '$email')";
                    $mydb->setQuery($sql);
                    $res = $mydb->executeQuery();
                    if ($res) {
                        message("Plot number reserved successfully!", "success");
                        echo "<script> window.location.href = 'index.php?q=view-reserve';</script>";
                    } else {
                        message("Something went wrong! Please try again.", "error");
                    }
                }
                redirect(web_root."user/index.php?q=view-reserve");
            }
            ?>
            <form method="POST">
                <div class="modal-header">
                    <div class="form-header text-start mb-0">
                        <h4 class="mb-0">Reserve Plot</h4>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="bank-inner-details">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Plot Number</label>
                                    <input type="number" class="form-control" name="plot_no" placeholder="Ex. 1">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Location</label>
                                    <select class="form-control" name="location">
                                        <option selected hidden>Select Location</option>
                                        <option value="Sangi">Sangi</option>
                                        <option value="Luray">Luray</option>
                                        <option value="Dumlog">Dumlog</option>
                                        <option value="Carmen">Carmen</option>
                                        <option value="Canlumampao">Canlumampao</option>
                                        <option value="Ibo">Ibo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Block</label>
                                    <select class="form-control" name="block">
                                        <option selected hidden>Select Block</option>
                                        <option value="1">Block 1</option>
                                        <option value="2">Block 2</option>
                                        <option value="3">Block 3</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <h5>
                                Contact Details
                            </h5>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Number</label>
                                    <input type="number" class="form-control" name="mobile_number" placeholder="Ex. 09123456789">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Ex. 09123456789">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="bank-details-btn">
                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn bank-cancel-btn me-2">Cancel</a>
                        <button type="submit" name="reserve" class="btn bank-save-btn">Reserve Plot</button>
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>