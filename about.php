<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>HACKBOX MAIN</title>
</head>

<header>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="./">HACKBOX</a></div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                <li><a href="./">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li>
                    <a href="#" class="desktop-item">Challenges</a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">Challenges</label>
                    <ul class="drop-menu">
                        <li><a href="./Challenge_0">Challenge 0</a></li>
                        <li><a href="./Challenge_1">Challenge 1</a></li>
                        <li><a href="./Challenge_2">Challenge 2</a></li>
                        <li><a href="./Challenge_3">Challenge 3</a></li>
                        <li><a href="./Challenge_4">Challenge 4</a></li>
                        <li><a href="./Challenge_5">Challenge 5</a></li>
                    </ul>
                </li>
                <li><a href="./leaderboards.php">Leaderboards</a></li>
                <?php
                session_start();
                if (isset($_SESSION['userName'])) {
                    echo '<li><a href="#" class="desktop-item">' . $_SESSION['userName'] . '</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">' . $_SESSION['userName'] . '</label>
                        <ul class="drop-menu">
                          <li><a href="./logout.php">Log Out</a></li>
                        </ul></li>';
                } else {
                    echo '<li><a href="./login.php">Login</a></li>
                  <li><a href="./register.php">Register</a></li>';
                } ?>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>
</header>

<body>
    <div class="aboutContainer">
        <h1>About the team</h1>
    </div>
    <div class="aboutMainContainer">
        <div class="aboutUs">
            <h2>We are HackBox</h2>
            <p>We are students from NHL Stenden in Emmen,The Netherlands.We wanted to create project which involves around ethical hacking.The main idea about HackBox is to introduce to newcomers ethical hacking and its basics.
                For the team,the user is the most important part of this project,that is why we decided to introduce the world of ethical hacking in the face of intractable website with challenges which the further you progress the harder they get.
            </p>
        </div>
        <div class="contactList">
            <h2>Contact List</h2>
            <p>Robert Murcsek</p>
            <p>Kareem Glasgow</p>
            <p>Jonathan Mohamed</p>
            <p>Georgi Dimitrov - georgi.dimitrov@student.nhlstenden.com</p>
            <p>Nish Marovanidze </p>
            <p>Thomas Koops</p>
            <p>Xuan Đo</p>
        </div>
    </div>
</body>

<footer>
    <div class="main-content">
        <div class="center box">
            <h2>Location</h2>
            <div class="content">
                <div class="place">
                    <span class="fas fa-map-marker-alt"></span>
                    <span class="text">NHL Stenden</span>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <span class="credit">Created By <a href="#">HACKBOX 2.0</a> | </span>
        <span class="far fa-copyright"></span> 2020 All rights reserved.
        <span><a href="./privacy_policy.php">Privacy Policy</a></span>
    </div>
</footer>

</html>