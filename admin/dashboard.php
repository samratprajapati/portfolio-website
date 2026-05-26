<?php

session_start();

include '../config/db.php';
/* Admin Data */

$admin_query = mysqli_query(

$conn,

"SELECT * FROM admin
LIMIT 1"

);

$admin =
mysqli_fetch_assoc($admin_query);

if(!isset($_SESSION['admin'])){

    header("Location: login.php");

}


/* Total Projects */

$project_count =
mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM projects")
);


/* Total Messages */

$message_count =
mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM contacts")
);


/* Resume Status */

$resume_count =
mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM resume")
);

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link rel="stylesheet"
href="../assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>


<!-- Sidebar -->

<div class="sidebar">

   <div class="admin-profile">

    <img src="../uploads/<?php
echo trim($admin['image']);
?>"

alt="Admin">

    <h3>
        <?php
        echo $admin['name'];
        ?>
    </h3>

    <p>
        <?php
        echo $admin['email'];
        ?>
    </p>
<li>

    <a href="change-password.php" target="content-frame">

        <i class="fa-solid fa-lock"></i>

        Change Password

    </a>

</li>
</div>
    <ul>

       <li>

    <a href="overview.php"
    target="content-frame">

        <i class="fa-solid fa-house"></i>

        Dashboard

    </a>

</li>


        <li>

            <a href="add-project.php" target="content-frame">

                <i class="fa-solid fa-plus"></i>

                Add Project

            </a>

        </li>


        <li>

            <a href="manage-projects.php" target="content-frame">

                <i class="fa-solid fa-folder-open"></i>

                Manage Projects

            </a>

        </li>


        <li>

            <a href="messages.php" target="content-frame">

                <i class="fa-solid fa-envelope"></i>

                Messages

            </a>

        </li>
<li>

    <a href="upload-notes.php" target="content-frame">

        <i class="fa-solid fa-book"></i>

        Upload Notes

    </a>

</li>

<li>

    <a href="manage-notes.php" target="content-frame">

        <i class="fa-solid fa-book"></i>

        Manage Notes

    </a>

</li>

<li>

    <a href="upload-pyq.php" target="content-frame">

        <i class="fa-solid fa-file-lines"></i>

        Upload PYQ

    </a>

</li>

<li>

    <a href="manage-pyq.php" target="content-frame">

        <i class="fa-solid fa-file-lines"></i>

        Manage PYQ

    </a>

</li>
<li>

    <a href="upload-certificate.php"
    target="content-frame">

        <i class="fa-solid fa-award"></i>

        Upload Certificate

    </a>

</li>


<li>

    <a href="manage-certificates.php"
    target="content-frame">

        <i class="fa-solid fa-medal"></i>

        Manage Certificates

    </a>

</li>

        <li>

            <a href="upload-resume.php" target="content-frame">

                <i class="fa-solid fa-file-arrow-up"  ></i>

                Upload Resume

            </a>

        </li>


        <li>

            <a href="logout.php" target="content-frame">

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </a>

        </li>

    </ul>

</div>



<!-- Main Content -->
<!-- Main Content -->

<div class="main-content">

    <iframe

    src="overview.php"

    name="content-frame"

    frameborder="0">

    </iframe>

</div>

</body>
</html>