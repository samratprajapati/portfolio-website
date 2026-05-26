<?php

include '../config/db.php';

use PHPMailer\PHPMailer\PHPMailer;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';


$msg = "";


if(isset($_POST['send'])){


    $email = $_POST['email'];


    $token = md5(rand());


    mysqli_query(

    $conn,

    "UPDATE admin

    SET reset_token='$token'

    WHERE email='$email'"

    );


    $mail = new PHPMailer(true);


    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';

    $mail->SMTPAuth = true;

    $mail->Username =
    'samratprajapati538@gmail.com';

    $mail->Password =
    'qqix hkvs fhiy zkwf';

    $mail->SMTPSecure =
    'tls';

    $mail->Port = 587;


    $mail->setFrom(
    'samratprajapati538@gmail.com',
    'EduSamrat'
    );


    $mail->addAddress($email);


    $reset_link =

    "http://localhost/portfolio/admin/reset-password.php?token=$token";


    $mail->isHTML(true);

    $mail->Subject =
    "Password Reset";


    $mail->Body = "

    <h2>Password Reset</h2>

    <p>

    Click below link:

    </p>

    <a href='$reset_link'>

    Reset Password

    </a>

    ";


    if($mail->send()){

        $msg =
        "Reset Link Sent";

    }
    else{

        $msg =
        "Mail Failed";

    }

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

Forgot Password

</h2>


<div class="success-msg">

<?php echo $msg; ?>

</div>


<input type="email"

name="email"

placeholder="Enter Email"

required>


<button type="submit"

name="send"

class="btn">

Send Reset Link

</button>

</form>

</div>

</body>
</html>