<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Big Brain Inc.</title>
    <link rel="stylesheet" href="../main.css">
    <link href="css/BigBrainStyle.css" type="text/css" rel="stylesheet" />
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/assistant.css">
    <script type="text/javascript" src="js/assistant.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
</head>
    <?php include '../header.php';?>
    <?php include '../footer.php';?>
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
    if(isset($_COOKIE["auth_token"]) && !isset($_POST['logoutButton'])){
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
        <div class="logo"><a href="Index.php"><img src="images/BigBrainLogo.png" class="mainLogo" /></a></div>
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
    <div class="main">
        <?php 
            if($currentRole == "invalid" || $currentRole == "none" || $currentRole == "invalidRole"){
                echo('
                    <h2 class="headerText">User not logged in</h2>
                    <div class="backText">
                        <p><a href="index.php" class="welcomeText">Back to role select</a></p>
                    </div>
                   
                ');
                exit();
			}
        ?>
        <div class="textInfo">
            <div class="containerBox">
                <div class="infoText">
                    <h3 class="headerText">We're here to help,not harm</h3>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Nam vehicula pretium lorem vel venenatis. Aliquam tincidunt diam vel orci tristique scelerisque.
                        Curabitur elementum arcu id dapibus malesuada. Quisque facilisis condimentum quam in pellentesque.
                        Praesent facilisis dignissim iaculis.
                        Mauris imperdiet finibus sapien, ut laoreet augue ultrices sit amet.</p>
                </div>
                <div class="image">
                    <img src="images/code.jpg" class="photo">
                </div>
            </div>
            <div class="containerBox">
                <div class="image">
                    <img src="images/helpDesk.jpg" class="photo">
                </div>
                <div class="infoText">
                    <h3 class="headerText">We're here to help,not harm</h3>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Nam vehicula pretium lorem vel venenatis. Aliquam tincidunt diam vel orci tristique scelerisque.
                        Curabitur elementum arcu id dapibus malesuada. Quisque facilisis condimentum quam in pellentesque.
                        Praesent facilisis dignissim iaculis.
                        Mauris imperdiet finibus sapien, ut laoreet augue ultrices sit amet.</p>
                </div>
            </div>
        </div>
        <div id="hint"> </div>
        <div id="assistant">
            <img src="images/assist-sarcastic.png" alt="assistant" onclick="getHint()">
        </div>
    </div>
    
</body>

</html>