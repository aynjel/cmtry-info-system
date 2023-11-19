<?php
$sql = "SELECT * FROM tblpeople WHERE PEOPLEID='".$_GET['id']."'";
$mydb->setQuery($sql);
$cur = $mydb->executeQuery();
$res = $mydb->loadSingleResult();

if (isset($_POST['delete'])) {
    # code...
    $sql = "DELETE FROM tblpeople WHERE PEOPLEID='".$_GET['id']."'";
    $mydb->setQuery($sql);
    $cur = $mydb->executeQuery();
    if ($cur) {
        # code...
        echo '<script>alert("Successfully Deleted!")</script>';
        echo '<script>window.location = "index.php?q=home"</script>';
    }


}
?>

<div class="alert alert-danger">Are you sure you want to delete this record?</div>

<form action="" method="POST">
    <button class="btn btn-danger btn-sm" name="delete" type="submit" ><span class="fa fa-trash"></span> Delete</button>
    <a href="index.php?q=person-view&id=<?php echo $res->PEOPLEID; ?>" class="btn btn-default btn-sm"><span class="fa fa-arrow-left"></span> Back</a>
</form>

