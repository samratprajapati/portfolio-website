<?php

session_start();

include '../config/db.php';

if(!isset($_SESSION['admin'])){

    header("Location: login.php");

}


// Delete PYQ

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    mysqli_query($conn,

    "DELETE FROM pyq
    WHERE id='$id'"

    );

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Manage PYQ</title>

<link rel="stylesheet"
href="../assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>


<section class="messages-section">

    <h1 class="section-title">

        Manage PYQ

    </h1>


    <div class="table-container">

        <table>

            <tr>

                <th>ID</th>

                <th>Title</th>

                <th>Downloads</th>

                <th>Date</th>

                <th>Action</th>

            </tr>


            <?php

            $select = "SELECT * FROM pyq
            ORDER BY id DESC";

            $result = mysqli_query($conn,$select);

            while($row =
            mysqli_fetch_assoc($result)){

            ?>

            <tr>

                <td>
                    <?php echo $row['id']; ?>
                </td>

                <td>
                    <?php echo $row['title']; ?>
                </td>

                <td>
                    <?php echo $row['downloads']; ?>
                </td>

                <td>

                    <?php

                    echo date(
                    "d M Y",
                    strtotime(
                    $row['created_at']
                    )
                    );

                    ?>

                </td>

                <td>

                    <a href="?delete=<?php
                    echo $row['id'];
                    ?>"

                    class="delete-btn">

                        Delete

                    </a>

                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</section>

</body>
</html>