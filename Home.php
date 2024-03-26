<?php

include 'Config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:Login1.php');
};

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:Login1.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="Profile.css">
</head>

<body>

    <div class="container">

        <div class="profile">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }
            if ($fetch['image'] == '') {
                echo '<img src="images/default-avatar.png">';
            } else {
                echo '<img src="uploaded_img/' . $fetch['image'] . '">';
            }
            ?>
            <h3><?php echo $fetch['name']; ?></h3>
            <a href="Update_profile.php" class="btn">𝐔𝐩𝐝𝐚𝐭𝐞 𝐏𝐫𝐨𝐟𝐢𝐥𝐞</a>
            <a href="Home.php?logout=<?php echo $user_id; ?>" class="btn">𝐋𝐨𝐠𝐨𝐮𝐭</a>
            <div class="login-registration">
                <p>Click To Show <a href="Index.php" class="register">Home Page</a></p>
            </div>
        </div>

    </div>

</body>

</html>