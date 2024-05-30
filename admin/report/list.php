<?php
if (!isset($_SESSION['U_ROLE']) == 'Administrator') {
	redirect(web_root . "admin/index.php");
}
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h2>
					<i class="fa fa-list"></i> List of Deceased Person
				</h2>
				<div class="card-options">
					<form action="index.php" method="post">
						<div class="row">
							<div class="col-sm-6">
								<label>Address</label>
								<select class="form-control" name="LOCATION" id="LOCATION" style="width: 100%;">
									<!-- <option selected>Select Location</option> -->
									<option value="Sangi">SANGI</option>
									<option>LURAY</option>
									<option>DUMLOG</option>
									<option>CARMEN</option>
									<option>CANLUMAMPAO</option>
									<option>IBO</option>
								</select>
							</div>
							<div class="col-sm-2 d-flex align-items-center">
								<div class="form-group">
									<label>Block</label>
									<select class=" form-control" name="SECTION">
										<!-- <option selected>Select Block</option> -->
										<option>1</option>
										<option>2</option>
										<option>3</option>
									</select>
								</div>
								<button name="submit" type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px;">
									Search <i class="fa fa-search"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="card-body">
				<div id="printout" class="row">
					<div class="col-md-12">
						<div style="text-align: center;font-size: 16px;">Legacy Plains Memorial Garden</div>
						<div style="text-align: center;font-size: 14px;">Legacy Plains Memorial Garden Ibo, Toledo City</div>
						<div style="text-align: center;font-size: 20px">List of Deceased Person</div>
						<div style="text-align: center;font-size: 12px;"><?php echo isset($_POST['TYPES']) ? $_POST['TYPES'] : "";  ?></div>
						<div style="text-align: center;font-size: 12px;"><?php echo isset($_POST['LOCATION']) ? "Cemtery of " . $_POST['LOCATION']  : "";  ?></div>
						<div style="text-align: center;font-size: 12px;"><?php echo isset($_POST['SECTION']) ? "Block :" . $_POST['SECTION']  : "";  ?> </div>
						<form class="" method="POST" action="printreport.php" target="_blank">
							<div style="margin: 0px 0px 15px 0px">
								<input type="hidden" name="LOCATION" value="<?php echo isset($_POST['LOCATION']) ? $_POST['LOCATION'] : ''; ?>">
								<input type="hidden" name="SECTION" value="<?php echo isset($_POST['SECTION']) ? $_POST['SECTION'] : ''; ?>">
								<!-- <input type="hidden" name="date_pickerfrom" value="<?php echo isset($_POST['date_pickerfrom']) ? date_format(date_create($_POST['date_pickerfrom']), "Y-m-d") : ''; ?>">
						<input type="hidden" name="date_pickerto" value="<?php echo isset($_POST['date_pickerto']) ? date_format(date_create($_POST['date_pickerto']), "Y-m-d") : ""; ?>">  -->
								<button class="btn btn-secondary btn-sm" type="submit"><i class="fa fa-print"></i> Print Report</button>
							</div>
						</form>
						<div class="">


							<table id="" class="table table-striped table-bordered table-hover " style="font-size:12px" cellspacing="0">

								<thead>
									<tr>
										<th>Grave #</th>
										<th>Name of the Deceased</td>
										<th>Born</th>
										<th>Died</th>
										<th>Section</th>
										<th>Location</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$location = isset($_POST['LOCATION']) ? $_POST['LOCATION']  : "";
									$section = isset($_POST['SECTION']) ? $_POST['SECTION']  : "";

									$query = "SELECT * FROM `tblpeople` WHERE LOCATION ='{$location}'  AND CATEGORIES='{$section}'";
									$mydb->setQuery($query);
									$cur = $mydb->loadResultList();

									foreach ($cur as $result) {

										$borndate =   $result->BORNDATE;
										$dieddate =   $result->DIEDDATE;

										echo '<tr>';
										echo '<td width="8%" align="center">' . $result->GRAVENO . '</td>';
										echo '<td> ' . $result->FNAME . '</td>';
										echo '<td>' . $borndate . '</td>';
										echo '<td>' . $dieddate . '</td>';
										echo '<td>' . $result->CATEGORIES . '</td>';
										echo '<td>' . $result->LOCATION . '</td>';
										echo '</tr>';
									}
									?>
								</tbody>


							</table>
						</div>
					</div>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	function tablePrint() {
		var display_setting = "toolbar=no,location=no,directories=no,menubar=no,";
		display_setting += "scrollbars=no,width=500, height=500, left=100, top=25";
		var content_innerhtml = document.getElementById("printout").innerHTML;
		var document_print = window.open("", "", display_setting);
		document_print.document.open();
		document_print.document.write('<body style="font-family:Calibri(body);  font-size:11px;" onLoad="self.print();self.close();" >');
		document_print.document.write(content_innerhtml);
		document_print.document.write('</body></html>');
		document_print.print();
		document_print.document.close();
		return false;
	}
	$(document).ready(function() {
		oTable = jQuery('#list').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers"
		});
	});
</script>