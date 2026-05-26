<?php

include '../config/db.php';

$id = $_GET['id'];

$delete = "DELETE FROM contacts
WHERE id='$id'";

mysqli_query($conn,$delete);

header("Location: messages.php");

?>