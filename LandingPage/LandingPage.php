<html>
<head>
    <title>HackBox</title>

</head>

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
            <div class="logo"><a href="./index.php">HACKBOX</a></div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li>
                    <a href="#" class="desktop-item">Challenges</a>
                    <input type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">Challenges</label>
                    <ul class="drop-menu">
                        <li><a href="./Challenge_1/index.php">Challenge 1</a></li>
                        <li><a href="./Challenge_2/index.php">Challenge 2</a></li>
                        <li><a href="./Challenge_3/index.php">Challenge 3</a></li>
                        <li><a href="./Challenge_4/index.php">Challenge 4</a></li>
                        <li><a href="./Challenge_5/index.php">Challenge 5</a></li>
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
<div class="landing-page-body">
    <div class="top-box">
        <div class="top_left-box">
            <h2>Discover new bounderies
                <h2>
                    <h1>ETHICAL HACKING<br>CHALLENGES</h1>
                    <p>Learn and gather data, <br>defeat the hacker with exciting tasks.</p>
        </div>
                <div class="top_right-box">
                    <img src="images/hacker-illustration.png">
                </div>
    </div>
    <div class="middle-box">
        <div class="middle-upper_box">
            <div class="middle-left_box">
                <h1>5</h1>
                <h2>Challenges</h2>
                <p>Glimpse to authentic hacking</p>
            </div>
            <div class="middle-center_box">
                <div class="vertical-bar"></div>
                <div class="middle-center_sub_box">
                    <h1>20-30</h1>
                    <h2>Minutes</h2>
                    <p>Of detective-sense</p>
                </div>
            </div>
            <div class="middle-right_box">
                <img src="images/unlimited.png">
            </div>
        </div>
        <div class="middle-lower_box">
            <div class="middle-lower_left_box">
                <h1>20-30</h1>
                <h2>Minutes</h2>
                <p>of practical and immersion<br> in ethical hacking<br> for security engineer.</p>
                <h2>Level</h2>
                <p>Beginner - Intermediate</p>
            </div>
            <div class="middle-lower_right_box">
                <h1>About the challenges</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Praesent a urna rhoncus, maximus dolor ac, commodo
                    arcu. Nullam<br>a lectus lacus. Nulla suscipit ultrices
                    scelerisque.<br>Nulla non nisi id elit pulvinar dictum, consectetur adipiscing elit. A lectus
                    lacus.
                    Nulla suscipit ultrices
                    scelerisque. A lectus lacus. Nulla suscipit ultrices
                    scelerisque. </p>
                <br>
                <div class="play-bttn">
                    PLAY
                </div>
            </div>
        </div>
        <div class="bottom-box">
            <div class="bottom-left_box">
                <img src="images/assistant1.png">
            </div>
            <div class="bottom-center_box">
                <h1>FEELING LOST?</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Praesent a urna rhoncus, maximus dolor ac, commodo
                    arcu. Nullam<br>a lectus lacus. Nulla suscipit ultrices
                    scelerisque.<br>Nulla non nisi id elit pulvinar dictum, consectetur adipiscing elit.
                    scelerisque. </p>
            </div>
            <div class="bottom-right_box">
                <img src="images/assistant2.png">
            </div>
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
