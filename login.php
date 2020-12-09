<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>HACKBOX MAIN</title>
</head>

<body>
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
    <h2 id="regTitle">Please enter your login details!</h2>
    <div class="loginDiv">
        <form runat="server" method="post">
            <label for="email">Email Address:</label>
            <input type="email" name="email">
            <br><label for="email">Password:</label>
            <input type="password" name="password">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    <?php
    session_unset();
    session_start();
    $errorMsg = "";
    if (isset($_POST['submit'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $db_name = "hackbox";
            $db_table = "user";
            //assign the connection and selected database to a variable
            $DBConnect = mysqli_connect("localhost", "root", "");
            if ($DBConnect === FALSE) {
                $errorMsg = "<span><p>Unable to connect to database.</p>"
                    . "<p>Error code "
                    . mysqli_errno($DBConnect)
                    . ": "
                    . mysqli_error($DBConnect)
                    . "</p></span>";
            } else {
                //select the database
                $db = mysqli_select_db($DBConnect, $db_name);
                if ($db === FALSE) {
                    $errorMsg = "<span><p>Unable to connect to database.</p>"
                        . "<p>Error code "
                        . mysqli_errno($DBConnect)
                        . ": "
                        . mysqli_error($DBConnect)
                        . "</p></span>";
                    $DBConnect = FALSE;
                }
            }
            $SQLstring = "SELECT userEmail,userPassword,userName FROM " . $db_table;
            if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $userEmail, $userPassword, $userName);
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
                        if ($userEmail == htmlentities($_POST['email']) && $userPassword = $_POST['password']) {
                            $_SESSION['userName'] = $userName;
                            header("Location: index.php");
                        } else {
                            $errorMsg = "<span>Incorrect login details</span>";
                        }
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
            mysqli_close($DBConnect);
        } else {
            $errorMsg = "<span>Please fill in all the details!</span>";
        }
    }
    ?>
    <div class="errorDiv"><?php echo $errorMsg ?></div>
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
</body>


</html>