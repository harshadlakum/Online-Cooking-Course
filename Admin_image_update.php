<?php

@include 'Config.php';

$id = $_GET['edit'];

if (isset($_POST['update_product'])) {

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

        $update_data = "UPDATE racipe SET name='$product_name', image='$product_image', pdf = '$product_pdf' WHERE id = '$id'";
        $upload = mysqli_query($conn, $update_data);

        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            move_uploaded_file($product_pdf_tmp_name, $product_pdf_folder);
            header('location:Add_image.php');
        } else {
            $$message[] = 'please fill out all!';
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="123.css">
</head>
<style>
    body {
        background-image: url("bg1.jpg");
    }
</style>

<body>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<span class="message">' . $message . '</span>';
        }
    }
    ?>

    <div class="container">


        <div class="admin-product-form-container centered">

            <?php

            $select = mysqli_query($conn, "SELECT * FROM racipe WHERE id = '$id'");
            while ($row = mysqli_fetch_assoc($select)) {

            ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <h3 class="title">𝐔𝐩𝐝𝐚𝐭𝐞 𝐓𝐡𝐞 𝐈𝐦𝐚𝐠𝐞</h3>
                    <input type="text" class="box" name="product_name" value="<?php echo $row['name']; ?>" placeholder="𝐄𝐧𝐭𝐞𝐫 𝐈𝐦𝐚𝐠𝐞 𝐍𝐚𝐦𝐞">
                    <input type="file" class="box" name="product_image" accept="image/png, image/jpeg, image/jpg">
                    <input type="file" accept=".pdf" name="product_pdf" class="box">
                    <input type="submit" value="𝐔𝐩𝐝𝐚𝐭𝐞 𝐈𝐦𝐚𝐠𝐞" name="update_product" class="btn">
                    <a href="Add_image.php" class="btn">𝐆𝐨 𝐁𝐚𝐜𝐤 !</a>
                </form>


            <?php }; ?>



        </div>

    </div>

</body>

</html>