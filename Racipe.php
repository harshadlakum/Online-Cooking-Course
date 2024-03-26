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
    <title>Racipe Page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="123.css">
    <link rel="stylesheet" href="heading.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        background-image: url("bg1.jpg");
    }

    button {
        height: 35px;
    }

    .btn {
        width: 363px;
        height: 35px;
        font-size: 18px;
        margin-top: 5px;
        margin-bottom: 100px;
        background-color: black;
        color: white;
    }

    .btn:hover {
        background-color: gray;
        color: white;
    }
</style>

<body>


    <div class="heading">
        <h3>𝐀𝐥𝐥 𝐑𝐞𝐜𝐢𝐩𝐞𝐬</h3>
        <p><a href="Index.php">ℍ𝕠𝕞𝕖</a> <span> / 𝐑𝐞𝐜𝐢𝐩𝐞s </span></p>
    </div>
    <div class="container ma-3 mb-3 ">
        <div class="row" style="margin-top : 30px">
            <?php include_once "Config.php";
            $qry = "SELECT  * from racipe ";
            $query = mysqli_query($conn, $qry);
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="col-md-4">
                    <img src="uploaded_img/<?php echo $row['image']; ?>" height="250" width="363px" alt="">
                    <button>
                        <a href="upload_pdf/<?php echo $row['pdf']; ?>" class="btn"><?php echo $row['name']; ?></a>
                    </button>

                </div>
            <?php }
            ?>
        </div>
    </div>

</body>

</html>