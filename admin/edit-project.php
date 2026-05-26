<?php

session_start();

include '../config/db.php';

if(!isset($_SESSION['admin'])){

    header("Location: login.php");

}

$id = $_GET['id'];

$select = "SELECT * FROM projects
WHERE id='$id'";

$result = mysqli_query($conn,$select);

$row = mysqli_fetch_assoc($result);

$success = "";

if(isset($_POST['update_project'])){

    $title = $_POST['title'];

    $description = $_POST['description'];

    $image = $_FILES['image']['name'];

    if($image != ""){

        $tmp_name =
        $_FILES['image']['tmp_name'];

        move_uploaded_file(
            $tmp_name,
            "../uploads/".$image
        );

        $update = "UPDATE projects SET

        title='$title',

        description='$description',

        image='$image'

        WHERE id='$id'";

    }
    else{

        $update = "UPDATE projects SET

        title='$title',

        description='$description'

        WHERE id='$id'";

    }

    $result_update =
    mysqli_query($conn,$update);

    if($result_update){

        $success =
        "Project Updated Successfully!";

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Edit Project</title>

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

        <h2>Edit Project</h2>

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

        value="<?php
        echo $row['title'];
        ?>"

        required>

        <textarea
        name="description"
        rows="5"
        required><?php
        echo $row['description'];
        ?></textarea>

        <br>

        <img src="../uploads/<?php
        echo $row['image'];
        ?>"
        width="100%"
        style="border-radius:15px; margin-bottom:20px;">

        <input type="file"
        name="image">

        <button type="submit"
        name="update_project"
        class="btn">

        Update Project

        </button>

        <br><br>

        <a href="manage-projects.php"
        class="btn">

        Back

        </a>

    </form>

</div>

<script src="../assets/js/script.js"></script>

</body>
</html>