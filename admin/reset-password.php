<?php

include '../config/db.php';

$msg = "";


if(isset($_GET['token'])){

    $token = $_GET['token'];

}


if(isset($_POST['reset'])){


    $password = password_hash(

    $_POST['password'],

    PASSWORD_DEFAULT

    );


    mysqli_query(

    $conn,

    "UPDATE admin

    SET

    password='$password',

    reset_token=''

    WHERE reset_token='$token'"

    );


    $msg =
    "Password Updated";

}

?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet"
href="../assets/css/style.css">

</head>
<body>

<div class="login-container">

<form method="POST"
class="login-form">

<h2>

Reset Password

</h2>


<div class="success-msg">

<?php echo $msg; ?>

</div>


<input type="password"

name="password"

placeholder="New Password"

required>


<button type="submit"

name="reset"

class="btn">

Reset Password

</button>

</form>

</div>

</body>
</html>