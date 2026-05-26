<?php

session_start();

include '../config/db.php';

if(!isset($_SESSION['admin'])){

    header("Location: login.php");

}

$success = "";

if(isset($_POST['upload_pyq'])){

    $title = $_POST['title'];

    $file = $_FILES['file']['name'];

    $tmp_name = $_FILES['file']['tmp_name'];

    move_uploaded_file(
        $tmp_name,
        "../uploads/".$file
    );

    $insert = "INSERT INTO pyq
    (title,file)

    VALUES

    ('$title','$file')";

    $result = mysqli_query($conn,$insert);

    if($result){

        $success = "PYQ Uploaded Successfully!";

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Upload PYQ</title>

<link rel="stylesheet"
href="../assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<div class="login-container">

    <form method="POST"
    enctype="multipart/form-data"
    class="login-form">

        <h2>Upload PYQ</h2>

        <?php

        if($success != ""){

            echo "

            <div class='toast success-toast'>

                <i class='fa-solid fa-circle-check'></i>

                <span>$success</span>

            </div>

            ";

        }

        ?>

        <input type="text"
        name="title"
        placeholder="PYQ Title"
        required>

        <input type="file"
        name="file"
        required>

        <button type="submit"
        name="upload_pyq"
        class="btn">

        Upload PYQ

        </button>

    </form>

</div>

<script src="../assets/js/script.js"></script>

</body>
</html>