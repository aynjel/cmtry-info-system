<?php 
$search = isset( $_POST['search']) ? $_POST['search'] : "";
// $search = isset( $_GET['name']) ? $_GET['name'] : "";
$location = isset($_GET['location']) ? $_GET['location'] : '';
?>
<table id="" class="table">
	<thead>
		<tr>
			<th>Grave No</th>
			<th>Name of the Deceased</th>
			<th>Born</th>
			<th>Died</th>
			<th>Location</th>
			<th>Years Buried</th>
		</tr>
	</thead>
	<tbody>
		<?php

		if (isset($_GET['location'])) {
			# code...
			if (isset($_GET['name'])) {
				# code...
				$sql = "SELECT * FROM tblpeople WHERE LOCATION='".$location."' AND GRAVENO = '".$_GET['graveno']."' AND FNAME ='".$_GET['name']."'";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$numrows = $mydb->num_rows($cur);//get the number of count
			}else{
				$sql = "SELECT * FROM tblpeople WHERE LOCATION='".$location."'";
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

				//date in mm/dd/yyyy format; or it can be in other formats as well
  // $birthDate = "12/17/1983";

//   var_dump($res->DIEDDATE);

  @$formatdate = date_format(date_create($res->DIEDDATE),'m/d/Y');
  $birthDate = $formatdate;
  //explode the date to get month, day and year
  $birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  @$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
  // echo "Age is:" . $age;


				echo '<tr>';
				echo '<td>'.$res->GRAVENO.'</td>';
				echo '<td><a href="index.php?q=person-view&id='.$res->PEOPLEID.'">'. $res->FNAME.'</a></td>';
				echo '<td>'.$res->BORNDATE.'</td>';
				echo '<td>'.$res->DIEDDATE.'</td>';
				echo '<td>'.$res->LOCATION.'</td>';
				echo '<td>'.$age.'</td>';
				echo '</tr>';

			}

		}else{
				echo '<tr>'; 
				echo '<td colspan="5" style="text-align:center">No Record Found!</td>'; 
				echo '</tr>'; 
		}
			  



		?>
		  
	</tbody>
</table>

