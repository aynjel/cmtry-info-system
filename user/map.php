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
		height: 600px;
	}

	.blocks {
		position: absolute;
		top: 0;
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

	/*
	media queries
	*/

	@media screen and (max-width: 1024px) {
		.blocks table th.heading-text {
			font-size: 14px;
		}

		.blocks table td {
			width: 25px;
			height: 25px;
			font-size: 12px;
		}

		.blocks table th {
			width: 25px;
			height: 25px;
			font-size: 12px;
		}

		.blocks table.block-1 {
			top: 0;
			left: 0;
		}

		.blocks table.block-2 {
			top: 0;
			left: 400px;
		}

		.blocks table.block-3 {
			top: 0;
			left: 800px;
		}
	}

	@media screen and (max-width: 768px) {
		.blocks table th.heading-text {
			font-size: 12px;
		}

		.blocks table td {
			width: 20px;
			height: 20px;
			font-size: 10px;
		}

		.blocks table th {
			width: 20px;
			height: 20px;
			font-size: 10px;
		}

		.blocks table.block-1 {
			top: 0;
			left: 0;
		}

		.blocks table.block-2 {
			top: 0;
			left: 300px;
		}

		.blocks table.block-3 {
			top: 0;
			left: 600px;
		}
	}

	@media screen and (max-width: 480px) {
		.blocks table th.heading-text {
			font-size: 10px;
		}

		.blocks table td {
			width: 15px;
			height: 15px;
			font-size: 8px;
		}

		.blocks table th {
			width: 15px;
			height: 15px;
			font-size: 8px;
		}

		.blocks table.block-1 {
			top: 0;
			left: 0;
		}

		.blocks table.block-2 {
			top: 0;
			left: 200px;
		}

		.blocks table.block-3 {
			top: 0;
			left: 400px;
		}
	}

	@media screen and (max-width: 320px) {
		.blocks table th.heading-text {
			font-size: 8px;
		}

		.blocks table td {
			width: 10px;
			height: 10px;
			font-size: 6px;
		}

		.blocks table th {
			width: 10px;
			height: 10px;
			font-size: 6px;
		}

		.blocks table.block-1 {
			top: 0;
			left: 0;
		}

		.blocks table.block-2 {
			top: 0;
			left: 100px;
		}

		.blocks table.block-3 {
			top: 0;
			left: 200px;
		}
	}

	@media screen and (max-width: 280px) {
		.blocks table th.heading-text {
			font-size: 6px;
		}

		.blocks table td {
			width: 8px;
			height: 8px;
			font-size: 4px;
		}

		.blocks table th {
			width: 8px;
			height: 8px;
			font-size: 4px;
		}

		.blocks table.block-1 {
			top: 0;
			left: 0;
		}

		.blocks table.block-2 {
			top: 0;
			left: 50px;
		}

		.blocks table.block-3 {
			top: 0;
			left: 100px;
		}
	}

	@media screen and (max-width: 240px) {
		.blocks table th.heading-text {
			font-size: 4px;
		}

		.blocks table td {
			width: 6px;
			height: 6px;
			font-size: 2px;
		}

		.blocks table th {
			width: 6px;
			height: 6px;
			font-size: 2px;
		}

		.blocks table.block-1 {
			top: 0;
			left: 0;
		}

		.blocks table.block-2 {
			top: 0;
			left: 25px;
		}

		.blocks table.block-3 {
			top: 0;
			left: 50px;
		}
	}

	@media screen and (max-width: 200px) {
		.blocks table th.heading-text {
			font-size: 2px;
		}

		.blocks table td {
			width: 4px;
			height: 4px;
			font-size: 1px;
		}

		.blocks table th {
			width: 4px;
			height: 4px;
			font-size: 1px;
		}

		.blocks table.block-1 {
			top: 0;
			left: 0;
		}

		.blocks table.block-2 {
			top: 0;
			left: 12.5px;
		}

		.blocks table.block-3 {
			top: 0;
			left: 25px;
		}
	}

	@media screen and (max-width: 160px) {
		.blocks table th.heading-text {
			font-size: 1px;
		}

		.blocks table td {
			width: 3px;
			height: 3px;
			font-size: 1px;
		}

		.blocks table th {
			width: 3px;
			height: 3px;
			font-size: 1px;
		}

		.blocks table.block-1 {
			top: 0;
			left: 0;
		}

		.blocks table.block-2 {
			top: 0;
			left: 6.25px;
		}

		.blocks table.block-3 {
			top: 0;
			left: 12.5px;
		}
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
								<li><span style="background: yellow;"></span> - Reserved</li>
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
								<img src="img/map.png" alt="map" class="map">
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
												$sql = "SELECT * FROM tblpeople WHERE GRAVENO = '$count'";
												$mydb->setQuery($sql);
												$res = $mydb->loadSingleResult();
												// get reserved grave
												// $sql1 = "SELECT * FROM tblreserve WHERE status = 'Contacted'";
												$sql1 = "SELECT * FROM tblreserve";
												$mydb->setQuery($sql1);
												$reserved = $mydb->loadResultList();

												$reservedGrave = array();
												foreach ($reserved as $key => $value) {
													array_push($reservedGrave, $value->graveno);
												}
												if (isset($res)) {
													if ($res->GRAVENO == $count) {
														echo "<td style='background: red; cursor: pointer; color: #fff;'title='$res->FNAME'>$count</td>";
													}
												} else {
													if (in_array($count, $reservedGrave)) {
														echo "<td style='background: yellow; cursor: pointer;' title='Reserved'>$count</td>";
													} else {
														echo "<td style='background: white; cursor: pointer;' title='Available'>";
														echo "<a href='?q=reserve-plot-form&graveno=$count&block=$i' style='color: #000; text-decoration: none;'>$count</a>";
														echo "</td>";
													}
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