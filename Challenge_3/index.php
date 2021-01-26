<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Big Brain Inc.</title>
    <link href="css/BigBrainStyle.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="../main.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/assistant.css">
    <script type="text/javascript" src="js/assistant.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
</head>

<body>
    <header>
        <?php
        $errorMsg = "";
        include("../connection.php");
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
        if($currentLevel<2 || !isset($_SESSION['userName'])){
          header("Location: index.php");
        }
            ?>
            <nav>
                <div class="wrapper">
                    <div class="logo"><a href="./">HACKBOX</a></div>
                    <input type="radio" name="slider" id="menu-btn">
                    <input type="radio" name="slider" id="close-btn">
                    <ul class="nav-links">
                        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../about.php">About</a></li>
                        <li>
                            <a href="#" class="desktop-item">Challenges</a>
                            <input type="checkbox" id="showDrop">
                            <label for="showDrop" class="mobile-item">Challenges</label>
                            <ul class="drop-menu">
                            <?php
                            for($i = 0;$i<$currentLevel;$i++){
                                echo '<li><a href="../Challenge_'. ($i+1) .'">Challenge '. ($i+1) .'</a></li>';
                            }
                            ?>
                            </ul>
                        </li>
                        <li><a href="../leaderboards.php">Leaderboards</a></li>
                        <?php
                        if (isset($_SESSION['userName'])) {
                            echo '<li><a href="#" class="desktop-item">' . $_SESSION['userName'] . '</a>
                            <input type="checkbox" id="showDrop">
                            <label for="showDrop" class="mobile-item">' . $_SESSION['userName'] . '</label>
                            <ul class="drop-menu">
                            <li><a href="../logout.php">Log Out</a></li>
                            </ul></li>';
                        }
                        ?>
                    </ul>
                    <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
                </div>
            </nav>
        </header>
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
    <?php
    $dummyUserId = "25213";
    $dummyAuthToken = "d9gdsn0v51gqwezgj";
    $currentRole = "invalid";

    if(isset($_POST['guestSubmit'])){
        $expire = time()+3600;
        setcookie("role", "guest", $expire);
        setcookie("user_id", $dummyUserId, $expire);
        setcookie("auth_token", $dummyAuthToken, $expire);
        header('Location: GuestPage.php');
	}

    if(isset($_POST['logoutButton'])){
        setcookie("role", null, -1);
        setcookie("user_id", null, -1);
        setcookie("auth_token", null, -1);
	}

    if(isset($_COOKIE["role"]) && isset($_COOKIE["user_id"]) && isset($_COOKIE["auth_token"]) && !isset($_POST['logoutButton'])){
        $role = $_COOKIE["role"];
        $role = strtoLower($role);
        $userId = $_COOKIE["user_id"];
        $authToken = $_COOKIE["auth_token"];

        if($userId == $dummyUserId && $authToken == $dummyAuthToken){
            switch($role){
                case "guest":
                    $currentRole = "guest";
                    break;
                case "admin":
                    $currentRole = "admin";
                    break;
                default:
                    $currentRole = "invalidRole";
                    break;
		    }
	    }else{
            $currentRole = "invalid";
	    }


	}else{
        $currentRole = "none";
	}
    ?>

    <div class="header">
        <div class="logo"><a href="index.php"><img src="images/BigBrainLogo.png" class="mainLogo" /></a></div>
        <div class="name">
            <h1 class="headerText">Big Brain Inc.</h1>
        </div>
        <?php
            if($currentRole == "admin"){
                echo('<div class="headerItem">
                <p><a href="GuestPage.php" class="welcomeText">Guest page</a></p>
                </div>');

                echo('<div class="headerItem">
                <p><a href="../story3.php" class="welcomeText">User Search</a></p>
                </div>');
                if($currentLevel==2){
                 $currentLevel=3;
                 $SQLstring = "UPDATE " . $db_table . " SET currentlevel=".$currentLevel." WHERE userName='".$_SESSION['userName']."'";
                 if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                   $QueryResult = mysqli_stmt_execute($stmt);
                   if ($QueryResult === FALSE) {
                     $errorMsg = "<span><p>Unable to execute the query.</p>"
                       . "<p>Error code "
                       . mysqli_errno($DBConnect)
                       . ": "
                       . mysqli_error($DBConnect)
                       . "</p></span>";}
                       else{
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
			}

            if($currentRole == "guest"){
                echo('<div class="headerItem">
                <p><a href="GuestPage.php" class="welcomeText">Guest page</a></p>
                </div>');

                echo('<div class="headerItem">
                <p class="welcomeText">Welcome guest</p>
                </div>');
			}
        ?>
    </div>
    <div class="Container">

        <?php
            if($currentRole == "guest" || $currentRole == "admin"){
                echo('
                    <div class="selectOneDiv"><h2 class="headerText">User already logged in</h2></div>
                    <form action="index.php" method="POST" class="form">

                        <div class="logout">
                            <div class="optionLogin">
                                <p class="formDetail">Do you wish to logout?</p>
                                <p><input name="logoutButton" type="submit" value="Logout"/></p>
                            </div>
                        </div>
                    </form>
                ');


                exit();
			}


        ?>
        <div class="selectOneDiv"><h2 class="headerText">Select one</h2> </div>
        <form action="index.php" method="POST" class="form">
            <div class="signInChoice">
                <p class="optionLogin"><input name="guestSubmit" type="submit" value="Sign in as guest" /></p>
            </div>
            <div class="forms">
                <p class="formDetail">Username</p>
                <input type="text" placeholder="Username" />
                <p class="formDetail">Password</p>
                <input type="password" placeholder="Password" />
                <p class="formDetail"><input name="adminSubmit" type="submit" value="Sign in as admin" /></p>
            </div>


        </form>
        <div class="errorMessages">
            <?php
            if(isset($_POST['adminSubmit'])){
                        echo('<p class="error">Username and password combination incorrect</p>');
	                }
            if($currentRole == "invalid"){
                echo('<p class="error">Authorisation token or used id is incorrect</p>');
			}elseif($currentRole == "invalidRole"){
                echo('<p class="error">Invalid role set</p>');
			}
            ?>
        </div>

    </div>
    <div id="hint"> </div>
        <div id="assistant">
            <img src="images/assist-sarcastic.png" alt="assistant" onclick="getHint()">
        </div>
</body>

</html>
