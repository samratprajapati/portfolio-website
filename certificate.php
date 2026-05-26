<?php
include 'config/db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSamrat Portfolio</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>


   
<!-- Header -->
<?php include 'header.php'; ?>

<!-- Certificates -->

<section class="notes-page" id="certificates">

<h2 class="section-title">

Certificates

</h2>


<div class="notes-container">

<?php

$certificates = mysqli_query(

$conn,

"SELECT * FROM certificates
ORDER BY id DESC"

);


while($cert =
mysqli_fetch_assoc(
$certificates
)){

?>

<div class="notes-card">

<div class="notes-icon">

<i class="fa-solid fa-award"></i>

</div>


<h3>

<?php
echo $cert['title'];
?>

</h3>


<a href="certificate_uploads/<?php
echo $cert['file'];
?>"

target="_blank"

class="download-btn">

View Certificate

</a>

</div>

<?php } ?>

</div>

</section>


  



    <!-- Footer -->
   <?php include 'footer.php'; ?>


    <!-- JS -->
    <script src="assets/js/script.js"></script>

</body>
</html>