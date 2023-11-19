<?php
$sql = "SELECT * FROM tblpeople WHERE PEOPLEID='".$_GET['id']."'";
$mydb->setQuery($sql);
$cur = $mydb->executeQuery();
$res = $mydb->loadSingleResult();
?>

<div class="container">
    <table class="table table-bordered table-hover">
        <caption><h3 align="left">Personal Information</h3></caption>
        <tr>
            <td width="30%"><strong>Grave No:</strong></td>
            <td><?php echo $res->GRAVENO; ?></td>
        </tr>
        <tr>
            <td><strong>Name:</strong></td>
            <td><?php echo $res->FNAME; ?></td>
        </tr>
        <tr>
            <td><strong>Birth Date:</strong></td>
            <td><?php echo date_format(date_create($res->BORNDATE),'m/d/Y'); ?></td>
        </tr>
        <tr>
            <td><strong>Death Date:</strong></td>
            <td><?php echo date_format(date_create($res->DIEDDATE),'m/d/Y'); ?></td>
        </tr>
        <tr>
            <td><strong>Location:</strong></td>
            <td><?php echo $res->LOCATION; ?></td>
        </tr>
        <tr>
            <td><strong>Category:</strong></td>
            <td><?php echo $res->CATEGORIES; ?></td>
        </tr>
        <tr>
            <td><strong>Action:</strong></td>
            <td>
                <a href="index.php?q=person-edit&id=<?php echo $res->PEOPLEID; ?>" class="btn btn-primary btn-xs">Edit</a>
                <a href="index.php?q=person-delete&id=<?php echo $res->PEOPLEID; ?>" class="btn btn-danger btn-xs">Delete</a>
            </td>
        </tr>
    </table>
</div>