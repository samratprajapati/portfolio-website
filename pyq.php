<?php
include 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>PYQ | EduSamrat</title>

<link rel="stylesheet"
href="assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>


<!-- Header -->
<?php include 'header.php'; ?>


<!-- PYQ Section -->

<section class="pyq-page">

    <h1 class="section-title">

        Previous Year Questions

    </h1>

    <p class="pyq-subtitle">

        SSC, UPSC, GATE,
        University Papers &
        Exam Preparation Materials.

    </p>



    <!-- Search + Filter -->

    <form method="GET"
    class="search-form">


        <input type="text"

        name="search"

        placeholder="Search PYQ...">



        <select name="category">

            <option value="">

                All Categories

            </option>

            <option>SSC</option>

            <option>UPSC</option>

            <option>GATE</option>

            <option>Computer</option>

            <option>BTech</option>

            <option>Railway</option>

            <option>Banking</option>

        </select>



        <button type="submit"
        class="btn">

            Filter

        </button>

    </form>





    <!-- PYQ Cards -->

    <div class="pyq-container">

        <?php


        $select = "SELECT * FROM pyq
        WHERE 1";


        // Search

        if(
        isset($_GET['search'])
        &&
        $_GET['search'] != ""
        ){

            $search = $_GET['search'];

            $select .= "

            AND title LIKE '%$search%'";

        }



        // Category

        if(
        isset($_GET['category'])
        &&
        $_GET['category'] != ""
        ){

            $category =
            $_GET['category'];

            $select .= "

            AND category='$category'";

        }



        // Order

        $select .= "

        ORDER BY id DESC";


        $result = mysqli_query(
        $conn,
        $select
        );



        // No Data

        if(
        mysqli_num_rows($result) == 0
        ){

            echo "

            <div class='no-data'>

                <i class='fa-solid fa-folder-open'></i>

                <h2>No PYQ Found</h2>

            </div>

            ";

        }



        while(
        $row = mysqli_fetch_assoc(
        $result
        )){

        ?>



        <!-- PYQ Card -->

        <div class="pyq-card">

            <div class="pyq-icon">

                <i class="fa-solid fa-file-lines"></i>

            </div>



            <h3>

                <?php
                echo $row['title'];
                ?>

            </h3>



            <!-- Category Badge -->

            <div class="pyq-badge">

                <?php
                echo $row['category'];
                ?>

            </div>



            <p>

                Previous Year Question
                PDF Material

            </p>



            <!-- Info -->

            <div class="pyq-info">

                <span>

                    <i class="fa-solid fa-download"></i>

                    <?php
                    echo $row['downloads'];
                    ?>

                </span>



                <span>

                    <i class="fa-solid fa-calendar"></i>

                    <?php

                    echo date(

                    "d M Y",

                    strtotime(
                    $row['created_at']
                    )

                    );

                    ?>

                </span>

            </div>



            <!-- View -->

            <a href="uploads/<?php
            echo $row['file'];
            ?>"

            target="_blank"

            class="view-btn">

                <i class="fa-solid fa-eye"></i>

                View

            </a>



            <br><br>



            <!-- Download -->

            <a href="download.php?id=<?php
            echo $row['id'];
            ?>&type=pyq"

            class="download-btn">

                <i class="fa-solid fa-download"></i>

                Download

            </a>

        </div>

        <?php } ?>

    </div>

</section>



<!-- Footer -->
<?php include 'footer.php'; ?>
<script src="assets/js/script.js"></script>

</body>
</html>z