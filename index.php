<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Welcome to Project HackBox 2.0</title>
</head>
<?php include 'header.php';?>
<?php include 'footer.php';?>
<body>
<div class="landing-page-body">
    <div class="top-box">
        <div class="top_left-box">
            <h2>Discover new bounderies</h2>
            <h1>ETHICAL HACKING<br>CHALLENGES</h1>
            <p>Learn and gather data, <br>defeat the hacker with exciting tasks.</p>
            <?php
            if(isset($_SESSION['userName'])){
                $errorMsg = "";
                include("connection.php");
                session_start();
                $SQLstring = "SELECT currentLevel FROM " . $db_table." WHERE userName='".$_SESSION['userName']."'";
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
                if($currentLevel == 0){
                    ?>
                    <form method="post">
                    <input class="startBtn" type="submit" name="play" value="Start">
                    <?php
                    if(isset($_POST['play'])){
                        $SQLstring = "UPDATE " . $db_table . " SET currentlevel='0',endTime='0000-00-00 00:00:00' WHERE userName='".$_SESSION['userName']."'";
                        if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                            $QueryResult = mysqli_stmt_execute($stmt);
                            if ($QueryResult === FALSE) {
                            $errorMsg = "<span><p>Unable to execute the query.</p>"
                            . "<p>Error code "
                            . mysqli_errno($DBConnect)
                            . ": "
                            . mysqli_error($DBConnect)
                            . "</p></span>";}
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
                        header("Location: story0.php");
                    }  
                    echo("</form>");
                }else{
                    if($currentLevel < 5){
                        ?>
                        <form method="post">
                        <input class="startBtn" type="submit" name="play" value="Continue">
                        <?php
                        if(isset($_POST['play'])){
                            header("Location: challenge_". ($currentLevel + 1)."/");
                        }  
                        echo("</form>");
                    }else{
                        ?>
                        <form method="post">
                        <input class="startBtn" type="submit" name="play" value="Start anew">
                        <p>This will reset your progress, your best time will be kept.</p>
                        <?php
                        if(isset($_POST['play'])){
                            $SQLstring = "UPDATE " . $db_table . " SET currentlevel='0',endTime='0000-00-00 00:00:00' WHERE userName='".$_SESSION['userName']."'";
                            if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                                $QueryResult = mysqli_stmt_execute($stmt);
                                if ($QueryResult === FALSE) {
                                    $errorMsg = "<span><p>Unable to execute the query.</p>"
                                    . "<p>Error code "
                                    . mysqli_errno($DBConnect)
                                    . ": "
                                    . mysqli_error($DBConnect)
                                    . "</p></span>";}
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
                                 header("Location: story0.php");
                            }
                        }
                        echo("</form>");
                    }      
            }
                
            ?>
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
    <div class="separate-bar">
    </div>
    <div class="bottom-box">
        <div class="bottom-left_box">
            <img src="images/assistant1.png" alt="assistant1">
        </div>
        <div class="bottom-center_box">
            <h1>FEELING LOST?</h1>
            <p>Don't worry, your assistant Dimitri will be there to help you throughout the challenges. Offering hints and guiding your way to the end. Just click on him to recieve a helpful hint. Do you have questions Dimitri can't help you with? Feel free to contact the team, you can find our contact information in the about page.</p>
        </div>
        <div class="bottom-right_box">
            <img src="images/assistant2.png" alt="assistant2">
        </div>
    </div>
</div>

</body>
</html>
