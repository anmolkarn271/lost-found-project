<?php
include "config/db.php";

$res = mysqli_query($conn, "SELECT * FROM items ORDER BY id DESC");

function safe($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Items</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h2>All Items</h2>

<table border="1">

<tr>
    <th>Type</th>
    <th>Name</th>
    <th>Description</th>
    <th>Location</th>
    <th>Contact</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($res)) { ?>

<tr>

    <td><?= safe($row['type']) ?></td>

    <td><?= safe($row['name']) ?></td>

    <td><?= safe($row['description']) ?></td>

    <td><?= safe($row['location']) ?></td>

    <td><?= safe($row['contact']) ?></td>

</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>