<?php

session_start();

include '../config/db.php';

if(!isset($_SESSION['admin'])){

    header("Location: login.php");

}

$success = "";

if(isset($_POST['upload_resume'])){

    $file = $_FILES['resume']['name'];

    $tmp_name = $_FILES['resume']['tmp_name'];

    move_uploaded_file(
        $tmp_name,
        "../uploads/".$file
    );

    mysqli_query($conn,"DELETE FROM resume");

    $insert = "INSERT INTO resume(file)

    VALUES('$file')";

    $result = mysqli_query($conn,$insert);

    if($result){

        $success = "Resume Uploaded Successfully!";

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Upload Resume</title>

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

        <h2>Upload Resume</h2>

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

        <input type="file"
        name="resume"
        required>

        <button type="submit"
        name="upload_resume"
        class="btn">

        Upload Resume

        </button>

        <br><br>

        <a href="dashboard.php"
        class="btn">

        Back Dashboard

        </a>

    </form>

</div>

<script src="../assets/js/script.js"></script>

</body>
</html>