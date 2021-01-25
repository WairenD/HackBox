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

<body>
<header>
    <?php
    session_start();
    $errorMsg = "";
    include("connection.php");
    if (isset($_SESSION['userName'])) {
        $SQLstring = "SELECT currentLevel FROM " . $db_table . " WHERE userName='" . $_SESSION['userName'] . "'";
        if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $currentLevel);
            mysqli_stmt_store_result($stmt);
            if ($stmt === FALSE) {
                $errorMsg = "<span><p>Unable to execute the query.</p>"
                    . "<p>Error code "
                    . mysqli_errno($DBConnect)
                    . ": "
                    . mysqli_error($DBConnect)
                    . "</p></span>";
            } else {
                while (mysqli_stmt_fetch($stmt)) {
                    $challenge = $currentLevel;
                }
            }
            //Clean up the $stmt after use
            mysqli_stmt_close($stmt);
        } else {
            $errorMsg = "<span><p>Unable to execute the query.</p>"
                . "<p>Error code "
                . mysqli_errno($DBConnect)
                . ": "
                . mysqli_error($DBConnect)
                . "</p></span>";
        }
    }
    ?>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="./">HACKBOX</a></div>
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
                        <?php
                        if (isset($currentLevel)) {
                            for ($i = 0; $i < $currentLevel; $i++) {
                                echo '<li><a href="./Challenge_' . ($i + 1) . '">Challenge ' . ($i + 1) . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="./leaderboards.php">Leaderboards</a></li>
                <?php
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
                }
                ?>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>
</header>


<div class="landing-page-body">
    <div class="top-box">
        <div class="top_left-box">
            <h2>Discover new bounderies</h2>
            <h1>ETHICAL HACKING<br>CHALLENGES</h1>
            <p>Learn and gather data, <br>defeat the hacker with exciting tasks.</p>
        </div>
        <div class="top_right-box">
            <img src="images/hacker-illustration.png" alt="illustration">
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
                <img src="images/unlimited.png" alt="unlimited">
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
                <p>Step into the world of ethical hacking, learn about various techniques used by hackers like cross site scripting, injection attacks, priviledge escalation and more! Complete all five challenges and get to the top of the leaderboard with record times.<br/> Do you have it in you to become a master ethical hacker?</p>
                <br>
                <a href="register.php">
                    <div class="play-bttn">
                        REGISTER NOW!
                    </div>
                </a>

            </div>
        </div>
    </div>
    z
    <div class="separate-bar">
    </div>
    <div class="bottom-box">
        <div class="bottom-left_box">
            <img src="images/assistant1.png" alt="assistant1">
        </div>
        <div class="bottom-center_box">
            <h1>FEELING LOST?</h1>
            <p>Don't worry, your assistant Dimitri will be there to help you throughout the challenges. Offering hints and guiding your way to the end. Just click on him to recieve a helpful hint. Do you have questions Dimitri can't help you with? Feel free to contact the team in the about page.</p>
        </div>
        <div class="bottom-right_box">
            <img src="images/assistant2.png" alt="assistant2">
        </div>
    </div>
</div>
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
</body>
</html>
