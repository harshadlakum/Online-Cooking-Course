<?php

include 'Config.php';
session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, " UPDATE `user` SET password = '$pass' WHERE email = '$email'") or die('query failed');

    if ($select) {
        $message[] = 'Registered Successfully!';
        header('location:Login1.php');
    } else {
        $message[] = 'Incorrect Email OR Password!';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Page </title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="Login.css">

</head>






<body>

    <div class="container">

        <div class="wrapper-login">


            <div class="form-box login">

                <form action="" method="post" enctype="multipart/form-data">
                    <h2>𝐑𝐞𝐬𝐞𝐭 𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝</h2>
                    <?php
                    if (isset($message)) {
                        foreach ($message as $message) {
                            echo '<div class="message">' . $message . '</div>';
                        }
                    }
                    ?>
                    <div class="input-box">
                        <input type="email" name="email" required>
                        <label>Emailid</label>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <button type="submit" class="btn" name="submit" value="login now">𝐋𝐎𝐆𝐈𝐍</button>

                </form>

            </div>

        </div>

    </div>
</body>

</html>