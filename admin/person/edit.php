<?php
if (!isset($_SESSION['USERID'])) {
  redirect(web_root . "index.php");
}

$peopleid = $_GET['id'];
$person = new Person();
$p = $person->single_people($peopleid);
?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h2>
          <i class="fa fa-edit"></i> Update Deceased Person
        </h2>
      </div>
      <div class="card-body">
        <form action="controller.php?action=edit" method="POST">

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="GRAVENO">Number:</label>

                <input type="hidden" name="PEOPLEID" value="<?php echo $p->PEOPLEID; ?>">
                <input class="form-control input-sm" id="GRAVENO" name="GRAVENO" placeholder="Grave Number" type="text" value="<?php echo $p->GRAVENO ?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="FNAME">Full Name:</label>

                <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder="Full Name" type="text" value="<?php echo $p->FNAME ?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="CATEGORIES">Block:</label>

                <select class="form-control input-sm" name="CATEGORIES" id="CATEGORIES">
                  <option value="None">Select Block</option>

                  <?php
                  $mydb->setQuery("SELECT * FROM `tblcategory` where CATEGORIES = '" . $p->CATEGORIES . "'");
                  $cur = $mydb->loadResultList();
                  foreach ($cur as $result) {
                    echo  '<option SELECTED  value=' . $result->CATEGORIES . ' >' . $result->CATEGORIES . '</option>';
                  }


                  $mydb->setQuery("SELECT * FROM `tblcategory` where CATEGORIES != '" . $p->CATEGORIES . "'");
                  $cur = $mydb->loadResultList();
                  foreach ($cur as $result) {
                    echo  '<option  value=' . $result->CATEGORIES . ' >' . $result->CATEGORIES . '</option>';
                  }
                  ?>


                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="BORNDATE">Born:</label>

                <input name="BORNDATE" value="<?php echo $p->BORNDATE ?>" type="date" class="form-control input-sm datemask2">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="DIEDDATE">Died:</label>

                <input name="DIEDDATE" value="<?php echo $p->DIEDDATE ?>" type="date" class="form-control input-sm datemask2">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="BURIALDATE">Burial Date:</label>

                <input name="BURIALDATE" value="<?php echo $p->BURIALDATE ?>" type="date" class="form-control input-sm datemask2">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="LOCATION">Address:</label>
                <select class="form-control input-sm" name="LOCATION" id="LOCATION">
                  <option <?php echo ($p->LOCATION == 'Dumlog') ? 'selected' : ''; ?> value="Dumlog">Dumlog</option>
                  <option <?php echo ($p->LOCATION == 'Sangi') ? 'selected' : ''; ?> value="Sangi">Sangi</option>
                  <option <?php echo ($p->LOCATION == 'Poog') ? 'selected' : ''; ?> value="Poog">Poog</option>
                  <option <?php echo ($p->LOCATION == 'Luray') ? 'selected' : ''; ?> value="Luray">Luray</option>
                  <option <?php echo ($p->LOCATION == 'Canlumampao') ? 'selected' : ''; ?> value="Canlumampao">Canlumampao</option>

                </select>

                <!-- <input class="form-control input-sm" id="LOCATION" name="LOCATION" placeholder="Address" type="text" value="<?php echo $p->LOCATION ?>"> -->
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="idno"></label>

                <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span> Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>