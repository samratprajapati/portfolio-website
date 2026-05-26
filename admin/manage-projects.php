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

<title>Manage Projects</title>

<link rel="stylesheet"
href="../assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>


<section class="manage-page">

    <h2 class="section-title">

        Manage Projects

    </h2>


    <!-- Search -->

    <form method="GET"
    class="search-form">

        <input type="text"

        name="search"

        placeholder="Search Projects...">

        <button type="submit"
        class="btn">

            Search

        </button>

    </form>



    <!-- Projects -->

    <div class="project-container">

        <?php


        // Search Query

        if(isset($_GET['search'])){

            $search = $_GET['search'];

            $select = "SELECT * FROM projects

            WHERE title LIKE '%$search%'

            ORDER BY id DESC";

        }
        else{

            $select = "SELECT * FROM projects
            ORDER BY id DESC";

        }


        $result = mysqli_query($conn,$select);


        // Check Data

        if(mysqli_num_rows($result) > 0){


        while($row = mysqli_fetch_assoc($result)){

        ?>



        <!-- Project Card -->

        <div class="project-card">

            <img src="../uploads/<?php
            echo $row['image'];
            ?>"

            alt="Project Image">


            <div class="project-info">

                <h3>

                    <?php
                    echo $row['title'];
                    ?>

                </h3>


                <p>

                    <?php
                    echo $row['description'];
                    ?>

                </p>



                <!-- Buttons -->

                <div class="project-buttons">


                    <!-- Edit -->

                    <a href="edit-project.php?id=<?php
                    echo $row['id'];
                    ?>"

                    class="edit-btn">

                        <i class="fa-solid fa-pen"></i>

                        Edit

                    </a>



                    <!-- Delete -->

                    <a href="delete-project.php?id=<?php
                    echo $row['id'];
                    ?>"

                    class="delete-btn"

                    onclick="return confirm(
                    'Delete this project?'
                    )">

                        <i class="fa-solid fa-trash"></i>

                        Delete

                    </a>

                </div>

            </div>

        </div>


        <?php } ?>


        <?php } else { ?>


        <!-- No Data -->

        <h2 class="no-data">

            No Project Found

        </h2>


        <?php } ?>

    </div>

</section>

</body>
</html>