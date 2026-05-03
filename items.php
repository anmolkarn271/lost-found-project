<?php
include "config/db.php";
$res = mysqli_query($conn, "SELECT * FROM items ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Found Item</title>
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
    <td><?= $row['type'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['description'] ?></td>
    <td><?= $row['location'] ?></td>
    <td><?= $row['contact'] ?></td>
</tr>
<?php } ?>
</table>
<br>
<a href="dashboard.php">Back to Dashboard</a>