
<?php
session_start();

include '../config/db.php';

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];

    $password = $_POST['password'];

  $select = "SELECT * FROM admin
WHERE username='$username'";

$result = mysqli_query(
$conn,
$select
);


if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc(
    $result
    );


    if(password_verify(
    $password,
    $row['password']
    )){

        $_SESSION['admin'] =
        $username;

        header(
        "Location: dashboard.php"
        );

    }
    else{

        $error =
        "Invalid Password";

    }

}
else{

    $error =
    "Invalid Username";

}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Admin Login</title>

<link rel="stylesheet"
href="../assets/css/style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>


<div class="login-container">

    <form method="POST" class="login-form">

        <h2>Admin Login</h2>

        <?php

        if($error != ""){

            echo "<div class='error-msg'>
            $error
            </div>";

        }

        ?>

        <input type="text"
        name="username"
        placeholder="Username"
        required>

        <input type="password"
        name="password"
        placeholder="Password"
        required>

        <button type="submit"
        name="login"
        class="btn">

        Login

        </button>
<a href="forgot-password.php"
class="forgot-link">

Forgot Password?

</a>
    </form>

</div>

</body>
</html>