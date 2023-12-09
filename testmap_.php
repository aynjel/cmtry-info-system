<?php 
require_once ("include/initialize.php"); 

$sql = "SELECT * FROM tblpeople";
$mydb->setQuery($sql);
$res = $mydb->loadResultList();
    
$totalBlock = 3;
$totalGrave = 960;
$totalRow = 16;
$totalColumn = 15;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Cemetery Mapping and Information System</title>
    <style>
        .map-container {
            position: relative;
            text-align: center;
            color: white;
        }
        .legend {
            width: 100%;
            padding: 10px;
            background: #c7c9c8;
        }
        .legend ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .legend ul li {
            display: inline-block;
            margin-right: 10px;
            color: #000;
        }
        .legend ul li span {
            display: inline-block;
            width: 18px;
            height: 18px;
            margin-right: 5px;
            vertical-align: middle;
        }
        img {
            width: 100vw;
            height: 100vh;
        }
        .block-1 {
            padding: 0 10px;
            width: 300px;
            position: absolute;
            top: 14%;
            left: 0;
            border-spacing: 0;
        }
        .block-2 {
            padding: 0 10px;
            width: 300px;
            position: absolute;
            top: 14%;
            left: 440px;
            border-spacing: 0;
        }
        .block-3 {
            padding-left: 10px;
            width: 300px;
            position: absolute;
            top: 14%;
            right: -20px;
            border-spacing: 0;
        }
        .block-1 td,
        .block-2 td,
        .block-3 td {
            background-color: #fff;
            color: #000;
            border: .5px solid #000;
            width: 70px;
            text-align: center;
            vertical-align: middle;
        }
        td .person{
            background: red;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="map-container">
        <div class="legend">
            <ul>
                <?php
                if (isset($_GET['PEOPLEID'])) {
                    $sql = "SELECT * FROM tblpeople WHERE PEOPLEID = '{$_GET['PEOPLEID']}'";
                    $mydb->setQuery($sql);
                    $selected = $mydb->loadSingleResult();
                    echo "<li><span style='background: blue;'></span> - Selected Grave ({$selected->GRAVENO})</li>";
                }
                ?>
                <li><span style="background: red;"></span> - Occupied (<?= count($res) ?>)</li>
                <li><span style="background: yellow;"></span> - Reserved (0)</li>
                <li><span style="background: white;"></span> - Available (<?= $totalGrave - count($res) ?>)</li>
            </ul>
        </div>
        <img src="./img/map.png" alt="map" usemap="#map">

        <?php
        
            $count = 1;
            for ($i = 1; $i <= $totalBlock; $i++) {
                echo "<table class='block-$i'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th colspan='$totalColumn'>Block $i</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                for ($j = 1; $j <= $totalRow; $j++) {
                    echo "<tr>";
                    for ($k = 1; $k <= $totalColumn; $k++) {
                        $sql = "SELECT * FROM tblpeople WHERE GRAVENO = '$count'";
                        $mydb->setQuery($sql);
                        $res = $mydb->loadSingleResult();
                        if (isset($res)) {
                            if ($res->GRAVENO == $count) {
                                if ($res->PEOPLEID == $_GET['PEOPLEID']) {
                                    echo "<td style='background: blue; cursor: pointer; color: #fff;' title='$res->FNAME'>$count</td>";
                                } else {
                                    echo "<td style='background: red; cursor: pointer; color: #fff;'title='$res->FNAME'>$count</td>";
                                }
                            } else {
                                echo "<td>$count</td>";
                            }
                        } else {
                            echo "<td>$count</td>";
                        }
                        $count++;
                    }
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }
            

        ?>
    </div>

</body>
</html>