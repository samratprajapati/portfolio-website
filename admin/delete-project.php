<?php

include '../config/db.php';

$id = $_GET['id'];

$select = "SELECT * FROM projects
WHERE id='$id'";

$result = mysqli_query($conn,$select);

$row = mysqli_fetch_assoc($result);

$image = $row['image'];

unlink("../uploads/".$image);

$delete = "DELETE FROM projects
WHERE id='$id'";

mysqli_query($conn,$delete);

header("Location: manage-projects.php");

?>