

<?php

session_start();

include '../config/db.php';

if(!isset($_SESSION['admin'])){

    header("Location: login.php");

}


// Delete Message

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    mysqli_query($conn,

    "DELETE FROM contacts
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

<title>Messages</title>

<link rel="stylesheet"
href="../assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>


<section class="messages-section">

    <h1 class="section-title">

        Contact Messages

    </h1>


    <div class="table-container">

        <table>

            <tr>

                <th>ID</th>

                <th>Name</th>

                <th>Email</th>

                <th>Message</th>

                <th>Action</th>

            </tr>


            <?php

            $select = "SELECT * FROM contacts
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
                    <?php echo $row['name']; ?>
                </td>

                <td>
                    <?php echo $row['email']; ?>
                </td>

                <td>
                    <?php echo $row['message']; ?>
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
<br>

    <a href="dashboard.php" class="btn">
        Back Dashboard
    </a>
</section>

</body>
</html>