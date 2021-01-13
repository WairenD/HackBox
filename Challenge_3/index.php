<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Big Brain Inc.</title>
    <link href="css/BigBrainStyle.css" type="text/css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

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
            <h1>Big Brain Inc.</h1>
        </div>
        <?php
            if($currentRole == "admin"){
                echo('<div class="headerItem">
                <p><a href="GuestPage.php" class="welcomeText">Guest page</a></p>
                </div>');

                echo('<div class="headerItem">
                <p><a href="../Challenge_4/index.php" class="welcomeText">User Search</a></p>
                </div>');
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
                    <h2>User already logged in</h2>
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
        <h2>Select one</h2>
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
        <div class="ErrorMessages">
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
</body>

</html>