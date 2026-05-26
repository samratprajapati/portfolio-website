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

    <div class="scroll-progress"
        id="scrollProgress">

    </div>

    <!-- Loader -->

    <div class="loader">

        <div class="loader-content">


            <!-- Circle Image -->

            <div class="loader-image">

                <img src="assets/images/img.png"
                    alt="Profile">
                <h1>

                    samrat prajapati

                </h1>
            </div>


            <!-- Progress Bar -->

            <div class="loader-bar">

                <div class="loader-progress"></div>

            </div>


            <!-- Percentage -->

            <h2 id="loader-percent">

                0%

            </h2>

        </div>

    </div>


    <!-- Header -->
    <?php include 'header.php'; ?>

    <!--hero_section-->
    <section class="hero" id="home">

        <div class="hero-content">

            <h3>Hello, It's Me</h3>

            <h1>Samrat Prajapati</h1>

            <h2>I'm a <span>Full Stack Developer</span></h2>

            <p>
                I create modern responsive websites using
                HTML, CSS, JavaScript, PHP and MySQL.
            </p>

            <div class="social-icons">

                <a href="https://github.com/samratprajapati"><i class="fa-brands fa-github"></i></a>

                <a href="https://linkedin.com/in/samratprajapati"><i class="fa-brands fa-linkedin"></i></a>

                <a href="https://instagram.com/mathsamrat"><i class="fa-brands fa-instagram"></i></a>

            </div>

            <?php

            $resume_query = mysqli_query(
                $conn,
                "SELECT * FROM resume LIMIT 1"
            );

            $resume = mysqli_fetch_assoc(
                $resume_query
            );

            ?>

            <a href="uploads/<?php
                                echo $resume['file'];
                                ?>"

                download

                class="btn">

                Download CV

            </a>

        </div>


        <div class="hero-image">

            <img src="assets/images/img.png" alt="profile">

        </div>

    </section>


    <!-- About Section -->
    <section class="about" id="about">

        <div class="about-image">

            <img src="assets/images/img.png" alt="about">

        </div>

        <div class="about-content">

            <h2>About Me</h2>

            <p>
                I am a passionate full stack developer and BTech student.
                I love building responsive and modern websites with clean UI.
            </p>

            <a href="#" class="btn">Read More</a>

        </div>

    </section>




    <!-- Skills Section -->'
    <!-- Skills Section -->
    <section class="skills" id="skills">

        <h2 class="section-title">My Skills</h2>

        <div class="skills-container">

            <div class="skill-card">
                <i class="fa-brands fa-html5"></i>
                <h3>HTML5</h3>
            </div>

            <div class="skill-card">
                <i class="fa-brands fa-css3-alt"></i>
                <h3>CSS3</h3>
            </div>

            <div class="skill-card">
                <i class="fa-brands fa-js"></i>
                <h3>JavaScript</h3>
            </div>

            <div class="skill-card">
                <i class="fa-brands fa-php"></i>
                <h3>PHP</h3>
            </div>

        </div>

    </section>
   

<!-- Projects Section -->
<section class="projects" id="projects">

    <h2 class="section-title">
        Latest Projects
    </h2>
    <form method="GET" class="search-form">

        <input type="text"
            name="search"

            placeholder="Search Projects...">

        <button type="submit" class="btn">

            Search

        </button>

    </form>

    <div class="project-container">

        <?php

        if (isset($_GET['search'])) {

            $search = $_GET['search'];

            $select = "SELECT * FROM projects

    WHERE title LIKE '%$search%'

    ORDER BY id DESC";
        } else {

            $select = "SELECT * FROM projects
    ORDER BY id DESC";
        }

        $result = mysqli_query($conn, $select);

        while ($row = mysqli_fetch_assoc($result)) {

        ?>

            <div class="project-card"

data-title="<?php
echo $row['title'];
?>"

data-description="<?php
echo $row['description'];
?>"

data-image="uploads/<?php
echo $row['image'];
?>"

data-live="<?php
echo $row['live_demo'];
?>"

data-github="<?php
echo $row['github_link'];
?>">

    <img src="uploads/<?php
    echo $row['image'];
    ?>">

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


        <div class="project-buttons">

            <a href="<?php
            echo $row['live_demo'];
            ?>"

            target="_blank"

            class="live-btn">

                Live Demo

            </a>


            <a href="<?php
            echo $row['github_link'];
            ?>"

            target="_blank"

            class="github-btn">

                GitHub

            </a>

        </div>

    </div>

</div>

        <?php } ?>

    </div>

</section>


<!-- Project Modal -->

<div class="project-modal" id="projectModal">

    <div class="modal-content">

        <span class="close-modal">

            &times;

        </span>

        <img src=""
            id="modalImage">

        <h2 id="modalTitle"></h2>

        <p id="modalDescription"></p>

        <div class="modal-buttons">

            <a href="#"
                target="_blank"

                id="modalLive"

                class="live-btn">

                Live Demo

            </a>


            <a href="#"
                target="_blank"

                id="modalGithub"

                class="github-btn">

                GitHub

            </a>

        </div>

    </div>

</div>



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


            while ($cert =
                mysqli_fetch_assoc(
                    $certificates
                )
            ) {

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

    <!-- StudyHub Section -->

    <section class="studyhub" id="studyhub">

        <h2 class="section-title">
            StudyHub
        </h2>

        <div class="studyhub-container">


            <!-- Notes -->

            <div class="study-card">

                <i class="fa-solid fa-book"></i>

                <h3>Notes</h3>

                <p>

                    Download handwritten BTech notes,
                    semester PDFs and subject-wise study material.

                </p>

                <a href="notes.php" class="study-btn">

                    Download Notes

                </a>

            </div>



            <!-- PYQ -->

            <div class="study-card">

                <i class="fa-solid fa-file-lines"></i>

                <h3>PYQ</h3>

                <p>

                    Previous Year Question Papers
                    for semester exams and university preparation.

                </p>

                <a href="pyq.php" class="study-btn">

                    View PYQs

                </a>

            </div>

        </div>

    </section>
    <!-- Contact Section -->
    <?php
    include 'contact.php';
    ?>




    <!-- Footer -->
    <?php include 'footer.php'; ?>


    <!-- JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>