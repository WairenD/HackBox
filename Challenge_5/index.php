<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/assistant.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="challenge5style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Challenge 5</title>
</head>
<?php
include "../header2.php";
?>

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
        <p style="margin-top:20px;" class="textLeft"><img class="avatar-right" src="2.png" alt="Avatar" class="right">Incase you didnt notice i just sent some malicious scripting and we now have your IP address and location, you wont get away with this</p>
        <span class="textLeftSpace"></span>
    </div>
    <div id="5" class="leftTextDiv" style="display: none">
        <p style="margin-top: 5px" class="textRight"><img class="avatarleft" src="logo.png" alt="Avatar"> So i see you tried to send some malicious scripting, youre gonna have to try harder than that, you are never going to find me!!!.</p>
        <span class="textRightSpace"></span>
    </div>
    <div id="button" class="actionTextDiv" style="display: none">
        <a href="../story5.php"><input class="actionText" style="margin-top:20px; background-color:#3a3b3d; border:none; cursor:pointer; color:white;" type="submit" name="end" value="End"></a>
    </div>
</div>
<br>

    <div  id="question" class="container question"  style="display: none">

        <form  action="index.php" method="post">
            <div id="tryAgain" style="display: none"> Incorrect answer, use the assistant get some Hints!</div>
            <br>
            Which xss method can you use to get his IP: <br>
            <label class="radiobutton">$.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {
                window.console.log(data)
                })
                <input type="radio" name="xxs" value="wrong" required="required"><span class="checkmark"></span><br><br></label>

            <label class="radiobutton">getJSON('http://hackbox.serverict.nl/?api_key=<your_api_key>', function(data) {
                    window.console.log(JSON.stringify(data, null, 2));
                    });
                    <input type="radio" name="xxs" value="correct"><span class="checkmark"></span><br> </label>

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
    document.getElementById('body').onload= setTimeout(One,10); setTimeout(Two,10);setTimeout(Three,10);setTimeout(Four,1500); setTimeout(button,2500); setTimeout(question,7001);
    function Four() {
        var x = document.getElementById('4');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
        }
        
                  function One() {
        var x = document.getElementById('1');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
        }
        
            function Two() {
        var x = document.getElementById('2');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'block';
        }
    }

             function Three() {
        var x = document.getElementById('3');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'block';
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
        
        function button() {
        var x = document.getElementById('button');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
        }
        
     </script> ";

            else {

                echo " <script>
    document.getElementById('body').onload= setTimeout(One,10); setTimeout(Two,10);setTimeout(Three,10);setTimeout(Five,1500); setTimeout(button,2500); setTimeout(question,3500); setTimeout(tryAgain,3500);
    function Five() {
        var x = document.getElementById('5');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
        }
        
        function tryAgain() {
        var x = document.getElementById('tryAgain');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
        }
        
        
          function One() {
        var x = document.getElementById('1');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
        }
        
            function Two() {
        var x = document.getElementById('2');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'block';
        }
    }

             function Three() {
        var x = document.getElementById('3');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'block';
        }
    }
        
        function question() {
        var x = document.getElementById('question');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'block';
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
            x.style.display = "block";
        }
    }

    function Two() {
        var x = document.getElementById("2");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "block";
        }
    }

    function Three() {
        var x = document.getElementById("3");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "block";
        }
    }

    function question() {
        var x = document.getElementById("question");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "block";
        }
    }

</script>

<br>





</body>
<script type="text/javascript" src="js/assistant.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
<div id="hint"> </div>
<div id="assistant">
    <img src="images/assist-sarcastic.png" alt="assistant" onclick="getHint()">
</div>

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