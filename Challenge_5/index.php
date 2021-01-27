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
<?php include '../header2.php';?>
<?php include '../footer.php';?>
<body id="body" background="bg1.jpg">
<h3> After completing previous challenges its time to get the location of the terrorist by getting their IP Address</h3>
<h3> You have managed to start a conversation with him and need to inject some Cross Site Scripting (Javascript using an api) to acquire the IP address. (Shown Below)</h3>

<!--<div id="display">-->
<!--    <div id="1" class="container" style="display: none ">-->
<!---->
<!--        <p><img src="avatar1.jpg" alt="Avatar" style="padding-right: 3px">What do you think you’re doing? Who are you and why are you interfering in my affairs?</p>-->
<!--        <span class="time-right">11:00</span>-->
<!--    </div>-->
<!---->
<!--    <br>-->
<!--    <div id="2" class="container darker" style="display: none">-->
<!---->
<!---->
<!--        <p class="right"> <img src="2.png" alt="Avatar" class="right"> It doesn’t matter who I am. I know who you are, Minerva.You’re hurting innocent people to get revenge on one person</p>-->
<!--        <br>-->
<!--        <span class="time-left">11:01</span>-->
<!--    </div>-->
<!--    <br>-->
<!--    <div id="3" class="container" style="display: none">-->
<!---->
<!--        <p><img src="avatar1.jpg" alt="Avatar" style="padding-right: 3px">Listen, punk. Until that vile corporation is nothing but a bad memory, or someone actually stops me, I won’t stop. Shiny Tech does not care for those they deem insignificant.</p>-->
<!--        <span class="time-right" >11:03</span>-->
<!--    </div>-->
<!--</div>-->


<div class="mainText">
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
</div>
<br>

    <div  id="question" class="container question"  style="display: none" >

        <form  action="feedback.php" method="post">

            Which xss method can you use to get his IP: <br>

            <label class="radiobutton">getJSON('http:/..serverict.nl/?api_key=<your_api_key>', function(data) {
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
</html>