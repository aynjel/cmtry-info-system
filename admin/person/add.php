<?php
if (!isset($_SESSION['USERID'])) {
  redirect(web_root . "index.php");
}
?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h2>
          <i class="fa fa-plus"></i> Add New Deceased
          <a href="index.php" class="btn btn-secondary btn-sm">
            <i class="fa fa-list"></i> List of Deceased
          </a>
        </h2>
      </div>
      <div class=" card-body">
        <form action="controller.php?action=add" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="GRAVENO">Plot No.:</label>
                <input class="form-control input-sm" id="GRAVENO" name="GRAVENO" placeholder="Grave Number" type="test" value="" min="1" max="300" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="CATEGORIES">Block:</label>

                <select class="form-control input-sm" name="CATEGORIES" id="CATEGORIES">
                  <option selected hidden disabled>Select Block</option>
                  <option value="1">1 (Plot no. 1 - 100)</option>
                  <option value="2">2 (Plot no. 101 - 200)</option>
                  <option value="3">3 (Plot no. 201 - 300)</option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="FNAME">Full Name:</label>

                <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder="Full Name" type="text" value="">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="BORNDATE">Born:</label>

                <div class="input-group" id="">
                  <input name="BORNDATE" value="" type="date" class="form-control input-sm datemask2">
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="DIEDDATE">Died:</label>

                <div class="input-group" id="">
                  <input name="DIEDDATE" value="" type="date" class="form-control input-sm datemask2">
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="BURIALDATE">Burial Date:</label>

                <div class="input-group" id="">
                  <input name="BURIALDATE" value="" type="date" class="form-control input-sm datemask2">
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="LOCATION">Address:</label>
                <select class="form-control input-sm" name="LOCATION" id="LOCATION">
                  <option selected hidden disabled>Select Address</option>
                  <option value="Dumlog">Dumlog</option>
                  <option value="Sangi">Sangi</option>
                  <option value="Poog">Poog</option>
                  <option value="Luray">Luray</option>
                  <option value="Canlumampao">Canlumampao</option>
                </select>
                <!-- <input class="form-control input-sm" id="LOCATION" name="LOCATION" placeholder="Address" type="text"> -->

              </div>
            </div>

            <hr>
            <p>
              <i>
                Person to be Contact
              </i>
            </p>

            <div class="col-md-3">
              <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control input-sm" id="email" name="con_email" placeholder="test@email.com" type="email">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="number">Contact Number:</label>
                <input class="form-control input-sm" id="number" name="con_number" placeholder="0912345678" type="text">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <button class="btn  btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span> Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>