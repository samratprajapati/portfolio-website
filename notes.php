<?php
include 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Download Notes | EduSamrat</title>

    <link rel="stylesheet"
        href="assets/css/style.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>


    <!-- Navbar -->

    <?php include 'header.php'; ?>


    <!-- Notes Section -->

    <section class="notes-page">

        <h1 class="section-title">

            Download Notes

        </h1>

        <p class="notes-subtitle">

            SSC, UPSC, GATE, BTech,
            Computer Notes, PDFs &
            Study Materials.

        </p>



        <!-- Search + Filter -->

        <form method="GET"
            class="search-form">

            <input type="text"

                name="search"

                placeholder="Search Notes...">



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

                <option>Programming</option>

                <option>Web Development</option>

            </select>



            <button type="submit"
                class="btn">

                Filter

            </button>

        </form>



        <!-- Notes Cards -->

        <div class="notes-container">

            <?php

            $select = "SELECT * FROM notes
            WHERE 1";


            // Search

            if (
                isset($_GET['search'])
                &&
                $_GET['search'] != ""
            ) {

                $search = $_GET['search'];

                $select .= "

                AND title LIKE '%$search%'";

            }



            // Category Filter

            if (
                isset($_GET['category'])
                &&
                $_GET['category'] != ""
            ) {

                $category = $_GET['category'];

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


            // Check Notes

            if (
                mysqli_num_rows($result) > 0
            ) {

                while (
                    $row = mysqli_fetch_assoc(
                        $result
                    )
                ) {

            ?>



                    <!-- Notes Card -->

                    <div class="notes-card">

                        <div class="notes-icon">

                            <i class="fa-solid fa-file-pdf"></i>

                        </div>


                        <h3>

                            <?php
                            echo $row['title'];
                            ?>

                        </h3>



                        <!-- Category -->

                        <div class="category-badge">

                            <?php
                            echo $row['category'];
                            ?>

                        </div>



                        <p>

                            PDF Study Material &
                            Handwritten Notes

                        </p>



                        <!-- Note Info -->

                        <div class="note-info">

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
                                                    ?>"

                            class="download-btn">

                            <i class="fa-solid fa-download"></i>

                            Download

                        </a>

                    </div>

                <?php } ?>



            <?php } else { ?>



                <h2 class="no-data">

                    No Notes Found

                </h2>



            <?php } ?>

        </div>

    </section>



    <!-- Footer -->

   <?php include 'footer.php'; ?>

</body>

</html>