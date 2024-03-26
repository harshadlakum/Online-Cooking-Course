<?php

include 'Config.php';

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;

    $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'User Already Exist';
    } else {
        if ($pass != $cpass) {
            $message[] = 'confirm password not matched!';
        } elseif ($image_size > 2000000) {
            $message[] = 'Image Size is Too Large!';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO `admin`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

            if ($insert) {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Registered Successfully!';
                header('location:Admin_login.php');
            } else {
                $message[] = 'Registeration Failed!';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="Register1.css">

</head>

<body>
    <div class="container">
        <div class="form-container">

            <form action="" method="post" enctype="multipart/form-data">
                <center>
                    <h3>𝐀𝐃𝐌𝐈𝐍 𝐑𝐄𝐆𝐈𝐒𝐓𝐄𝐑</h3>
                </center>
                <?php
                if (isset($message)) {
                    foreach ($message as $message) {
                        echo '<div class="message">' . $message . '</div>';
                    }
                }
                ?>
                <div class="input-box">
                    <input type="text" name="name" required>
                    <label>Enter Username</label>
                </div>
                <div class="input-box">
                    <input type="text" name="email" required>
                    <label>Enter Emailid</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label>Enter Password</label>
                </div>
                <div class="input-box">
                    <input type="password" name="cpassword" required>
                    <label>Confirm Password</label>
                </div>
                <div class="input-box">
                    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" required>
                </div>
                <button type="submit" name="submit" class="btn" value="register now">𝐑𝐄𝐆𝐈𝐒𝐓𝐄𝐑</button>
            </form>

        </div>
    </div>
</body>

</html>