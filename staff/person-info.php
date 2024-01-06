<!-- person info -->	
<!-- get info from id and name -->
<?php
if (isset($_GET['id']) && isset($_GET['name'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $sql = "SELECT * FROM tblpeople WHERE GRAVENO = '$id' AND FNAME = '$name'";
    $mydb->setQuery($sql);
    $res = $mydb->loadSingleResult();
}
?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Person Info</h4>
    </div>
    <div class="card-body">
        <!-- list of person info -->
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <strong>Grave No:</strong>
                    </div>
                    <div class="col-md-9">
                        <?php echo $res->GRAVENO; ?>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <strong>Name:</strong>
                    </div>
                    <div class="col-md-9">
                        <?php echo $res->FNAME . " " . $res->LNAME; ?>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <strong>Birthdate:</strong>
                    </div>
                    <div class="col-md-9">
                        <?php echo date('l, F d, Y', strtotime($res->BORNDATE)); ?>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <strong>Date of Death:</strong>
                    </div>
                    <div class="col-md-9">
                        <?php echo date('l, F d, Y', strtotime($res->DIEDDATE)); ?>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <strong>Burial Date:</strong>
                    </div>
                    <div class="col-md-9">
                        <?php echo date('l, F d, Y', strtotime($res->BURIALDATE)); ?>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <strong>Address:</strong>
                    </div>
                    <div class="col-md-9">
                        <?php echo $res->LOCATION; ?>
                    </div>
                </div>
            </li>
        </ul>    
    </div>
</div>