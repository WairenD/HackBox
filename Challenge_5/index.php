<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="css/challenge5style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/assistant.css">
    <script type="text/javascript" src="js/assistant.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Challenge 5</title>
</head>

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
                        <li><a href="../Challenge_3">Challenge 3</a></li>
                        <li><a href="../Challenge_4">Challenge 4</a></li>
                        <li><a href="">Challenge 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Feedback</a></li>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>
</header>

<body id="body" background="images/bg.JPG">
    <h3> After completing previous challenges its time to get the location of the terrorist by getting their IP Address</h3>
    <h3> You have managed to start a conversation with him and need to inject some Cross Site Scripting (Javascript using an api) to acquire the IP address. (Shown Below)</h3>

    <div id="display">
        <div id="1" class="container" style="display: none">
            <img src="images/avatar1.JPG" alt="Avatar">
            <p>who are you why are you trying to hack me</p>
            <span class="time-right">11:00</span>
        </div>

        <br>
        <div id="2" class="container darker" style="display: none">

            <img src="images/2.png" alt="Avatar" class="right">
            <p class="right"> im gonna catch you terrorist</p>
            <br>
            <span class="time-left">11:01</span>
        </div>
        <br>
        <div id="3" class="container" style="display: none">
            <img src="images/avatar1.JPG" alt="Avatar">
            <p>hahaha, NEVER</p>
            <span class="time-right">11:03</span>
        </div>
    </div>


    <script>
        document.getElementById("body").onload = setTimeout(One, 1500);
        setTimeout(Two, 3000);
        setTimeout(Three, 4500);
        setTimeout(question, 7000);

        function One() {
            var x = document.getElementById("1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function Two() {
            var x = document.getElementById("2");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function Three() {
            var x = document.getElementById("3");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function question() {
            var x = document.getElementById("question");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

    <div id="question" class="container question" style="display: none">

        <form action="index.php" method="post">
            <br>
            Which xss method can you use to get his IP: <br>
            <br>

            <input type="radio" name="xxs" value="correct">getJSON('http://hackbox.serverict.nl/?api_key=<your_api_key>', function(data) {
                window.console.log(JSON.stringify(data, null, 2));
                });<br><br>
                <input type="radio" name="xxs" value="wrong" required="required">$.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {
                window.console.log(data)
                })<br><br>
                <input type="radio" name="xxs" value="wrong">$.getJSON('http://gd.geobytes.com/GetCityDetails?callback=?', function(data) {
                window.console.log(JSON.stringify(data, null, 2));
                });<br>
                <br><br><br>
                <input type="submit" name="submit" value="Submit">
        </form>

    </div>

    <div class="response">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $xxs = $_POST['xxs'];
            if ($xxs == "correct")
                echo  " Data successfully acquired";
            else
                echo "error, you will be logged out now";
        }

        ?>
    </div>

    <div id="hint"> </div>
    <div id="assistant">
        <img src="images/assist-sarcastic.png" alt="assistant" onclick="getHint()">
    </div>

</body>

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

</html>