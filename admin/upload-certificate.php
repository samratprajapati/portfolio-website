<?php

session_start();

include '../config/db.php';

if(!isset($_SESSION['admin'])){

    header("Location: login.php");

}


$msg = "";


if(isset($_POST['upload'])){


    $certificate_id =
    $_POST['certificate_id'];

    $name =
    $_POST['name'];

    $course =
    $_POST['course'];

    $issue_date =
    $_POST['issue_date'];


    $image =
    $_FILES['image']['name'];

    $tmp_name =
    $_FILES['image']['tmp_name'];


    move_uploaded_file(

    $tmp_name,

    "../uploads/".$image

    );


    mysqli_query(

    $conn,

    "INSERT INTO certificates(

    certificate_id,
    name,
    course,
    issue_date,
    image

    )

    VALUES(

    '$certificate_id',
    '$name',
    '$course',
    '$issue_date',
    '$image'

    )"

    );


    $msg =
    "Certificate Uploaded";

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

enctype="multipart/form-data"

class="login-form">

<h2>

Upload Certificate

</h2>


<div class="success-msg">

<?php echo $msg; ?>

</div>


<input type="text"

name="certificate_id"

placeholder="Certificate ID"

required>


<input type="text"

name="name"

placeholder="Student Name"

required>


<input type="text"

name="course"

placeholder="Course / Achievement"

required>


<input type="date"

name="issue_date"

required>


<input type="file"

name="image"

required>


<button type="submit"

name="upload"

class="btn">

Upload Certificate

</button>

</form>

</div>

</body>
</html>