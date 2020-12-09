<html>
    <head>
        <title>HackBox</title>

    </head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>HACKBOX MAIN</title>
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
                <?php
                session_start();
                 if(isset($_SESSION['userName'])){
                  echo '<li><a href="#" class="desktop-item">'.$_SESSION['userName'].'</a>
                        <input type="checkbox" id="showDrop">
                        <label for="showDrop" class="mobile-item">'.$_SESSION['userName'].'</label>
                        <ul class="drop-menu">
                          <li><a href="./logout.php">Log Out</a></li>
                        </ul></li>';
                }else{
                  echo '<li><a href="./login.php">Login</a></li>
                  <li><a href="./register.php">Register</a></li>';
                } ?>
            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>
</header>

<body>
<h1>LEADERBOARDS</h1>
<table>
  <tr>
    <th>Username</th>
    <th>Time to finish</th>
    <th>Date</th>
  </tr>
<?php
include("connection.php");
$SQLstring = "SELECT userName,bestTime,endTime FROM ". $db_table;
if($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$userName,$bestTime,$endTime);
    mysqli_stmt_store_result($stmt);
    if($stmt === FALSE) {
      $errorMsg = "<span><p>Unable to execute the query.</p>"
      . "<p>Error code "
      . mysqli_errno($DBConnect)
      . ": "
      . mysqli_error($DBConnect)
      . "</p></span>";
    }else{
        while (mysqli_stmt_fetch($stmt)) {
            echo '<tr>
                    <td>'.$userName.'</td>
                    <td>'.$bestTime.'</td>
                    <td>'.$endTime.'</td>
                  </tr>';
        }

    }
    //Clean up the $stmt after use
    mysqli_stmt_close($stmt);
}else{
  $errorMsg = "<span><p>Unable to execute the query.</p>"
  . "<p>Error code "
  . mysqli_errno($DBConnect)
  . ": "
  . mysqli_error($DBConnect)
  . "</p></span>";
}
mysqli_close($DBConnect);
 ?>
</table>
</body>

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

</html>
