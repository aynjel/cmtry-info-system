<?php
if (!isset($_SESSION['USERID'])) {
  redirect(web_root . "admin/index.php");
}
?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h2>
          <i class="fa fa-plus"></i> Add New Block
          <a href="index.php" class="btn btn-secondary btn-sm">
            <i class="fa fa-list"></i> List of Blocks
          </a>
        </h2>
      </div>
      <div class="card-body">
        <form class="form-horizontal span6" action="controller.php?action=add" method="POST">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="CATEGORY">Block:</label>

                <input class="form-control input-sm" id="CATEGORY" name="CATEGORY" placeholder="Block" type="text" value="">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="idno"></label>
                <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save"></span> Save</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>