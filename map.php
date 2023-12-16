<?php 

$sql = "SELECT * FROM tblpeople";
$mydb->setQuery($sql);
$res = $mydb->loadResultList();
    
$totalBlock = 3;
$totalRow = 10;
$totalColumn = 10;

?>
<style>
	.map-container {
		position: relative;
		background-image: url(./img/map.png);
		background-repeat: no-repeat;
		background-size: cover;
		width: 1100px;
		height: 600px;
	}
	.legend {
		width: 100%;
		padding: 10px;
		background: #c7c9c8;
	}
	.legend ul {
		list-style: none;
		margin: 0;
		padding: 0;
	}
	.legend ul li {
		display: inline-block;
		margin-right: 10px;
		color: #000;
	}
	.legend ul li span {
		display: inline-block;
		width: 18px;
		height: 18px;
		margin-right: 5px;
		vertical-align: middle;
	}
	.heading-text{
		font-size: 30px;
		font-weight: bold;
	}
	.blocks{
		position: absolute;
		top: 10%;
		left: 0;
		width: 100%;
		height: 200px;
		display: grid;
		grid-template-columns: repeat(3, 1fr);
		grid-gap: 10px;
		padding: 10px;
	}
	.block-1 td,
	.block-2 td,
	.block-3 td {
		background-color: #fff;
		color: #000;
		border: 4px solid mediumseagreen;
		text-align: center;
		vertical-align: middle;
	}
	td .person{
		background: red;
		color: #fff;
	}
</style>

<div class="map-container">
	<div class="legend">
		<ul>
			<?php
			if (isset($_GET['name']) && isset($_GET['id'])) {
				$sql = "SELECT * FROM tblpeople WHERE PEOPLEID = '{$_GET['id']}'";
				$mydb->setQuery($sql);
				$selected = $mydb->loadSingleResult();
				echo "<li><span style='background: blue;'></span> - Selected</li>";
			}
			?>
			<li><span style="background: red;"></span> - Occupied</li>
			<li><span style="background: yellow;"></span> - Reserved</li>
			<li><span style="background: white;"></span> - Available</li>
		</ul>
	</div>
	<!-- <img src="./img/map.png" alt="map" class="map" /> -->

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
						$sql1 = "SELECT * FROM tblreserve WHERE status = 'Contacted' OR status = 'Approved'";
						$mydb->setQuery($sql1);
						$reserved = $mydb->loadResultList();

						$reservedGrave = array();
						foreach ($reserved as $key => $value) {
							array_push($reservedGrave, $value->graveno);
						}
						if (isset($res)) {
							if ($res->GRAVENO == $count) {
								if(isset($_GET['name'])){
									if ($res->PEOPLEID == $_GET['id']) {
										echo "<td style='background: blue; cursor: pointer; color: #fff;' title='$res->FNAME'>$count</td>";
									} else {
										echo "<td style='background: red; cursor: pointer; color: #fff;'title='$res->FNAME'>$count</td>";
									}
								}else{
									echo "<td style='background: red; cursor: pointer; color: #fff;'title='$res->FNAME'>$count</td>";
								}
							}
						} else {
							if (in_array($count, $reservedGrave)) {
								echo "<td style='background: yellow; cursor: pointer;' title='Reserved'>$count</td>";
							} else {
								echo "<td style='background: white; cursor: pointer;' title='Available'>$count</td>";
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

