<?php

session_start();

include '../config/db.php';

if(!isset($_SESSION['admin'])){

    header("Location: login.php");

}


$msg = "";


if(isset($_POST['change'])){

    $old =
    $_POST['old_password'];

    $new =
    $_POST['new_password'];


    $check = mysqli_query(

    $conn,

    "SELECT * FROM admin
    WHERE id=1
    AND password='$old'"

    );


    if(mysqli_num_rows($check) > 0){

        mysqli_query(

        $conn,

        "UPDATE admin

        SET password='$new'

        WHERE id=1"

        );

        $msg = "Password Changed Successfully";

    }
    else{

        $msg = "Old Password Incorrect";

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Change Password</title>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>
<body>


<div class="login-container">

    <form method="POST"
    class="login-form">

        <h2>

            Change Password

        </h2>


        <?php

        if($msg != ""){

            echo "

            <div class='success-msg'>

            $msg

            </div>

            ";

        }

        ?>


        <input type="password"

        name="old_password"

        placeholder="Old Password"

        required>


        <input type="password"

        name="new_password"

        placeholder="New Password"

        required>


        <button type="submit"

        name="change"

        class="btn">

            Change Password

        </button>

    </form>

</div>

</body>
</html>