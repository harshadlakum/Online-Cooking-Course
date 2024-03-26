<?php

include 'Config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:Login1.php');
};


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="123.css">
    <link rel="stylesheet" href="heading.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        background-image: url("bg1.jpg");
    }

    .btn {
        margin-top: 5px;
        margin-bottom: 70px;
        background-color: black;
        color: white;
    }

    .btn:hover {
        background-color: black;
        color: white;
    }

    .btn1 {
        margin-bottom: 10px;
        background-color: white;
        color: black;
    }

    .btn1 p {
        color: green;
    }
</style>

<body>


    <div class="heading">
        <h3>𝐀𝐥𝐥 𝐂𝐨𝐮𝐫𝐬𝐞𝐬</h3>
        <p><a href="Index.php">ℍ𝕠𝕞𝕖</a> <span> / 𝐂𝐨𝐮𝐫𝐬𝐞 </span></p>
    </div>
    <div class="container ma-3 mb-3 ">
        <div class="row" style="margin-top : 70px">
            <?php include_once "Config.php";
            $qry = "SELECT  * from course ";
            $query = mysqli_query($conn, $qry);
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="col-md-4">
                    <center>
                        <button class="btn1">
                            <h3>
                                <p>𝐖𝐚𝐭𝐜𝐡 𝐕𝐢𝐝𝐞𝐨 𝐅𝐨𝐫 𝐌𝐚𝐤𝐢𝐧𝐠
                                </p> <?php echo $row['video']; ?>
                            </h3>
                        </button>
                    </center>
                    <video id="myvideo" width="100%" height="250px" controls>
                        <source src="<?php echo "upload/" . $row['name']; ?>">
                    </video>
                    <center>
                        <button class="btn">
                            <h3><?php echo $row['video']; ?></h3>
                        </button>
                    </center>
                </div>
            <?php }
            ?>
        </div>
    </div>

</body>

</html>