<?php

include '../config/db.php';


$id = $_GET['id'];


/* Get Certificate */

$select = mysqli_query(

$conn,

"SELECT * FROM certificates
WHERE id='$id'"

);


$row = mysqli_fetch_assoc(
$select
);


$msg = "";


/* Update */

if(isset($_POST['update'])){


    $title = $_POST['title'];


    // File Upload

    $file =
    $_FILES['file']['name'];

    $tmp =
    $_FILES['file']['tmp_name'];


    // If New File Uploaded

    if($file != ""){


        $new_name =
        time()."_".$file;


        move_uploaded_file(

        $tmp,

        "../certificate_uploads/".
        $new_name

        );


        // Delete Old File

        unlink(

        "../certificate_uploads/".
        $row['file']

        );


        mysqli_query(

        $conn,

        "UPDATE certificates

        SET

        title='$title',

        file='$new_name'

        WHERE id='$id'"

        );

    }
    else{


        mysqli_query(

        $conn,

        "UPDATE certificates

        SET

        title='$title'

        WHERE id='$id'"

        );

    }


    $msg =
    "Certificate Updated";


    // Refresh Data

    $select = mysqli_query(

    $conn,

    "SELECT * FROM certificates
    WHERE id='$id'"

    );


    $row = mysqli_fetch_assoc(
    $select
    );

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

Edit Certificate

</h2>


<div class="success-msg">

<?php echo $msg; ?>

</div>


<input type="text"

name="title"

value="<?php
echo $row['title'];
?>"

required>



<input type="file"

name="file">


<button type="submit"

name="update"

class="btn">

Update Certificate

</button>

</form>

</div>

</body>
</html>