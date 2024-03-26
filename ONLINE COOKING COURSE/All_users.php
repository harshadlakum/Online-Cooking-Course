<?php
@include 'Config.php';

if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `user` WHERE id = '$id'");
    header('location:All_users.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> All Users </title>
    <link rel="stylesheet" href="Admin.css">
    </link>
</head>
<style>
    body {
        background-image: url("bg1.jpg");
    }

    .btn_delete {
        background-color: red;
        color: white;
        height: 35px;
        width: 70px;
        border-radius: 5px;
        border: none;

    }

    .btn_delete_a {
        text-decoration: none;
        color: black;
    }

    .btn_delete_a:hover {
        color: white;
        text-decoration: none;

    }
</style>

<body>
    <div>
        <div class="heading">
            <h2>𝐀𝐥𝐥 𝐔𝐬𝐞𝐫𝐬 </h2>
            <p1><a href="Dashboad.php">𝐃𝐚𝐬𝐡𝐛𝐨𝐚𝐫𝐝</a> <span> / 𝐔𝐬𝐞𝐫𝐬 </span></p1>
        </div>
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">𝐈𝐝</th>
                    <th class="text-center">𝐍𝐚𝐦𝐞 </th>
                    <th class="text-center">𝐄𝐦𝐚𝐢𝐥</th>
                    <th class="text-center">𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝</th>
                    <th class="text-center">𝐈𝐦𝐚𝐠𝐞</th>
                    <th class="text-center">𝐀𝐜𝐭𝐢𝐨𝐧</th>
                </tr>
            </thead>
            <?php
            include_once "Config.php";
            $sql = "SELECT * from user ";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

            ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["password"] ?></td>
                        <td>
                            <img src=" <?php echo "uploaded_img/" . $row["image"]; ?>" width="100px" alt="image not show">
                        </td>
                        <td><button class="btn_delete"><a class="btn_delete_a" href="All_users.php?remove=<?php echo $row['id']; ?>" onclick="return confirm('Are You Soure Delete This User ? ')"> Delete</a></button></td>
                    </tr>
            <?php
                    $count = $count + 1;
                }
            }
            ?>
        </table>
</body>

</html>