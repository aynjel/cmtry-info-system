<style type="text/css">
	.scroll {
		overflow: auto;
		height: 500px;
		width: 100%;
	}

	.legend {
		padding: 20px;
		background-color: #59b272;
	}

	.legend ul {
		list-style: none;
		padding: 0;
		margin: 0;
		display: flex;
		align-items: center;
	}

	.legend ul li {
		margin-right: 20px;
	}

	.legend ul li span {
		display: inline-block;
		width: 20px;
		height: 20px;
		margin-right: 5px;
	}

	.map-container {
		position: relative;
	}

	.map {
		width: 100%;
		height: 500px;
	}

	.blocks {
		position: absolute;
		top: 70px;
		left: 0;
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		width: 100%;
		padding: 20px;
	}

	.blocks table {
		border-collapse: collapse;
	}

	.blocks table td {
		border: 1px solid #000;
		border: 10px solid #59b272;
		width: 30px;
		height: 30px;
		text-align: center;
		font-size: 12px;
	}

	.blocks table th {
		border: 0;
		width: 30px;
		height: 30px;
		text-align: center;
		font-size: 12px;
	}

	.blocks table th.heading-text {
		font-size: 16px;
	}

	.blocks table.block-1 {
		top: 0;
		left: 0;
	}

	.blocks table.block-2 {
		top: 0;
		left: 500px;
	}

	.blocks table.block-3 {
		top: 0;
		left: 1000px;
	}

	/*
	hover effect
	*/

	.blocks table td:hover {
		font-weight: bold;
		cursor: pointer;

	}
</style>


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

		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Search</h4>
				<div class="search-box" style="width: 300px;">
					<form action="" method="POST">
						<div class="input-group">
							<input type="text" name="search" class="form-control" placeholder="Search by name, plot no. or block no.">
							<div class="input-group-append">
								<button type="submit" name="btnSearch" class="btn btn-primary">Search</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- results in table -->
			<?php
			if (isset($_POST["btnSearch"])) {
				$search = $_POST["search"];
				$sql = "SELECT * FROM tblpeople WHERE FNAME LIKE '%$search%' OR GRAVENO LIKE '%$search%' OR CATEGORIES LIKE '%$search%'";
				$mydb->setQuery($sql);
				$res = $mydb->loadResultList();

				if (empty($res)) {
					echo "<h4>No results found.</h4>";
				} else { ?>
					<div class="card-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Plot No.</th>
									<th>Block No.</th>
									<th>Address</th>
									<th>Born Date</th>
									<th>Died Date</th>
									<th>Burial Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($res as $row) { ?>
									<tr>
										<td><?php echo $row->FNAME; ?></td>
										<td><?php echo $row->GRAVENO; ?></td>
										<td><?php echo $row->CATEGORIES; ?></td>
										<td><?php echo $row->LOCATION; ?></td>
										<td><?php echo date('l, F d, Y', strtotime($row->BORNDATE)); ?></td>
										<td><?php echo date('l, F d, Y', strtotime($row->DIEDDATE)); ?></td>
										<td><?php echo date('l, F d, Y', strtotime($row->BURIALDATE)); ?></td>
										<td>
											<a href="?q=map-info&id=<?php echo $row->PEOPLEID; ?>&name=<?php echo $row->FNAME; ?>" class="btn btn-primary">View</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

						<!-- clear search -->
						<div class="text-center">
							<a href="?q=map" class="btn btn-primary">Clear Search</a>
						</div>
					</div>
			<?php }
			} ?>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card card-table">
					<div class="card-header">
						<h4 class="card-title">Map</h4>
					</div>
					<div class="card-body">
						<div class="legend">
							<ul>
								<li><span style="background: red;"></span> - Occupied</li>
								<li><span style="background: yellow;"></span> - Reserved/Contacted</li>
								<li><span style="background: white;"></span> - Available</li>
							</ul>
						</div>
						<div class="scroll" id="zoom">
							<?php
							$sql = "SELECT * FROM tblpeople";
							$mydb->setQuery($sql);
							$res = $mydb->loadResultList();

							$totalRow = 10;
							$totalColumn = 10;
							$totalBlock = 3;


							?>

							<div class="map-container">
								<img src="./../img//map.png" alt="map" class="map">
								<div class="blocks">

									<?php

									$count = 1;
									for ($i = 1; $i <= $totalBlock; $i++) {
										echo "<table class='block-$i'>";
										echo "<thead>";
										echo "<tr>";
										echo "<th colspan='$totalColumn' class='heading-text'>Block $i</th>";
										echo "</tr>";
										echo "</thead>";
										echo "<tbody>";
										for ($j = 1; $j <= $totalRow; $j++) {
											echo "<tr>";

											for ($k = 1; $k <= $totalColumn; $k++) {
												$sql = "SELECT * FROM `tblreserve` WHERE `graveno` = '$count'";
												$mydb->setQuery($sql);
												$row = $mydb->executeQuery();
												$maxrow = $mydb->num_rows($row);
												$object = $mydb->loadSingleResult();

												if ($maxrow > 0) {
													if (isset($_GET['id']) && isset($_GET['name'])) {
														if ($object->status == 'Approved') {
															echo "<td style='background: red; cursor: pointer;' title='Occupied'>$count</td>";
														} else if ($object->status == 'Contacted') {
															echo "<td style='background: yellow; cursor: pointer;' title='Reserved'>$count</td>";
														} else {
															echo "<td style='background: white; cursor: pointer;' title='Available'>";
															echo "<a href='?q=reserve-plot-form&graveno=$count&block=$i&id=$_GET[id]&name=$_GET[name]' style='color: #000; text-decoration: none;'>$count</a>";
															echo "</td>";
														}
													} else {
														if ($object->status == 'Approved') {
															echo "<td style='background: red; cursor: pointer;' title='Occupied'>$count</td>";
														} else if ($object->status == 'Contacted') {
															echo "<td style='background: yellow; cursor: pointer;' title='Reserved'>$count</td>";
														} else {
															echo "<td style='background: white; cursor: pointer;' title='Available'>";
															echo "<a href='?q=reserve-plot-form&graveno=$count&block=$i' style='color: #000; text-decoration: none;'>$count</a>";
															echo "</td>";
														}
													}
												} else {
													echo "<td style='background: white; cursor: pointer;' title='Available'>";
													echo "<a href='?q=reserve-plot-form&graveno=$count&block=$i' style='color: #000; text-decoration: none;'>$count</a>";
													echo "</td>";
												}
												$count++;
											}
											echo "</tr>";
										}
										echo "</tbody>";
										echo "</table>";
									}


									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>