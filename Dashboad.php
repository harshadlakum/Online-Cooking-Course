<html>

<head>
    <title> ADMIN DASHBOAD </title>
    <link rel="stylesheet" href="Dashboad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .absolute {
        position: absolute;

    }

    .btn {
        color: black;
        text-decoration: none;
        font-size: bold;
    }

    .btn:hover {
        color: white;
    }

    body {
        background-image: url("bg1.jpg");
        overflow-x: hidden;
    }

    #main-content {
        top: 10%;
        left: 100%;
        width: 100vw;
        display: flex;
    }

    .box {
        display: flex;
    }

    .card {
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        font-size: 30px;
        width: 230px;
        height: 250px;
    }
</style>

<body>
    <header class="header">
        <center>
            <h1> 𝐎𝐍𝐋𝐈𝐍𝐄 𝐂𝐎𝐎𝐊𝐈𝐍𝐆 𝐀𝐃𝐌𝐈𝐍 𝐃𝐀𝐒𝐇𝐁𝐎𝐀𝐑𝐃 </h1>
        </center>
    </header>

    <!-- Sidebar -->
    <div class="sidebar" id="mySidebar">
        <div class="side-header">
            <img src="image/logo.png" alt="Swiss Collection">
            <h3 style="margin-top:10px;"> Hello , My Admin</h3>
        </div>


        <a href="#"><i class="fa fa-home"></i> Dashboard</a>
        <a href="All_users.php"><i class="fa fa-users"></i> Users</a>
        <a href="Add_course.php"><i class="fa fa-th-large"></i> Course</a>
        <a href="All_message.php"><i class="fa fa-th"></i> Messages</a>
        <a href="Add_image.php"><i class="fa fa-th-large"></i> Recipe </a>
        <a href="Admin_home.php"><i class="fa fa-th-list"></i> Profile </a>
        <a href="Admin_register.php"><i class="fa fa-users"></i> Add Admin</a>
        <a href="Admin_login.php"><i class="fa fa-sign-out mr-5"></i> Logout</a>

    </div>

    <?php

    include_once "Config.php";
    ?>
    <div class="absolute">
        <div id="main-content" class="container allContent-section py-4">
            <div class="row" style="margin-top :200px ; margin-left :300px">
                <div class="box">


                    <div class="col">
                        <center>
                            <div class="card" style="background-color:green;">
                                <p style="color:white;">Total Users</p>
                                <p style="color:white;">
                                    <?php
                                    $sql = "SELECT * from user";
                                    $result = $conn->query($sql);
                                    $count = 0;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {

                                            $count = $count + 1;
                                        }
                                    }
                                    echo $count;
                                    ?></p>
                                <p><a class="btn" href="All_users.php">View</a></p>
                            </div>
                        </center>
                    </div>
                    <div class="col-lg-4">
                        <center>
                            <div class="card" style="background-color:blue;">
                                <p style="color:white;">Total Courses</p>
                                <p style="color:white;">
                                    <?php

                                    $sql = "SELECT * from course";
                                    $result = $conn->query($sql);
                                    $count = 0;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {

                                            $count = $count + 1;
                                        }
                                    }
                                    echo $count;
                                    ?>
                                </p>
                                <p><a class="btn" href="Add_course.php">View</a></p>
                            </div>
                        </center>
                    </div>
                    <div class="col-lg-4">
                        <center>
                            <div class="card" style="background-color:red;">
                                <p style="color:white;">Total Recipes</p>
                                <p style="color:white;">
                                    <?php

                                    $sql = "SELECT * from racipe";
                                    $result = $conn->query($sql);
                                    $count = 0;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {

                                            $count = $count + 1;
                                        }
                                    }
                                    echo $count;
                                    ?>
                                </p>
                                <p><a class="btn" href="Add_image.php">View</a></p>
                            </div>
                        </center>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>