<?php

session_start();

include '../config/db.php';


if(!isset($_SESSION['admin'])){

    header("Location: login.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Manage Certificates</title>

<link rel="stylesheet"
href="../assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>


<section class="manage-page">

<h2 class="section-title">

<i class="fa-solid fa-award"></i>

Certificates

</h2>


<div class="notes-container">

<?php

$select = mysqli_query(

$conn,

"SELECT * FROM certificates
ORDER BY id DESC"

);


// Check Certificates

if(mysqli_num_rows($select) > 0){


while($row = mysqli_fetch_assoc(
$select
)){

?>



<!-- Certificate Card -->

<div class="notes-card">


<div class="notes-icon">

<i class="fa-solid fa-medal"></i>

</div>


<h3>

<?php
echo $row['title'];
?>

</h3>



<div class="project-buttons">


<a href="edit-certificate.php?id=<?php
echo $row['id'];
?>"

class="edit-btn">

Edit

</a>


<a href="../certificate_uploads/<?php
echo $row['file'];
?>"

target="_blank"

class="btn">

View

</a>


<a href="delete-certificate.php?id=<?php
echo $row['id'];
?>"

class="delete-btn">

Delete

</a>

</div>

</div>


<?php } ?>


<?php } else { ?>


<h2 class="no-data">

No Certificates Uploaded

</h2>


<?php } ?>

</div>

</section>

</body>
</html>