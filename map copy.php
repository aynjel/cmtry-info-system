<?php 

$sql = "SELECT * FROM tblpeople";
$mydb->setQuery($sql);
$res = $mydb->loadResultList();
    
// $totalBlock = 3;
$totalGrave = 960;
$totalRow = 23;
$totalColumn = 14;

?>
<style>
	.map-container {
		position: relative;
		width: 100%;
		height: auto;
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
	.map {
		width: 100%;
		height: 130vh;
	}
	.heading-text{
		font-size: 30px;
		font-weight: bold;
	}
	.blocks{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
		gap: 10px;
		padding: 0 10px;
	}
	.block-1 td,
	.block-2 td,
	.block-3 td {
		background-color: #fff;
		color: #000;
		border: .5px solid #000;
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
			if (isset($_GET['name'])) {
				$sql = "SELECT * FROM tblpeople WHERE PEOPLEID = '{$_GET['id']}'";
				$mydb->setQuery($sql);
				$selected = $mydb->loadSingleResult();
				echo "<li><span style='background: blue;'></span> - Selected Grave</li>";
			}
			?>
			<li><span style="background: red;"></span> - Occupied</li>
			<li><span style="background: yellow;"></span> - Reserved</li>
			<li><span style="background: white;"></span> - Available</li>
		</ul>
	</div>
	<img src="./img/map.png" alt="map" class="map" />

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
				if($i == $_GET['section']) {
					for ($j = 1; $j <= $totalRow; $j++) {
						echo "<tr>";
						for ($k = 1; $k <= $totalColumn; $k++) {
							$selected = "";
							if (isset($_GET['name'])) {
								if ($count == $_GET['id']) {
									$selected = "person";
								}
							}
							echo "<td class='$selected'><a href='index.php?q=person&id=$count&name=$selected'>$count</a></td>";
							$count++;
						}
						echo "</tr>";
					}
				} else {
					for ($j = 1; $j <= $totalRow; $j++) {
						echo "<tr>";
						for ($k = 1; $k <= $totalColumn; $k++) {
							$selected = "";
							if (isset($_GET['name'])) {
								if ($count == $_GET['id']) {
									$selected = "person";
								}
							}
							echo "<td class='$selected'>$count</td>";
							$count++;
						}
						echo "</tr>";
					}
				}

				echo "</tbody>";
				echo "</table>";
			}
			

		?>
	</div>
</div>

