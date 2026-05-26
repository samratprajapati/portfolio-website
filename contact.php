<?php

include 'config/db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if(isset($_POST['send'])){

    $name = $_POST['name'];

    $email = $_POST['email'];

    $message = $_POST['message'];


    // Save in Database

    mysqli_query($conn,

    "INSERT INTO contacts(name,email,message)

    VALUES('$name','$email','$message')"

    );


    // PHPMailer

    $mail = new PHPMailer(true);

    try{

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username =
        'samratprajapati538@gmail.com';

        $mail->Password =
        'qqix hkvs fhiy zkwf';

        $mail->SMTPSecure =
        PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port = 587;


        // SPEED FIX

        $mail->Timeout = 10;

        $mail->SMTPKeepAlive = false;


        // Sender

        $mail->setFrom(

        'samratprajapati538@gmail.com',

        'EduSamrat Portfolio'

        );


        // Receiver

        $mail->addAddress(

        'samratprajapati538@gmail.com'

        );


        // Email Content

        $mail->isHTML(true);

        $mail->Subject =
        'New Portfolio Message';


        $mail->Body = "

        <h2>New Contact Message</h2>

        <p><b>Name:</b> $name</p>

        <p><b>Email:</b> $email</p>

        <p><b>Message:</b> $message</p>

        ";


        $mail->send();


        echo "

        <script>

        alert('Message Sent Successfully!');

        window.location='index.php';

        </script>

        ";

    }

    catch(Exception $e){

        echo "

        <script>

        alert('Mail Error: ".$mail->ErrorInfo."');

        window.location='index.php';

        </script>

        ";

    }

}

?>




<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>EduSamrat Portfolio</title>


<!-- CSS -->

<link rel="stylesheet"
href="assets/css/style.css">


<!-- Font Awesome -->

<link rel="stylesheet"

href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>


<!-- Header -->

<?php include 'header.php'; ?>



<!-- Contact Section -->

<section class="contact"
id="contact">

<h2 class="section-title">

Contact Me

</h2>


<form action=""
method="POST">


<input type="text"

name="name"

placeholder="Your Name"

required>



<input type="email"

name="email"

placeholder="Your Email"

required>



<textarea

name="message"

rows="6"

placeholder="Message"

required>

</textarea>



<button type="submit"

name="send"

class="btn">

Send Message

</button>

</form>

</section>



<!-- Footer -->


<!-- JS -->

<script src="assets/js/script.js"></script>

</body>
</html>