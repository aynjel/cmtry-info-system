<?php
if (!isset($_SESSION['USERID'])) {
	redirect(web_root . "admin/index.php");
}
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h2>
					<i class="fa fa-list"></i> List of Blocks
					<a href="index.php?view=add" class="btn btn-secondary btn-sm"> <i class="fa fa-plus-circle fw-fa"></i> New</a>
				</h2>
			</div>
			<div class="card-body">
				<form action="controller.php?action=delete" Method="POST">
					<div class="table-responsive">
						<table id="dash-table" class="table table-bordered table-hover" cellspacing="0">

							<thead>
								<tr>
									<th>
										Block
									</th>
									<th width="10%" align="center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$mydb->setQuery("SELECT * FROM `tblcategory`");
								$cur = $mydb->loadResultList();

								foreach ($cur as $result) {
									echo '<tr>';
									echo '<td>' . $result->CATEGORIES . '</td>';
									echo '<td align="center"><a title="Edit" href="index.php?view=edit&id=' . $result->CATEGID . '" class="btn btn-info btn-sm">  <i class="fa fa-edit"></i></a>
				  		     <a title="Delete" href="controller.php?action=delete&id=' . $result->CATEGID . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this Block?\')"> <i class="fa fa-trash"></i></a>
							</td>';
									echo '</tr>';
								}
								?>
							</tbody>

						</table>
				</form>
			</div>
		</div>
	</div>
</div>