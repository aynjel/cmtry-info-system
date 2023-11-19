<table id="" class="table">
	<thead>
		<tr>
			<th>Issue</th>
			<th>Type</th>
			<th>Created</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$sql = "SELECT * FROM tblreports";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);
		$cur = $mydb->loadResultList();

		foreach ($cur as $res) {
			echo '<tr>';
			echo '<td>'.$res->issue.'</td>';
			echo '<td>'.$res->report_type.'</td>';
			echo '<td>'.date_format(date_create($res->created),'m/d/Y').'</td>';
			echo '</tr>';
		}
		?>
    </tbody>
</table>