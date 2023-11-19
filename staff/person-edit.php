<?php
$sql = "SELECT * FROM tblpeople WHERE PEOPLEID='".$_GET['id']."'";
$mydb->setQuery($sql);
$cur = $mydb->executeQuery();
$res = $mydb->loadSingleResult();

if (isset($_POST['save'])) {
    # code...
    $sql = "UPDATE tblpeople SET GRAVENO='".$_POST['graveno']."', FNAME='".$_POST['fname']."', BORNDATE='".$_POST['borndate']."', DIEDDATE='".$_POST['dieddate']."', LOCATION='".$_POST['location']."' WHERE PEOPLEID='".$_POST['id']."'";
    $mydb->setQuery($sql);
    $cur = $mydb->executeQuery();
    if ($cur) {
        # code...
        echo '<script>alert("Successfully Updated!")</script>';
        echo '<script>window.location = "index.php?q=person-view&id='.$_POST['id'].'"</script>';
    }
}
?>

<div class="container">
    <form action="" class="form-horizontal" method="POST">
    <table class="table table-bordered table-hover">
        <caption><h3 align="left">Edit Information</h3></caption>
            <tr>
                <td width="30%"><strong>Grave No:</strong></td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $res->PEOPLEID; ?>">
                    <input type="text" name="graveno" value="<?php echo $res->GRAVENO; ?>" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td><strong>Name:</strong></td>
                <td>
                    <input type="text" name="fname" value="<?php echo $res->FNAME; ?>" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td><strong>Birth Date:</strong></td>
                <td>
                    <input type="date" name="borndate" value="<?php echo $res->BORNDATE; ?>" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td><strong>Death Date:</strong></td>
                <td>
                    <input type="date" name="dieddate" value="<?php echo $res->DIEDDATE; ?>" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td><strong>Location:</strong></td>
                <td>
                    <select name="location" class="form-control" required>
                        <option value="">Select Location</option>
                        <option value="SANGI" <?php if($res->LOCATION == 'SANGI') echo 'selected'; ?>>SANGI</option>
                        <option value="LURAY" <?php if($res->LOCATION == 'LURAY') echo 'selected'; ?>>LURAY</option>
                        <option value="DUMLOG" <?php if($res->LOCATION == 'DUMLOG') echo 'selected'; ?>>DUMLOG</option>
                    </select>
                </td>
            </tr>
        </table>
        <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save"></span> Save</button>
        <a href="index.php?q=person-view&id=<?php echo $res->PEOPLEID; ?>" class="btn btn-default btn-sm"><span class="fa fa-arrow-left"></span> Back</a>
    </form>         
</div>