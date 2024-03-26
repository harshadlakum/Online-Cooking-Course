<?php

@include 'Config.php';

if (isset($_POST['add_product'])) {

    $product_name = $_POST['product_name'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/' . $product_image;
    $product_pdf = $_FILES['product_pdf']['name'];
    $product_pdf_tmp_name = $_FILES['product_pdf']['tmp_name'];
    $product_pdf_folder = 'upload_pdf/' . $product_pdf;


    if (empty($product_name) || empty($product_image) || empty($product_pdf)) {
        $message[] = 'please fill out all';
    } else {
        $insert = "INSERT INTO racipe(name, image , pdf ) VALUES('$product_name', '$product_image' , '$product_pdf')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            move_uploaded_file($product_pdf_tmp_name, $product_pdf_folder);
            $message[] = 'new product added successfully';
        } else {
            $message[] = 'could not add the product';
        }
    }
};

if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM racipe WHERE id = $id");
    header('location:Add_image.php');
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Images page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="123.css">
    <link rel="stylesheet" href="heading.css">
</head>
<style>
    body {
        background-image: url("bg1.jpg");
    }
</style>

<body>

    <div class="heading">
        <h3>All 𝐑𝐞𝐜𝐢𝐩𝐞</h3>
        <p><a href="Dashboad.php">𝐃𝐚𝐬𝐡𝐛𝐨𝐚𝐫𝐝</a> <span> / 𝐑𝐞𝐜𝐢𝐩𝐞</span></p>
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
                <h3>𝐀𝐝𝐝 𝐀 𝐍𝐞𝐰 𝐈𝐦𝐚𝐠𝐞</h3>
                <input type="text" placeholder="𝐄𝐧𝐭𝐞𝐫 𝐈𝐦𝐚𝐠𝐞 𝐍𝐚𝐦𝐞" name="product_name" class="box">
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                <input type="file" accept=".pdf" name="product_pdf" class="box">
                <input type="submit" class="btn" name="add_product" value="𝐀𝐝𝐝 𝐈𝐦𝐚𝐠𝐞">
            </form>

        </div>

        <?php

        $select = mysqli_query($conn, "SELECT * FROM racipe ");

        ?>
        <div class="product-display">
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>𝐈𝐦𝐚𝐠𝐞𝐬</th>
                        <th>𝐈𝐦𝐚𝐠𝐞𝐬 𝐍𝐚𝐦𝐞</th>
                        <th>𝐑𝐞𝐜𝐢𝐩𝐞𝐬</th>
                        <th>𝐀𝐜𝐭𝐢𝐨𝐧</th>
                    </tr>
                </thead>
                <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                    <tr>
                        <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>

                            <embed src="upload_pdf/<?php echo $row['pdf']; ?>" height="100" alt="Not Visible">
                        </td>
                        <td>
                            <a href="Admin_image_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> 𝐄𝐝𝐢𝐭 </a>
                            <a href="Add_image.php?remove=<?php echo $row['id']; ?>" onclick="return confirm('Are You Soure Delete Course ? ')" class="btn"> <i class="fas fa-trash"></i> 𝐃𝐞𝐥𝐞𝐭𝐞</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </div>


</body>

</html>