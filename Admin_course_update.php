<?php

@include 'Config.php';

$id = $_GET['edit'];

if (isset($_POST['update_product'])) {

    $name = $_POST['name'];
    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_destination = "upload/" . $file_name;

    if (empty($file_name) || empty($name)) {
        $message[] = 'Please Fill Out All!';
    } else {

        $update_data = "UPDATE course SET name='$file_name', video='$name'  WHERE id = '$id'";
        $upload = mysqli_query($conn, $update_data);

        if ($upload) {
            move_uploaded_file($temp_name, $file_destination);
            header('location:Add_course.php');
        } else {
            $$message[] = 'Please Fill Out All!';
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="123.css">
</head>
<style>
    body {
        background-image: url("bg1.jpg");
    }
</style>

<body>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<span class="message">' . $message . '</span>';
        }
    }
    ?>

    <div class="container">


        <div class="admin-product-form-container centered">

            <?php

            $select = mysqli_query($conn, "SELECT * FROM course WHERE id = '$id'");
            while ($row = mysqli_fetch_assoc($select)) {

            ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <h3 class="title">𝐔𝐩𝐝𝐚𝐭𝐞 𝐓𝐡𝐞 𝐂𝐨𝐮𝐫𝐬𝐞</h3>
                    <input type="text" placeholder="𝐄𝐧𝐭𝐞𝐫 𝐂𝐨𝐮𝐫𝐬𝐞 𝐍𝐚𝐦𝐞" name="name" class="box">
                    <input type="file" name="file" class="form-control">
                    <input type="submit" value="𝐔𝐩𝐝𝐚𝐭𝐞 𝐂𝐨𝐮𝐫𝐬𝐞" name="update_product" class="btn">
                    <a href="Add_course.php" class="btn">𝐆𝐨 𝐁𝐚𝐜𝐤!</a>
                </form>

            <?php }; ?>

        </div>

    </div>

</body>

</html>