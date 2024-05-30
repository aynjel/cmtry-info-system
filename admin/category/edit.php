<?php
if (!isset($_SESSION['USERID'])) {
  redirect(web_root . "admin/index.php");
}


$categoryid = $_GET['id'];
$category = new Category();
$singlecategory = $category->single_category($categoryid);

?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h2>
          <i class="fa fa-edit"></i> Update Block
        </h2>
      </div>
      <div class="card-body">
        <form action="controller.php?action=edit" method="POST">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="CATEGORY">Block:</label>

                <input id="CATEGID" name="CATEGID" type="HIDDEN" value="<?php echo $singlecategory->CATEGID; ?>">
                <input class="form-control input-sm" id="CATEGORY" name="CATEGORY" placeholder="Block" type="text" value="<?php echo $singlecategory->CATEGORIES; ?>">
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