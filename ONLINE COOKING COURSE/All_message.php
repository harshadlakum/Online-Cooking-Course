<?php
@include 'Config.php';

if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `messages` WHERE id = '$id'");
    header('location:All_message.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"> -->
    <title> All Messages Page</title>
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
            <h2>𝐀𝐥𝐥 𝐌𝐞𝐬𝐬𝐚𝐠𝐞𝐬</h2>
            <p><a href="Dashboad.php">𝐃𝐚𝐬𝐡𝐛𝐨𝐚𝐫𝐝</a> <span> /𝐌𝐞𝐬𝐬𝐚𝐠𝐞𝐬 </span></p>
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
            $sql = "SELECT * from messages ";
            $result = $conn->query($sql);
            $count = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

            ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["number"] ?></td>
                        <td><?= $row["message"] ?></td>
                        <td><button class="btn_delete"><a class="btn_delete_a" href="All_message.php?remove=<?php echo $row['id']; ?>" onclick="return confirm('Are You Soure Delete This Message ? ')" class="btn"> <i class="fas fa-trash"></i> 𝐃𝐞𝐥𝐞𝐭𝐞</a></td>
                        </button>
                    </tr>
            <?php
                    $count = $count + 1;
                }
            }
            ?>
        </table>
</body>

</html>