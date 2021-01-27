<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="challenge5style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Challenge 5</title>
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
                <li><a href="./login.php">Login</a></li>
                <li><a href="./register.php">Register</a></li>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>
</header>

<body id="body" background="bg1.jpg">
<h3> After completing previous challenges its time to get the location of the terrorist by getting their IP Address</h3>
<h3> You have managed to start a conversation with him and need to inject some Cross Site Scripting (Javascript using an api) to acquire the IP address. (Shown Below)</h3>



<div class="mainChallengeText" style="float: none">
    <div id="1" class="leftTextDiv"  style="display: none">
        <p style="margin-top:20px;" class="textRight"><img class="avatarleft" src="logo.png" alt="Avatar"> What do you think you’re doing? Who are you and why are you interfering in my affairs?</p>
        <span class="textRightSpace"></span>
    </div>
    <div id="2" class="rightTextDiv" style="display: none">
        <p style="margin-top:20px;" class="textLeft"><img class="avatar-right" src="2.png" alt="Avatar" class="right">It doesn’t matter who I am. I know who you are, Minerva.You’re hurting innocent people to get revenge on one person</p>
        <span class="textLeftSpace"></span>
    </div>
    <div id="3" class="leftTextDiv" style="display: none">
        <p style="margin-top:-40px;" class="textRight"><img class="avatarleft" src="logo.png" alt="Avatar"> Listen, punk. Until that vile corporation is nothing but a bad memory, or someone stops me, I won’t stop. Shiny Tech does not care for those they deem insignificant.</p>
        <span class="textRightSpace"></span>
    </div>
    <div id="4" class="rightTextDiv" style="display: none">
        <p style="margin-top:20px;" class="textLeft"><img class="avatar-right" src="2.png" alt="Avatar" class="right">It doesn’t matter who I am. I know who you are, Minerva.You’re hurting innocent people to get revenge on one person</p>
        <span class="textLeftSpace"></span>
    </div>
    <div id="5" class="leftTextDiv" style="display: none">
        <p style="margin-top: 5px" class="textRight"><img class="avatarleft" src="logo.png" alt="Avatar"> Listen, punk. Until that vile corporation is nothing but a bad memory, or someone stops me, I won’t stop. Shiny Tech does not care for those they deem insignificant.</p>
        <span class="textRightSpace"></span>
    </div>
</div>
<br>

    <div  id="question" class="container question"  style="display: none" >

        <form  action="index.php" method="post">

            Which xss method can you use to get his IP: <br>

            <label class="radiobutton">getJSON('http://hackbox.serverict.nl/?api_key=<your_api_key>', function(data) {
                    window.console.log(JSON.stringify(data, null, 2));
                    });
                    <input type="radio" name="xxs" value="correct"><span class="checkmark"></span><br> </label>
            <label class="radiobutton">$.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {
                window.console.log(data)
                })
                <input type="radio" name="xxs" value="wrong" required="required"><span class="checkmark"></span><br><br></label>
            <label class="radiobutton">$.getJSON('http://gd.geobytes.com/GetCityDetails?callback=?', function(data) {
                window.console.log(JSON.stringify(data, null, 2));
                });
                <input type="radio" name="xxs" value="wrong"><span class="checkmark"></span><br></label>

            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $xxs = $_POST['xxs'];
            if ($xxs == "correct")
                echo " <script>
    document.getElementById('body').onload= setTimeout(Four,6000); setTimeout(question,7001); 
    function Four() {
        var x = document.getElementById('4');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
        }
        
         function question() {
        var x = document.getElementById('question');
        if (x.style.display === 'block') {
            x.style.display = 'none';
        } else {
            x.style.display = 'none';
        }
        }
     </script> ";

            else {

                echo " <script>
    document.getElementById('body').onload= setTimeout(Five,6000); setTimeout(question,7001);
    function Five() {
        var x = document.getElementById('5');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
        }
        
        function question() {
        var x = document.getElementById('question');
        if (x.style.display === 'block') {
            x.style.display = 'none';
        } else {
            x.style.display = 'none';
        }
        }
     </script>";
            }
        }
        ?>

    </div>
<!--</div>-->



<script>
    document.getElementById("body").onload= setTimeout(One,1500); setTimeout(Two,3000); setTimeout(Three,4500);setTimeout(question,7000);
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

<br>



</body>

<footer>
    <div class="main-content">
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
        <span><a href="./privacy_policy.php">Privacy Policy</a></span>
    </div>
</footer>

</html>