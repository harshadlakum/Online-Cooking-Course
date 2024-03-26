<?php

@include 'Config.php';

if (isset($_POST['add_product'])) {

    $name = $_POST['name'];
    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_destination = "upload/" . $file_name;


    if (empty($file_name) || empty($name)) {
        $message[] = 'Please Fill Out All';
    } else {
        $insert = "INSERT INTO course(name, video) VALUES('$file_name', '$name')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($temp_name, $file_destination);
            $message[] = 'New Course Added Successfully';
        } else {
            $message[] = 'Could Not Add Course';
        }
    }
};

if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `course` WHERE id = '$id'");
    header('location:Add_course.php');
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Course Page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="123.css">
    <link rel="stylesheet" href="heading.css">
    <style>
        body {
            background-image: url("bg1.jpg");
        }
    </style>

</head>

<body>

    <div class="heading">
        <h3>𝐀𝐥𝐥 𝐂𝐨𝐮𝐫𝐬𝐞𝐬</h3>
        <p><a href="Dashboad.php">𝐃𝐚𝐬𝐡𝐛𝐨𝐚𝐫𝐝</a> <span> / 𝐂𝐨𝐮𝐫𝐬𝐞𝐬</span></p>
    </div>

    <?php

    if (isset($message)) {
        foreach ($message as $message) {
            echo '<span class="message">' . $message . '</span>';
        }
    }

    ?>

    <div class="container">

        <div class="admin-product-form-container">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <h3>𝐀𝐝𝐝 𝐀 𝐍𝐞𝐰 𝐂𝐨𝐮𝐫𝐬𝐞</h3>
                <input type="text" placeholder="𝐄𝐧𝐭𝐞𝐫 𝐂𝐨𝐮𝐫𝐬𝐞 𝐍𝐚𝐦𝐞" name="name" class="box">
                <input type="file" name="file" class="form-control">
                <input type="submit" class="btn" name="add_product" value="𝐀𝐝𝐝 𝐂𝐨𝐮𝐫𝐬𝐞">
            </form>

        </div>

        <?php

        $select = mysqli_query($conn, "SELECT * FROM course");

        ?>
        <div class="product-display">
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>𝐕𝐢𝐝𝐞𝐨</th>
                        <th>𝐂𝐨𝐮𝐫𝐬𝐞 𝐍𝐚𝐦𝐞</th>
                        <th>𝐀𝐜𝐭𝐢𝐨𝐧</th>
                    </tr>
                </thead>
                <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                    <tr>

                        <td>
                            <video src=" <?php echo "upload/" . $row["name"]; ?>" width="100px" height="60" alt="video not show">
                        </td>
                        <td><?php echo $row['video']; ?></td>

                        <td>
                            <a href="Admin_course_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> 𝐄𝐝𝐢𝐭 </a>
                            <a href="Add_course.php?remove=<?php echo $row['id']; ?>" onclick="return confirm('Are You Soure Delete Course ? ')" class="btn"> <i class="fas fa-trash"></i> 𝐃𝐞𝐥𝐞𝐭𝐞</a>
                        </td>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </div>


</body>

</html>