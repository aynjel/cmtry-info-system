<?php 
$per_page = 10; // Number of records per page

$search = isset($_POST['search']) ? $_POST['search'] : "";
$location = isset($_GET['location']) ? $_GET['location'] : '';
$current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

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
									<li><a href="#" class="active">Deceased Person</a></li>
									<li><a href="#">Reserved Plot</a></li>
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
								<form method="POST" action="index.php?q=person">
									<select name="location" class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="this.form.submit()">
										<option hidden selected>Select Location</option>
										<!-- <option value="" <?= $location=='' ? 'selected' : ''; ?>>All</option> -->
										<option value="Sangi" <?= $location=='Sangi' ? 'selected' : ''; ?>>Sangi</option>
										<option value="Luray" <?= $location=='Luray' ? 'selected' : ''; ?>>Luray</option>
										<option value="Dumlog" <?= $location=='Dumlog' ? 'selected' : ''; ?>>Dumlog</option>
										<option value="Carmen" <?= $location=='Carmen' ? 'selected' : ''; ?>>Carmen</option>
										<option value="Canlumampao" <?= $location=='Canlumampao' ? 'selected' : ''; ?>>Canlumampao</option>
										<option value="Poog" <?= $location=='Poog' ? 'selected' : ''; ?>>Poog</option>
										<option value="Ibo" <?= $location=='Ibo' ? 'selected' : ''; ?>>Ibo</option>
									</select>
								</form>
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
										<th>Name of the Deceased</th>
										<th>Plot Number</th>
										<th>Born</th>
										<th>Died</th>
										<th>Location</th>
										<!-- <th>Years Buried</th> -->
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$mydb->setQuery("SELECT * FROM tblpeople");
									$cur = $mydb->executeQuery();
									$numrows = $mydb->num_rows($cur);
						
									if (isset($_POST['location'])) {
										# ...
										if (isset($_GET['name'])) {
											# ...
											$sql = "SELECT * FROM tblpeople WHERE LOCATION='" . $_POST['location'] . "' AND GRAVENO = '" . $_GET['graveno'] . "' AND FNAME ='" . $_GET['name'] . "'";
										} else {
											$sql = "SELECT * FROM tblpeople WHERE LOCATION='" . $_POST['location'] . "'";
										}
									} else {
										$sql = "SELECT * FROM tblpeople";
									}
						
									$mydb->setQuery($sql);
									$cur = $mydb->executeQuery();
					
									# code...
									if ($numrows > 0) {
											# code... 
										$cur = $mydb->loadResultList();

										foreach ($cur as $res) {

											echo '<tr>';
											echo '<td><a href="index.php?q=person&graveno='.$res->GRAVENO.'&name='.$res->FNAME.'&location='.$res->LOCATION.'&section='.$res->CATEGORIES.'"><img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="https://ui-avatars.com/api/?name='.$res->FNAME.'&background=random&color=000&rounded=true&size=32&bold=true&format=svg" alt="Person Image"> '.$res->FNAME.'</a></td>';
											echo '<td>'.$res->GRAVENO.'</td>';
											echo '<td>'.$res->BORNDATE.'</td>';
											echo '<td>'.$res->DIEDDATE.'</td>';
											echo '<td>'.$res->LOCATION.'</td>';
											echo '<td class="text-right"><a href="index.php?q=person&graveno='.$res->GRAVENO.'&name='.$res->FNAME.'&location='.$res->LOCATION.'&section='.$res->CATEGORIES.'" class="btn btn-sm btn-white text-info me-2"><i class="far fa-eye me-1"></i> View</a></td>';
											echo '</tr>';

										}

									}else{
											echo '<tr>'; 
											echo '<td colspan="7" style="text-align:center">No Record Found!</td>'; 
											echo '</tr>'; 
									}?>
								</tbody>
							</table>
							<!-- <?php $pagination = pagination($total_pages, $current_page, 'index.php?q=person&page='); // Generate the pagination
							echo $pagination;

							function pagination($total_pages, $current_page, $targetpage) {
								$pagination = '';
								if ($total_pages > 0) {
									$pagination .= '<ul class="pagination" id="pagination">';
									$right_links = $current_page + 3;
									$previous = $current_page - 3; //previous link
									$next = $current_page + 1; //next link
									$first_link = true; //boolean var to decide our first link
									
									if ($current_page > 1) {
										$previous_link = ($previous == 0) ? 1 : $previous;
										$pagination .= '<li class="page-item"><a class="page-link" href="' . $targetpage . $previous_link . '#pagination">Previous</a></li>'; //previous link
										for ($i = ($current_page - 2); $i < $current_page; $i++) { //Create left-hand side links
											if ($i > 0) {
												$pagination .= '<li class="page-item"><a class="page-link" href="' . $targetpage . $i . '#pagination">' . $i . '</a></li>';
											}
										}
										$first_link = false; //set first link to false
									}

									if ($first_link) { //if current active page is first link
										$pagination .= '<li class="page-item active"><a class="page-link" href="#">' . $current_page . '</a></li>';
									} elseif ($current_page == $total_pages) { //if it's the last active link
										$pagination .= '<li class="page-item active"><a class="page-link" href="#">' . $current_page . '</a></li>';
									} else { //regular current link
										$pagination .= '<li class="page-item active"><a class="page-link" href="#">' . $current_page . '</a></li>';
									}

									for ($i = $current_page + 1; $i < $right_links; $i++) { //create right-hand side links
										if ($i <= $total_pages) {
											$pagination .= '<li class="page-item"><a class="page-link" href="' . $targetpage . $i . '#pagination">' . $i . '</a></li>';
										}
									}

									if ($current_page < $total_pages) {
										$next_link = ($i > $total_pages) ? $total_pages : $i;
										$pagination .= '<li class="page-item"><a class="page-link" href="' . $targetpage . $next_link . '#pagination">Next</a></li>'; //next link
									}



									$pagination .= '</ul>';
								}
								return $pagination; //return pagination links
							} ?> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal custom-modal fade bank-details" id="add_items" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<div class="form-header text-start mb-0">
					<h4 class="mb-0">Create New Category</h4>
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
								<label>Category Name</label>
								<input type="text" class="form-control" placeholder="Add New Item">
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<label>Category Description</label>
								<textarea class="form-control"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="bank-details-btn">
					<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn bank-cancel-btn me-2">Cancel</a>
					<a href="javascript:void(0);" class="btn bank-save-btn">Save Item</a>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal custom-modal fade" id="delete_paid" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Delete Invoice Iems</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">
						<div class="col-6">
							<a href="javascript:void(0);" class="btn btn-primary paid-continue-btn">Delete</a>
						</div>
						<div class="col-6">
							<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<h5 class="card-title">
					Deceased Person
				</h5>
			</div>
			<div class="col">
				<form method="POST" action="index.php?q=person">
					<select class="form-select" name="location" onchange="this.form.submit()">
						<option hidden selected>Select Location</option>
						<option value="Sangi" <?= $location=='Sangi' ? 'selected' : ''; ?>>Sangi</option>
						<option value="Luray" <?= $location=='Luray' ? 'selected' : ''; ?>>Luray</option>
						<option value="Dumlog" <?= $location=='Dumlog' ? 'selected' : ''; ?>>Dumlog</option>
						<option value="Carmen" <?= $location=='Carmen' ? 'selected' : ''; ?>>Carmen</option>
						<option value="Canlumampao" <?= $location=='Canlumampao' ? 'selected' : ''; ?>>Canlumampao</option>
						<option value="Poog" <?= $location=='Poog' ? 'selected' : ''; ?>>Poog</option>
						<option value="Ibo" <?= $location=='Ibo' ? 'selected' : ''; ?>>Ibo</option>
					</select>
				</form>

				<form method="POST" action="index.php?q=person">
					<div class="input-group">
						<input type="text" class="form-control" name="search" placeholder="Search for..." value="<?= $search; ?>">
						<span class="input-group-btn">
							<button class="btn btn-secondary" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
					<p class="text-danger"><?= isset($_POST['search']) ? 'Search result for: '.$search : ''; ?></p>
				</form>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="thead-light">
					<tr>
						<th>Name of the Deceased</th>
						<th>Plot Number</th>
						<th>Born</th>
						<th>Died</th>
						<th>Location</th>
						<th>Years Buried</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
				
		  
				</tbody>
			</table>

			

		</div>
	</div>
</div> -->