<?php

include 'Config.php';
session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location:Home.php');
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
    <title>Login Page </title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="Login.css">

</head>

<body>

    <div class="container">

        <div class="wrapper-login">


            <div class="form-box login">

                <form action="" method="post" enctype="multipart/form-data">
                    <h2>𝐔𝐒𝐄𝐑 𝐋𝐎𝐆𝐈𝐍</h2>
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
                    <div class="remember">
                        <label><input type="checkbox">Remember me</label>
                        <a href="Forget.php">Forger Password ? </a>
                    </div>
                    <button type="submit" class="btn" name="submit" value="login now">𝐋𝐎𝐆𝐈𝐍</button>
                    <div class="login-registration">
                        <p>Don't have Account ? <a href="Register.php" class="register">Registration</a></p>
                    </div>

                </form>

            </div>

        </div>

    </div>
</body>

</html>