<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> FOOD WEBSITE </title>
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section>
        <header class="header">
            <div class="logo">
                <img src="image/logo.png" alt=" not visible ">
            </div>

            <nav class="navbar">
                <a href="#">𝐇𝐨𝐦𝐞</a>
                <a href="About.php">𝐀𝐛𝐨𝐮𝐭</a>
                <a href="Tems.php">𝐎𝐮𝐫 𝐂𝐡𝐞𝐟 ' 𝐬</a>
                <a href="Galary.php">𝐆𝐚𝐥𝐥𝐞𝐫𝐲</a>
                <a href="Course.php">𝐂𝐨𝐮𝐫𝐬𝐞</a>
                <a href="Racipe.php">𝐑e𝐜𝐢𝐩𝐞𝐬</a>
                <a href="Contact.php">𝐂𝐨𝐧𝐭𝐚𝐜𝐭 𝐔𝐬</a>
            </nav>

            <div class="icon">
                <a href="Home.php"><i class="fa-solid fa-user-tie"></a></i>
            </div>

        </header>

        <div class="main">

            <div class="men_text">
                <h1>Make Fresh<span>Food</span><br>in a Easy Way</h1>
            </div>

            <div class="main_image">
                <img src="image/ice_cream.jpg">
            </div>

        </div>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse reiciendis quaerat nobis
            deleniti amet non inventore. Reprehenderit recusandae voluptatibus minus tenetur itaque numquam
            cum quos dolorem maxime. Quas, quaerat nisi. Lorem ipsum dolor sit, amet consectetur adipisicing
            elit. Cumque facilis, quaerat cupiditate nulla quibusdam quo sunt esse tempore inventore vel
            voluptate, amet laudantium adipisci veniam nihil quam molestiae omnis mollitia.
        </p>

        <div class="main_btn">
            <a href="Course.php">Show Course Now</a>
            <i class="fa-solid fa-angle-right"></i>
        </div>

    </section>

    <section class="about">

        <div class="row">

            <div class="image">
                <img src="image/about-img.svg" alt=" not show">
            </div>

            <div class="content">
                <h3>why choose us?</h3>
                <p>
                    A restaurant is a business that prepares and serves food and drinks to customers.[1] Meals are generally served and eaten on the premises, but many restaurants also offer take-out and food delivery services. Restaurants vary greatly in appearance and offerings, including a wide variety of cuisines and service models ranging from inexpensive fast-food restaurants and cafeterias to mid-priced family restaurants, to high-priced luxury establishments.
                </p>
                <div class="btn1">
                    <a href="Course.php">Show Course Now</a>
                    <i class="fa-solid fa-angle-right"></i>
                </div>

            </div>

        </div>

    </section>
    <section class="chef">

        <div class="team">
            <h1>Our Chef 's<span>Team</span></h1>

            <div class="team_box">
                <div class="profile">
                    <img src="image/chef1.png">

                    <div class="info">
                        <h2 class="name">Chinese Chef</h2>
                    </div>

                </div>

                <div class="profile">
                    <img src="image/chef2.png">

                    <div class="info">
                        <h2 class="name">Drink Maker</h2>
                    </div>

                </div>

                <div class="profile">
                    <img src="image/chef3.jpg">

                    <div class="info">
                        <h2 class="name">Gujrati Chef</h2>
                    </div>

                </div>

                <div class="profile">
                    <img src="image/chef4.jpg">

                    <div class="info">
                        <h2 class="name">Panjabi Chef</h2>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="gallery">

        <div class="gallary" id="Gallary">
            <h1>Our<span>Gallery</span></h1>

            <div class="gallary_image_box">


                <div class="gallary_image">
                    <img src="image/gallery10.png">
                </div>

                <div class="gallary_image">
                    <img src="image/gallery11.png">
                </div>

                <div class="gallary_image">
                    <img src="image/gallery12.png">
                </div>

                <div class="gallary_image">
                    <img src="image/gallery7.png">
                </div>

                <div class="gallary_image">
                    <img src="image/gallery8.png">
                </div>

                <div class="gallary_image">
                    <img src="image/gallery9.png">
                </div>

                <div class="gallary_image">
                    <img src="image/gallery13.jpg">
                </div>

                <div class="gallary_image">
                    <img src="image/gallery14.jpg">
                </div>

                <div class="gallary_image">
                    <img src="image/gallery15.jpg">
                </div>

            </div>

        </div>


    </section>


    <section class="contact">
        <?php

        include 'Config1.php';

        // session_start();

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

        <div class="row">
            <h1>Ask Any <span>Doubt !</span></h1>
            <div class="image">
                <img src="image/contact-img.svg" alt=" image not visible">
            </div>

            <form action="" method="post">
                <h3>Tell Us Something !</h3>
                <input type="text" name="name" maxlength="50" class="box" placeholder="𝐄𝐧𝐭𝐞𝐫 𝐘𝐨𝐮𝐫 𝐍𝐚𝐦𝐞" required>
                <input type="number" name="number" min="0" max="9999999999" class="box" placeholder="𝐄𝐧𝐭𝐞𝐫 𝐘𝐨𝐮𝐫 𝐍𝐮𝐦𝐛𝐞𝐫" required maxlength="10">
                <input type="email" name="email" maxlength="50" class="box" placeholder="𝐄𝐧𝐭𝐞𝐫 𝐘𝐨𝐮𝐫 𝐄𝐦𝐚𝐢𝐥" required>
                <textarea name="msg" class="box" required placeholder="𝐄𝐧𝐭𝐞𝐫 𝐘𝐨𝐮𝐫 𝐌𝐞𝐬𝐬𝐚𝐠𝐞" maxlength="500" cols="30" rows="10"></textarea>
                <input type="submit" value="𝚂𝚎𝚗𝚍 𝙼𝚎𝚜𝚜𝚊𝚐𝚎" name="send" class="btn">
            </form>

        </div>

    </section>


    <footer>
        <div class="footer_main">

            <div class="footer_tag">
                <h2>𝐐𝐮𝐢𝐜𝐤 𝐋𝐢𝐧𝐤</h2>
                <p>Home</p>
                <p>About</p>
                <p>Our chef's</p>
                <p>Gallery</p>
                <p>Contact</p>
            </div>



            <div class="footer_tag">
                <h2>𝐎𝐮𝐫 𝐒𝐞𝐫𝐯𝐢𝐜𝐞</h2>
                <p>Learn cooking</p>
                <p>24 x 7 Service</p>
            </div>

            <div class="footer_tag">
                <h2>𝐅𝐨𝐥𝐥𝐨𝐰𝐬</h2>

                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>

            <div class="footer_tag">
                <h2>𝐂𝐨𝐧𝐭𝐚𝐜𝐭</h2>
                <p>+91 123456789</p>
                <p>+91 675568456</p>
                <p>Harshad432@gmail.com</p>
                <p>Abhay876@gmail.com</p>
            </div>

        </div>

        <p class="end">Design By<span><i class="fa-solid fa-face-grin"></i> 𝙰𝚋𝚑𝚊𝚢 𝙺𝚘𝚝𝚊𝚍𝚒𝚢𝚊 , 𝙷𝚊𝚛𝚜𝚊𝚍 𝙻𝚊𝚔𝚞𝚖</span></p>

    </footer>

</body>

</html>