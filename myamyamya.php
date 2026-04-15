<?php

$json = file_get_contents("myamya.json");
$data = json_decode($json, true);

echo "<table border='1' cellpadding='5' cellspacing='0'>";

foreach ($data as $row) {
    echo "<tr>";
    
        foreach ($row as $cell) {
            echo "<td>$cell</td>";
        }

    echo "</tr>";
}

echo "</table>";
?>