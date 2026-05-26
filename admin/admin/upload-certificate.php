<?php

include '../config/db.php';


$msg = "";


if(isset($_POST['upload'])){


    $title = $_POST['title'];


    $file =
    $_FILES['file']['name'];

    $tmp =
    $_FILES['file']['tmp_name'];


    move_uploaded_file(

    $tmp,

    "../certificate_uploads/".$file

    );


    mysqli_query(

    $conn,

    "INSERT INTO certificates(
    title,file
    )

    VALUES(
    '$title',
    '$file'
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

name="title"

placeholder="Certificate Title"

required>


<input type="file"

name="file"

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