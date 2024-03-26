<?php

include 'Config.php';
session_start();
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:Admin_login.php');
};

if (isset($_GET['logout'])) {
    unset($admin_id);
    session_destroy();
    header('location:Admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="Profile.css">
</head>

<body>

    <div class="container">

        <div class="profile">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$admin_id'") or die('query failed');
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
            <a href="Admin_update_profile.php" class="btn">𝐔𝐩𝐝𝐚𝐭𝐞 𝐏𝐫𝐨𝐟𝐢𝐥𝐞</a>
            <a href="Admin_login.php?logout=<?php echo $admin_id; ?>" class="btn">𝐋𝐨𝐠𝐨𝐮𝐭</a>
            <div class="login-registration">
                <p>Click To Show <a href="Dashboad.php" class="register">Admin Panel</a></p>
            </div>

        </div>

    </div>

</body>

</html>