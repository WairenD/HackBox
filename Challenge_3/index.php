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
<?php include '../header2.php';?>
<?php include '../footer2.php';?>
<body>
    <?php


    $dummyAuthToken = "d9gdsn0v51gqwezgj";
    $currentRole = "invalid";

    if(isset($_POST['guestSubmit'])){
        $expire = time()+3600;
        setcookie("role", "guest", $expire);
        setcookie("auth_token", $dummyAuthToken, $expire);
        header('Location: GuestPage.php');
	}

    if(isset($_POST['logoutButton'])){
        setcookie("role", null, -1);
        setcookie("auth_token", null, -1);
	}

    if(isset($_COOKIE["role"]) && isset($_COOKIE["auth_token"]) && !isset($_POST['logoutButton'])){
        $role = $_COOKIE["role"];
        $role = strtoLower($role);
        $authToken = $_COOKIE["auth_token"];

        if($authToken == $dummyAuthToken){
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
                echo('<script>getHintWithInput("Good job! You&#39;re now logged in as an admin. Go to the user search for the next challenge"</script>');
                echo('<div class="headerItem">
                <p><a href="GuestPage.php" class="welcomeText">Guest page</a></p>
                </div>');

                echo('<div class="headerItem">
                <p><a href="../story3.php" class="welcomeText">User Search</a></p>
                </div>');
                setcookie("role", null, -1);
                setcookie("auth_token", null, -1);
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

			}else{
                


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
            }
            ?>
        </div>

    </div>
    <div id="hint"> </div>
    <div id="assistant">
        <img src="images/assist-sarcastic.png" alt="assistant" onclick="getHint()">
    </div>
    <?php
    if($currentRole == 'admin'){
        echo('<script>getHintWithInput("Good job! You&#39;re now logged in as an admin. Go to the user search for the next challenge")</script>');
    }
    ?>
</body>
<?php

?>
</html>
