<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h2>
					<i class="fa fa-list"></i> List of Deceased
					<a href="index.php?view=add" class="btn btn-secondary btn-sm">
						<i class="fa fa-plus-circle"></i> New
					</a>
				</h2>
			</div>
			<div class="card-body">
				<form action="controller.php?action=delete" Method="POST">
					<div class="table-responsive">
						<table id="dash-table" class="table table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Plot No.</th>
									<th>Name of the Deceased</td>
									<th>Born</th>
									<th>Died</th>
									<th>Block</th>
									<th>Address</th>
									<th>Burial Date</th>
									<th>Person to be Contacted</th>
								</tr>
							</thead>

							<tbody>
								<?php

								$query = "SELECT * FROM `tblpeople` ORDER BY `PEOPLEID` DESC";
								$mydb->setQuery($query);
								$cur = $mydb->loadResultList();

								foreach ($cur as $result) {

									$borndate =  $result->BORNDATE;
									$dieddate =  $result->DIEDDATE;

									echo '<tr>';
									echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="' . $result->PEOPLEID . '"/> ' . $result->GRAVENO . '</td>';
									// echo '<td><a title="edit" href="'.web_root.'admin/person/index.php?view=edit&id='.$result->PEOPLEID.'"><i class="fa fa-pencil "></i>'.$result->LNAME.', '.$result->FNAME.' '.$result->MNAME.'</a></td>';
									echo '<td><a title="edit" href="' . web_root . 'admin/person/index.php?view=edit&id=' . $result->PEOPLEID . '"><i class="fa fa-pencil "></i>' . $result->FNAME . '</a></td>';
									echo '<td>' . $borndate . '</td>';
									echo '<td>' . $dieddate . '</td>';
									echo '<td>' . $result->CATEGORIES . '</td>';
									echo '<td>' . $result->LOCATION . '</td>';
									echo '<td>' . $result->BURIALDATE . '</td>';

									// query for person to be contacted in  tblreserve
									$query = "SELECT * FROM `tblreserve` WHERE `graveno` = '" . $result->GRAVENO . "'";
									$mydb->setQuery($query);
									$cur1 = $mydb->loadResultList();

									echo '<td>';
									if ($cur1) {
										foreach ($cur1 as $result1) {
											$query = "SELECT * FROM `tbluseraccount` WHERE `USERID` = '" . $result1->user_id . "'";
											$mydb->setQuery($query);
											$cur2 = $mydb->loadResultList();

											foreach ($cur2 as $result2) {
												echo $result2->U_NAME . '<br>';
												echo $result1->mobile_number . '<br>';
											}
										}
									} else {
										echo 'NONE';
									}
									echo '</td>';

									echo '</tr>';
								}
								?>
							</tbody>
						</table>

						<div class="btn-group">
							<!-- <a href="index.php?view=add" class="btn btn-default">New</a> -->
							<button type="submit" class="btn btn-danger btn-sm" name="delete" onclick="return confirm('Are you sure you want to delete this data?');"><i class="fa fa-trash fw-fa"></i> Delete Selected</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="productmodal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" type="button">ï¿½</button>

				<h4 class="modal-title" id="myModalLabel">Image.</h4>
			</div>

			<form action="<?php echo web_root; ?>admin/products/controller.php?action=photos" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="rows">
							<div class="col-md-12">
								<div class="rows">
									<div class="col-md-8">

										<input class="proid" type="hidden" name="proid" id="proid" value="">
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