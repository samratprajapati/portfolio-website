<?php

include 'config/db.php';

$id = $_GET['id'];

$select = "SELECT * FROM pyq
WHERE id='$id'";

$result = mysqli_query($conn,$select);

$row = mysqli_fetch_assoc($result);

$file = $row['file'];

mysqli_query($conn,

"UPDATE pyq SET

downloads = downloads + 1

WHERE id='$id'"

);

header("Location: uploads/".$file);

?>