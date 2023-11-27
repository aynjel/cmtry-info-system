<?php 
// error_reporting(0);
$search = isset( $_POST['search']) ? $_POST['search'] : "";
$location = isset($_GET['location']) ? $_GET['location'] : '';
?> 
<div class="card">
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
						<option value="Canlumampao" <?= $location=='Canlumampao' ? 'selected' : ''; ?>>Dumlog</option>
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
						<!-- <th>Years Buried</th> -->
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
		<?php

		if (isset($_POST['location'])) {
			# code...
			if (isset($_GET['name'])) {
				# code...
				$sql = "SELECT * FROM tblpeople WHERE LOCATION='".$_POST['location']."' AND GRAVENO = '".$_GET['graveno']."' AND FNAME ='".$_GET['name']."'";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$numrows = $mydb->num_rows($cur);//get the number of count
			}else{
				$sql = "SELECT * FROM tblpeople WHERE LOCATION='".$_POST['location']."'";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$numrows = $mydb->num_rows($cur);//get the number of count
			}
		 
		}elseif (isset( $_POST['search'])){
			$sql = "SELECT * FROM tblpeople WHERE FNAME LIKE '%".$search."%'";
			$mydb->setQuery($sql);
			$cur = $mydb->executeQuery();
			$numrows = $mydb->num_rows($cur);//get the number of count
		}else{
			$sql = "SELECT * FROM tblpeople";
			$mydb->setQuery($sql);
			$cur = $mydb->executeQuery();
			$numrows = $mydb->num_rows($cur);//get the number of count
		}
  
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
				// echo '<td>'.$res->STATUS.'</td>';
				echo '<td class="text-right"><a href="index.php?q=person&graveno='.$res->GRAVENO.'&name='.$res->FNAME.'&location='.$res->LOCATION.'&section='.$res->CATEGORIES.'" class="btn btn-primary btn-sm">View</a></td>';
				echo '</tr>';

			}

		}else{
				echo '<tr>'; 
				echo '<td colspan="7" style="text-align:center">No Record Found!</td>'; 
				echo '</tr>'; 
		}
			  



		?>
		  
				</tbody>
			</table>
		</div>
	</div>
</div>