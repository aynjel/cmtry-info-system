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
					<i class="fa fa-list"></i> List of Users
					<a href="index.php?view=add" class="btn btn-secondary btn-sm">
						<i class="fa fa-plus-circle"></i> New
					</a>
				</h2>
			</div>
			<div class="card-body">
				<form action="controller.php?action=delete" Method="POST">
					<div class="table-responsive">
						<table id="example" class="table table-bordered table-hover table-responsive">

							<thead>
								<tr>
									<th>
										Account Name
									</th>
									<th>Username</th>
									<th>Role</th>
									<th width="10%">Action</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$mydb->setQuery("SELECT * 
											FROM  `tbluseraccount`");
								$cur = $mydb->loadResultList();

								foreach ($cur as $result) {
									echo '<tr>';
									echo '<td>' . $result->U_NAME . '</a></td>';
									echo '<td>' . $result->U_USERNAME . '</td>';
									echo '<td>' . $result->U_ROLE . '</td>';
									if ($result->USERID == $_SESSION['USERID'] || $result->U_ROLE == 'MainAdministrator' || $result->U_ROLE == 'Administrator') {
										$active = "Disabled";
									} else {
										$active = "";
									}

									echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id=' . $result->USERID . '"  class="btn btn-primary btn-sm">  <i class="fa fa-edit"></i></a>
				  					 <a title="Delete" href="controller.php?action=delete&id=' . $result->USERID . '" class="btn btn-danger btn-sm confirmation" ' . $active . '><i class="fa fa-trash"></i> </a>
				  					 </td>';
									echo '</tr>';
								}
								?>
							</tbody>

						</table>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var elems = document.getElementsByClassName('confirmation');
	var confirmIt = function(e) {
		if (!confirm('Are you sure?')) e.preventDefault();
	};
	for (var i = 0, l = elems.length; i < l; i++) {
		elems[i].addEventListener('click', confirmIt, false);
	}
</script>