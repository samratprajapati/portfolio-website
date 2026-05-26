<?php

session_start();

include '../config/db.php';

if(!isset($_SESSION['admin'])){

    header("Location: login.php");

}

$success = "";

if(isset($_POST['add_project'])){

    $title = $_POST['title'];

    $description = $_POST['description'];

    $image = $_FILES['image']['name'];

    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file(
        $tmp_name,
        "../uploads/".$image
    );

   $live_demo = $_POST['live_demo'];

$github_link = $_POST['github_link'];

$insert = "INSERT INTO projects
(title,description,image,live_demo,github_link)

VALUES

('$title','$description','$image',
'$live_demo','$github_link')";

    $result = mysqli_query($conn,$insert);

    if($result){

        $success = "Project Added Successfully!";

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Add Project</title>

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

        <h2>Add Project</h2>

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
        placeholder="Project Title"
        required>

        <textarea
        name="description"
        placeholder="Project Description"
        rows="5"
        required></textarea>

        <input type="file"
        name="image"
        required>

        <button type="submit"
        name="add_project"
        class="btn">

        Add Project

        </button>

        <br><br>

        <a href="dashboard.php" class="btn">
            Back Dashboard
        </a>

    </form>

</div>

<script src="../assets/js/script.js"></script>

</body>
</html>