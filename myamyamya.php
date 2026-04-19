<?php

$data = [
    ["название игрушки", "цена", "магазин", "наличие"]
];
м
$json = file_get_contents("myamya.json");
$jsonData = json_decode($json, true);

for ($i = 0; $i < count($jsonData); $i++) {
    $data[] = $jsonData[$i];
}

$filter = $_GET['filter'] ?? 'all';

?>

<form method="GET">
    <select name="filter" onchange="this.form.submit()">
        <option value="all" <?= $filter == 'all' ? 'selected' : '' ?>>все</option>
        <option value="yes" <?= $filter == 'yes' ? 'selected' : '' ?>>есть в магазине</option>
        <option value="no" <?= $filter == 'no' ? 'selected' : '' ?>>нет в магазине</option>
    </select>
</form>

<?php

echo "<table border='1' cellpadding='5' cellspacing='0'>";

foreach ($data as $index => $row) {

    if ($index != 0) {
        $status = $row[3];

        if ($filter == 'yes' && $status != 'есть') continue;
        if ($filter == 'no' && $status != 'нет') continue;
    }

    echo "<tr>";

    foreach ($row as $cell) {

        if ($index == 0) {
            echo "<th>$cell</th>";
        } else {
            echo "<td>$cell</td>";
        }

    }

    echo "</tr>";
}

echo "</table>";

?>
