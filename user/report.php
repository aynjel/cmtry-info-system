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
									<li><a href="?q=view-reserve">Reserved Plot</a></li>
									<li><a href="?q=report" class="active">Report Issues</a></li>
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
                                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#report-issue-modal">
                                    <i data-feather="plus-circle"></i> Report Issue
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
										<th>Issue</th>
										<th>Report Type</th>
										<th>Date Created</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
                                    $sql = "SELECT * FROM tblreport WHERE user_id=".$_SESSION['USERID'];
                                    $mydb->setQuery($sql);
                                    $cur = $mydb->loadResultList();
					
									if ($cur) {
                                        foreach ($cur as $res) {
											echo '<tr>'; 
											echo '<td>'.$res->id.'</td>';
											echo '<td>'.$res->issue.'</td>';
											echo '<td>'.$res->report_type.'</td>';
											echo '<td>'.date_format(date_create($res->created_at), 'M d, Y').'</td>';
											echo '<td>';
											if ($res->status == 'Pending') {
												echo '<span class="badge bg-warning text-dark">'.$res->status.'</span>';
											}else{
												echo '<span class="badge bg-success text-dark">'.$res->status.'</span>';
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


<div class="modal custom-modal fade bank-details" id="report-issue-modal" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <?php 
            if (isset($_POST['report'])) {
				$issue = $_POST['issue'];
				$type = $_POST['type'];
				$sql = "INSERT INTO `tblreport` (`issue`, `report_type`, `user_id`) VALUES ('".$issue."', '".$type."', '".$_SESSION['USERID']."')";
				$mydb->setQuery($sql);
				if ($mydb->executeQuery()) {
					# code...
					message("Issue reported successfully!", "success");
					redirect(web_root."user/index.php?q=report");
				}else{
					message("Something went wrong! Please try again.", "error");
				}
            }
            ?>
            <form method="POST">
                <div class="modal-header">
                    <div class="form-header text-start mb-0">
                        <h4 class="mb-0">Report Issue</h4>
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
                                    <label>Issue</label>
									<p class="text-muted">Please provide a detailed description of the issue.</p>
                                    <textarea class="form-control" name="issue" required></textarea>
                                </div>

								<div class="form-group">
                                    <label>Report Type</label>
									<p class="text-muted">Please select the type of report.</p>
									<select class="form-control" name="type" required>
										<option value="Others">Others</option>
										<option value="Deceased Person">Deceased Person</option>
										<option value="Reserved Plot">Reserved Plot</option>
										<option value="Wrong Information">Wrong Information</option>
										<option value="Quality of Service">Quality of Service</option>
										<option value="Location">Location</option>
										<option value="Violation of Terms and Conditions">Violation of Terms and Conditions</option>
										<option value="Website Error">Website Error</option>
										<option value="Technical Issue">Technical Issue</option>
										<option value="Management">Management</option>
										<option value="Not Working Properly">Not Working Properly</option>
										<option value="Security">Security</option>
										<option value="Customer Service">Customer Service</option>
										<option value="Harrassment">Harrassment</option>
										<option value="Fraud">Fraud</option>
									</select>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="bank-details-btn">
                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn bank-cancel-btn me-2">Cancel</a>
                        <button type="submit" name="report" class="btn bank-save-btn">Report Issue</button>
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>