<?php

include '../config/db.php';

$project_count =
mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM projects")
);

$message_count =
mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM contacts")
);

$notes_count =
mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM notes")
);

$pyq_count =
mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM pyq")
);

?>

<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet"
href="../assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<div class="overview-page">

    <h1 class="section-title">

        Dashboard Overview

    </h1>

    <div class="stats-container">

        <div class="stats-card">

            <i class="fa-solid fa-folder"></i>

            <h2>
                <?php echo $project_count; ?>
            </h2>

            <p>Total Projects</p>

        </div>


        <div class="stats-card">

            <i class="fa-solid fa-envelope"></i>

            <h2>
                <?php echo $message_count; ?>
            </h2>

            <p>Total Messages</p>

        </div>


        <div class="stats-card">

            <i class="fa-solid fa-book"></i>

            <h2>
                <?php echo $notes_count; ?>
            </h2>

            <p>Total Notes</p>

        </div>


        <div class="stats-card">

            <i class="fa-solid fa-file-lines"></i>

            <h2>
                <?php echo $pyq_count; ?>
            </h2>

            <p>Total PYQ</p>

        </div>

    </div>

</div>

</body>
</html>