<?php

include '../config/db.php';


$id = $_GET['id'];


// Get File Name

$select = mysqli_query(

$conn,

"SELECT * FROM certificates
WHERE id='$id'"

);


$row = mysqli_fetch_assoc(
$select
);


// Delete File

unlink(

"../certificate_uploads/".
$row['file']

);


// Delete Database

mysqli_query(

$conn,

"DELETE FROM certificates
WHERE id='$id'"

);


// Redirect

header(
"Location: manage-certificates.php"
);

?>