<?php

include 'Config1.php';

session_start();

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    $id = '';
};

if (isset($_POST['send'])) {

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $msg = $_POST['msg'];
    $msg = filter_var($msg, FILTER_SANITIZE_STRING);

    $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
    $select_message->execute([$name, $email, $number, $msg]);

    if ($select_message->rowCount() > 0) {
        $message[] = 'Already Sent Message!';
    } else {

        $insert_message = $conn->prepare("INSERT INTO `messages`(name, email, number, message) VALUES(?,?,?,?)");
        $insert_message->execute([$name, $email, $number, $msg]);

        $message[] = 'Sent Message Successfully!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="Contact.css">

</head>

<body>


    <div class="heading">
        <h3>𝐂𝐨𝐧𝐭𝐚𝐜𝐭 𝐔𝐬
        </h3>
        <p><a href="Index.php">ℍ𝕠𝕞𝕖</a> <span> / 𝐂𝐨𝐧𝐭𝐚𝐜𝐭 </span></p>
    </div>

    <!-- contact section starts  -->

    <section class="contact">

        <div class="row">

            <div class="abc">
                <img src="image/contact-img.svg" alt="">
            </div>

            <form action="" method="post">
                <h3>Tell Us Something!</h3>
                <input type="text" name="name" maxlength="50" class="box" placeholder="𝐄𝐧𝐭𝐞𝐫 𝐘𝐨𝐮𝐫 𝐍𝐚𝐦𝐞" required>
                <input type="number" name="number" min="0" max="9999999999" class="box" placeholder="𝐄𝐧𝐭𝐞𝐫 𝐘𝐨𝐮𝐫 𝐍𝐮𝐦𝐛𝐞𝐫" required maxlength="10">
                <input type="email" name="email" maxlength="50" class="box" placeholder="𝐄𝐧𝐭𝐞𝐫 𝐘𝐨𝐮𝐫 𝐄𝐦𝐚𝐢𝐥" required>
                <textarea name="msg" class="box" required placeholder="𝐄𝐧𝐭𝐞𝐫 𝐘𝐨𝐮𝐫 𝐌𝐞𝐬𝐬𝐚𝐠𝐞" maxlength="500" cols="30" rows="10"></textarea>
                <input type="submit" value="𝚂𝚎𝚗𝚍 𝙼𝚎𝚜𝚜𝚊𝚐𝚎" name="send" class="btn">
            </form>

        </div>

    </section>
</body>

</html>