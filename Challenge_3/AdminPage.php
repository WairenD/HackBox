<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Big Brain Inc.</title>
    <link href="css/BigBrainStyle.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav>
            <div class="wrapper">
                <div class="logo"><a href="../">HACKBOX</a></div>
                <input type="radio" name="slider" id="menu-btn">
                <input type="radio" name="slider" id="close-btn">
                <ul class="nav-links">
                    <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                    <li><a href="../">Home</a></li>
                    <li><a href="../about.php">About</a></li>
                    <li>
                        <a href="#" class="desktop-item">Challenges</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">Challenges</label>
                        <ul class="drop-menu">
                            <li><a href="../Challenge_1">Challenge 1</a></li>
                            <li><a href="../Challenge_2">Challenge 2</a></li>
                            <li><a href=" ">Challenge 3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Feedback</a></li>
                </ul>
                <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
            </div>
        </nav>
    </header>

    <footer>
        <div class="main-content">
            <div class="left box">
                <h2>
                    About us</h2>
                <div class="content">
                    <p>
                        LOL</p>
                </div>
            </div>
            <div class="center box">
                <h2>
                    Location</h2>
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
            <span><a href="#">Privacy Policy</a></span>
        </div>
    </footer>
</body>

</html>