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
		color: #fff;
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
		/* border-collapse: collapse; */
	}

	.blocks table td {
		/* border: 1px solid #000; */
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
		<div class="card card-table">
			<div class="card-header">
				<h4 class="card-title">
					Graveyard Map Information of <?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>
				</h4>
				<!-- back button -->
				<a href="index.php?q=map" class="btn btn-primary btn-sm">Back</a>
				<!-- details button -->
				<?php if (isset($_GET['name'])) : ?>
					<a href="index.php?q=person-info&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>" class="btn btn-primary btn-sm">Details</a>
				<?php endif; ?>
			</div>
			<div class="card-body">
				<div class="legend">
					<ul>
						<li><span style="background: blue;"></span> - Selected</li>
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
						<img src="../img/map.png" alt="map" class="map">
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
											if ($object->status == 'Approved') {
												echo "<td style='background: red; cursor: pointer;' title='Occupied'>$count</td>";
											} else if ($object->status == 'Contacted') {
												echo "<td style='background: yellow; cursor: pointer;' title='Reserved'>$count</td>";
											} else {
												echo "<td style='background: white; cursor: pointer;' title='Available'>$count</td>";
											}
										} else {
											echo "<td style='background: white; cursor: pointer;' title='Available'>$count</td>";
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